<?php
defined('BASEPATH') or exit('No direct script access allowed');

function ci()
{
    return get_instance(); // Returns the CI instance globally
}


function truncate($text, $limit, $suffix = '...')
{
    return mb_strimwidth($text, 0, $limit, $suffix);
}
