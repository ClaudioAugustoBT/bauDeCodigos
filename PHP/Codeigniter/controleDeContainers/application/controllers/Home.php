<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            "styles" => array(),
            "scripts" => array(
                "home.js"
            )
        );

        $this->template->show("home.php", $data);
    }
}
