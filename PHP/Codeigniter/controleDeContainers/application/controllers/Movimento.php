<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movimento extends CI_Controller
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
                "movimento.js"
            )
        );

        $this->template->show("movimento.php", $data);
    }
}
