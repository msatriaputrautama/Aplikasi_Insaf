<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('encrypt_data')) {
    function encrypt_data($data, $key = 'random string') {
        $CI =& get_instance();
        $CI->load->library('encryption');

        // Set a custom encryption key
        $CI->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $key
            )
        );

        // Encrypt the data
        $encrypted = $CI->encryption->encrypt($data);

        // Encode the encrypted data to base64 to ensure it's safe for URLs and databases
        return base64_encode($encrypted);
    }
}

if (!function_exists('decrypt_data')) {
    function decrypt_data($data, $key = 'random string') {
        $CI =& get_instance();
        $CI->load->library('encryption');

        // Set a custom encryption key
        $CI->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $key
            )
        );

        // Decode the base64 encoded data
        $decoded = base64_decode($data);

        // Decrypt the data
        return $CI->encryption->decrypt($decoded);
    }
}
