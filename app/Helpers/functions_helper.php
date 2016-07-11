<?php

namespace CodeDelivery\Http\Helpers;

/*****
 * FORMAT STATUS ORDER
 * [0 => 'Processing', 1 => 'Delivering', 2 => 'Finished' ]
 * 0 - Processing
 * 1 - Delivering
 * 2 - Finished
 */
if (! function_exists('formatStatusOrder')) {
    function formatStatusOrder($status)
    {
        if($status == 0)
            return 'Processing';
        else if($status == 1)
            return 'Delivering';
        else if($status == 2)
            return 'Finished';
        else
            return 'Invalid';
    }
}

/*****
 * FORMAT CLASS STATUS ORDER
 * [0 => 'warning', 1 => 'info', 2 => 'success' ]
 * 0 - Processing - warning
 * 1 - Delivering - info
 * 2 - Finished - success
 */
if (! function_exists('formatClassStatusOrder')) {
    function formatClassStatusOrder($status)
    {
        if($status == 0)
            return 'warning';
        else if($status == 1)
            return 'info';
        else if($status == 2)
            return 'success';
        else
            return 'danger';
    }
}