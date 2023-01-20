<?php

namespace Core\DB\Fields;

use Core\DB\Fields\DBField;

/**
 * Description of DBFieldTransposer
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
abstract class DBFieldTransposer {

    static public function transpose(DBField $field, $value) {
        if (null === $value) {
            return "null";
        }
        switch ($field->getType()) {
            case DBField::STRING_FORMAT:
                return "'" . addslashes($value) . "'";
            case DBField::JSON_FORMAT:
                return "'" . json_encode($value) . "'";
            case DBField::BOOLEAN_FORMAT:
                return (true === $value) ? 1 : 0;
            case DBField::INTEGER_FORMAT:
                return "'" . (int) $value . "'";
            case DBField::DATETIME_FORMAT:
                return "'" . $value->format(DBField::DATETIME_STRING_FORMAT) . "'";
            default:
                return $value;
        }
    }

}
