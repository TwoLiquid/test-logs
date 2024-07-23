<?php

/**
 * This is a file with global helper functions
 */

if (!function_exists('wrapReceiptData')) {

    /**
     * @param array $data
     *
     * @return array
     */
    function wrapReceiptData(
        array $data
    ) : array
    {
        return [
            'receipt' => $data
        ];
    }
}
