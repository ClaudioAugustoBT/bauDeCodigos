const BASE_URL = "http://localhost/containers/controlcontainer/";

// NAVEGAçÃO

$("#btn_nav_home").click(() =>  window.location = BASE_URL + "home");
$("#btn_nav_containers").click(() =>  window.location = BASE_URL + "container");
$("#btn_nav_cliente").click(() =>  window.location = BASE_URL + "cliente");
$("#btn_nav_movimentacao").click(() =>  window.location = BASE_URL + "movimento");
$("#btn_nav_relatorios").click(() =>  window.location = BASE_URL + "relatorio");