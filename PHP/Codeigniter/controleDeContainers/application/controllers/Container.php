<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Container extends CI_Controller
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
                "container.js"
            )
        );

        $this->template->show("container.php", $data);
    }

    public function ajax_teste()
    {
        $x = date('Y-m-d H:i:s');
        echo $x;
    }

    public function ajax_todos_containers()
    {
        if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
        }

        $json = array();
        $json["status"] = 1;
        $json["errors"] = array();

        $this->load->model("container_model");

        $json["containers"] = $this->container_model->select_all_containers();
        $json["tipos_containers"] = $this->container_model->select_all_tipos_containers();

        echo json_encode($json);
    }

    public function ajax_cadastra_container()
    {
        if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
        }

        $json = array();
        $json["status"] = 1;
        $json["error_list"] = array();

        $this->load->model("container_model");

        $data = $this->input->post();
        if (!empty($json["error_list"]) || empty($data)) {
            $json["status"] = 0;
            $json["error_list"][0] = "Falha ao receber todos dados";
            echo json_encode($json);
            exit;
        } else {
            $novo_container = array();
            $novo_container["cd_alfanum_container"] = $data["nome_container"];
            $novo_container["nm_cliente"] = $data["nome_cliente"];
            $novo_container["cd_tipo_container"] = $data["tipo_container"];
            $novo_container["ic_status"] = $data["status"];
            $novo_container["ic_categoria"] = $data["categoria"];
            $this->container_model->insert($novo_container);
        }

        echo json_encode($json);
    }

    public function ajax_editar_container()
    {
        if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
        }

        $json = array();
        $json["status"] = 1;
        $json["error_list"] = array();

        $this->load->model("container_model");

        $data = $this->input->post();
        if (!empty($json["error_list"]) || empty($data)) {
            $json["status"] = 0;
            $json["error_list"][0] = "Falha ao receber todos dados";
            echo json_encode($json);
            exit;
        } else {
            $container = array();
            $cod = $data["editar_cd_container"];
            $container["cd_alfanum_container"] = $data["editar_nome_container"];
            $container["nm_cliente"] = $data["editar_nome_cliente"];
            $container["cd_tipo_container"] = $data["editar_tipo_container"];
            $container["ic_status"] = $data["editar_status"];
            $container["ic_categoria"] = $data["editar_categoria"];
            $this->container_model->update($cod, $container);
        }

        echo json_encode($json);
    }
}
