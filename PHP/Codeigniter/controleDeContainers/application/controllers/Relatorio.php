<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relatorio extends CI_Controller
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
                "relatorio.js"
            )
        );

        $this->template->show("relatorio.php", $data);
    }
}
