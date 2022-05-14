<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
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
                "cliente.js"
            )
        );

        $this->template->show("cliente.php", $data);
    }
}