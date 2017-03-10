<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2017 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Compares the two given values and outputs selected="selected"
 * if the values match or the operation is true for the single value
 *
 * Examples
 * check_select($option_key, 'key_1')           Checks if $option_key equals (==) 'key_1'.
 * check_select($option_key, 'key_1', '!=')     Checks if $option_key not equals (!=) 'key_1'.
 * check_select($option_key)                    The same like if ($option_key) { ...
 * check_select($option_key, null, 'e')         Checks if the $option_key value is empty.
 * check_select($option_key != 'key_1')         If the first param is bool, it is used to validate the select
 *
 * @param string|integer $value1
 * @param string|integer|null $value2
 * @param string $operator
 * @return void
 */
function check_select($value1, $value2 = null, $operator = '==')
{
    $select = 'selected="selected"';

    // Instant-validate if $value1 is a bool value
    if (is_bool($value1) && $value2 === null) {
        echo $value1 ? $select : '';
        return;
    }

    switch ($operator) {
        case '==':
            $echo_selected = $value1 == $value2 ? true : false;
            break;
        case '!=':
            $echo_selected = $value1 != $value2 ? true : false;
            break;
        case 'e':
            $echo_selected = empty($value1) ? true : false;
            break;
        case '!e':
            $echo_selected = empty($value1) ? true : false;
            break;
        default:
            $echo_selected = $value1 ? true : false;
            break;
    }

    echo $echo_selected ? $select : '';
}
