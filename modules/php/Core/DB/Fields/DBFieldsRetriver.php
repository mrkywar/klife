<?php

namespace Core\DB\Fields;

use Core\DB\Exceptions\DBFieldsRetriverException;
use Core\DB\QueryString;
use Core\Models\Core\Model;
use ReflectionClass;
use ReflectionProperty;

abstract class DBFieldsRetriver {

    private const ORM_PROPERTY = "@ORM\Column";
    private const ORM_ID = "@ORM\Id";
    private const EXCLUDE_PROPERTY = "exclude";
    private const DEFAULT_PROPERTY = "default";

    static public function retrive($item) {
        if (is_array($item)) {
            if (empty($item)) {
                return;
            }
            return self::retrive($item[array_keys($item)[0]]); //recursive call shoud called with first item in array<Model> parameter
        } elseif ($item instanceof Model) {
            $allField = self::retriveFields($item);
            return $allField;
        } elseif (is_string($item)) {
            return self::retriveFields($item);
        } else {
            var_dump($item);
            throw new DBFieldsRetriverException("Unsupported call for : " . $item . " - ERROR CODE : DBFR-01");
        }
    }

    static public function retriveFields($classModel) {
        $reflexion = new ReflectionClass($classModel);
        $fields = [];
//        var_dump(self::EXCLUDE_PROPERTY, $reflexion->getProperties());
        foreach ($reflexion->getProperties() as $property) {
            //-- Retrive property first
            $obj = self::getColumDeclaration($property);
            $field = new DBField();
            if (!is_object($obj)) {
                continue;
//                echo '<pre>';
//                var_dump($obj,$property);die;
            }
            $field->setDbName($obj->name)
                    ->setType($obj->type)
                    ->setProperty($property->getName())
                    ->setIsPrimary(self::isIdDeclaration($property)); //-- Retrive Id status

            $excludeProperty = self::EXCLUDE_PROPERTY;

            if (property_exists($obj, $excludeProperty)) {
                $field->setExclusions($obj->$excludeProperty);
            }
            $defaultProperty = self::DEFAULT_PROPERTY;
            if (property_exists($obj, $defaultProperty)) {
                $field->setDefault($obj->$defaultProperty);
            }
            $fields[] = $field;
        }
        return $fields;
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Fields Retrive Methods
     * ---------------------------------------------------------------------- */

    static private function retriveFilteredFields($items, string $filter) {
        $fields = self::retrive($items);
        return DBFiledsFilter::filter($fields, $filter);
    }

    static public function retriveInsertFields($items) {
        return self::retriveFilteredFields($items, QueryString::TYPE_INSERT);
    }

    static public function retriveInsertFieldsFormClassName($className) {
        $fields = self::retriveFields($className);
        return DBFiledsFilter::filter($fields, QueryString::TYPE_INSERT);
    }

    static public function retriveSelectFields($items) {
        return self::retriveFilteredFields($items, QueryString::TYPE_SELECT);
    }

    static public function retrivePrimaryFields($items) {
        $fields = self::retrive($items);
        $fielteredFields = [];
        foreach ($fields as $field) {
            if ($field->getIsPrimary()) {
                $fielteredFields[] = $field;
            }
        }
        return $fielteredFields;
    }

    static public function retriveUpdatableFields($items) {
        $fields = self::retrive($items);
        $fielteredFields = [];
        foreach ($fields as $field) {
            if (!$field->getIsPrimary()) {
                $fielteredFields[] = $field;
            }
        }
        return $fielteredFields;
    }

    static public function retriveFieldByPropertyName(string $propertyName, $items) {
        $fields = self::retrive($items);
        foreach ($fields as $field) {
            if ($field->getProperty() === $propertyName) {
                return $field;
            }
        }

        throw new DBFieldsRetriverException("Property Name '$propertyName' missing - ERROR CODE : DBFR-02");
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Primary Tools
     * ---------------------------------------------------------------------- */

    /**
     * Allow you to now if the given Property is a primarty or not
     * @param ReflectionProperty $property
     * @return type
     */
    static private function isIdDeclaration(ReflectionProperty $property) {
        return false !== strpos($property->getDocComment(), self::ORM_ID);
    }

    /* -------------------------------------------------------------------------
     *                  BEGIN - Properties Tools
     * ---------------------------------------------------------------------- */

    /**
     * Allow you to get all ORM\Columns declaration properties of a given Property
     * @param ReflectionProperty $property
     * @return type
     */
    static private function getColumDeclaration(ReflectionProperty $property) {
        $strpos = strpos($property->getDocComment(), self::ORM_PROPERTY);
        if ($strpos < 0) {
            return;
        }
        $strpos += strlen(self::ORM_PROPERTY);

        $chaine = substr($property->getDocComment(), $strpos);
        $jsonStr = substr($chaine, 0, strpos($chaine, "}") + 1);
        return json_decode($jsonStr);
    }

}
