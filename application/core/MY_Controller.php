<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /** @var CI_URI */
    public $uri;

    public function __construct()
    {
        parent::__construct();
    }
}
