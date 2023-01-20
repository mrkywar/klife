<?php

namespace Core\DB;

/**
 * Description of QueryString
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
class QueryString {

    const TYPE_SELECT = "SELECT";
    const TYPE_INSERT = "INSERT";
    const TYPE_UPDATE = "UPDATE";
    const TYPE_CUSTOM = "CUSTOM";
    const ORDER_ASC = "ASC";
    const ORDER_DESC = "DESC";
    const COMPARE_EQUAL = "=";
    const COMPARE_GRETER = ">";
    const COMPARE_LESS = "<";
    const COMPARE_GRETER_OR_EQUALS = ">=";
    const COMPARE_LESS_OR_EQUALS = "<=";
    const COMPARE_DIFFERENT = "!=";
}
