//----------
//SETUP
//----------
$(function () {
    console.log("READY!");

    $('.container_cod').mask('AAAA0000000', {
        clearIfNotMatch: true,
        translation: {
            'A': {
                pattern: /[A-Za-z]/
            },
        }
    });

    lista_containers().then((res) => {
        datatable_containers();
    });

    $(".custom-select").select2({
        sortField: 'text',
        language: "pt-BR"
    });

    $(".close-modal").click(function () {
        $(this).parents(".modal").find("form").get(0).reset();
        $(this).parents(".modal").modal('hide');

    });

    $(".modal").on('hidden.bs.modal', function () {
        $(this).find("form").get(0).reset();
    });


});

//----------
//VARIAVEIS
//----------
var containers = [];
var tipos_container = [];
var movimento = [];
var tipos_movimento = [];

//----------
// Requisção dos Containers Cadastrados
//----------
async function lista_containers() {
    let r = $.ajax({
        type: "POST",
        url: BASE_URL + "container/ajax_todos_containers",
        dataType: "json",
        success: function (response) {
            console.log(response);
            containers = response["containers"];
            tipos_container = response["tipos_containers"]
        },
        error: function (err) {
            console.log(err);
        },
        statusCode: {
            404: function () {
                alert("Pagina não encontrada!");
                //document.location.reload();
            },
            500: function () {
                alert("Falha ao conectar ao servidor!");
                //document.location.reload();
            }
        }
    });

    await r;
}

//----------
// Atualiza a Tabela da pagnia de containers
//----------
function datatable_containers() {
    var dados = [];
    for (var i of containers) {
        let tipo = tipos_container.filter(tipo => (tipo.cd_tipo_container == i["cd_tipo_container"]));
        let obj = {
            "cod": i["cd_container"],
            "nome": i["cd_alfanum_container"],
            "cliente": i["nm_cliente"],
            "tipo": tipo[0]["nm_tipo_container"],
            "status": i["ic_status"] == "c" ? "Cheio" : "Vazio",
            "categoria": i["ic_categoria"] == "e" ? "Exportação" : "Importação",
            "acao": '<button class="btn btn-sm btn-success text-uppercase" onClick="editar_container(' + i["cd_container"] + ')">EDITAR</button>'
        };
        dados.push(obj);
    }

    $("#tb_containers").DataTable({
        "responsive": { details: true },
        "destroy": true,
        "info": false,
        "autoWidth": false,
        "serverSide": false,
        "searching": false,
        "order": [[0, 'desc']],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        },
        "paging": false,
        //"lengthChange": false,
        "data": dados,
        columns: [
            { "data": 'cod' },
            { "data": 'nome' },
            { "data": 'cliente' },
            { "data": 'tipo' },
            { "data": 'status' },
            { "data": 'categoria' },
            { "data": 'acao' }
        ],
        "columnDefs": [
            { targets: "no-sort", orderable: false }
        ]
    });
}

//----------
// Novo Container
//----------
$("#btn_novo_container").click(function () {
    datatable_containers();
    $("#tipo_container").children().remove();
    $("#tipo_container").append('<option value="">...</option>');
    for (const tipo of tipos_container) {
        let opiton_tipo = '<option value="' + tipo["cd_tipo_container"] + '">' + tipo["nm_tipo_container"] + '</option>'
        $("#tipo_container").append(opiton_tipo);
    }

    $("#modal_novo_container").modal();
});

$("#btn_cadastar_container").click(function () {

    let nm = $("#nome_container").val();
    let cl = $("#nome_cliente").val();
    let tc = $("#tipo_container").val();
    let nome_repetido = containers.filter(container => (container.cd_alfanum_container == $("#nome_container").val()));
    let err = nm.length != 11 || !nm ? 1 : !cl || cl == false ? 2 : !tc || tc == "" ? 3 : nome_repetido.length != 0 ? 4 : 0;

    switch (err) {
        case 1:
            Swal.fire({
                icon: 'error',
                title: 'Insira um nome valido!'
            });
            $("#nome_container").val("");
            break;
        case 2:
            Swal.fire({
                icon: 'error',
                title: 'Insira um cliente!'
            });
            break;
        case 3:
            Swal.fire({
                icon: 'error',
                title: 'Selecione o tipo do container!'
            });
            break;
        case 4:
            Swal.fire({
                icon: 'error',
                title: 'Já existe um container com este nome!'
            });
            $("#nome_container").val("");
            break;
        default:
            $("#form_novo_container").submit();
    }
});

$("#form_novo_container").submit(function (event) {
    event.preventDefault();
    //console.log($(this).serialize());
    $.ajax({
        type: "POST",
        url: BASE_URL + "container/ajax_cadastra_container",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
        },
        success: function (response) {

            if (response["status"]) {
                $("#form_novo_container")[0].reset();
                $("#form_novo_container").parents(".modal").modal('hide');
                lista_containers().then((res) => {
                    datatable_containers()
                });
                Swal.fire({
                    title: "Sucesso!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                Swal.fire({
                    title: "Ocorreram os seguintes problemas:",
                    text: response["error_list"],
                    icon: "error",
                    button: "Tentar novamente",
                });
            }
        },
        error: function (err) {
            console.log(err);
        },
        statusCode: {
            404: function () {
                alert("Pagina não encontrada!");
                document.location.reload();
            },
            500: function () {
                alert("Falha ao conectar ao servidor!");
                document.location.reload();
            }
        }
    });

    return false;
});

//----------
// Editar Container
//----------
function editar_container(codigo_container) {

    var container_filtrado = containers.filter(container => (container.cd_container == codigo_container));
    $("#editar_nome_container").val(container_filtrado[0]["cd_alfanum_container"]);
    $("#editar_nome_cliente").val(container_filtrado[0]["nm_cliente"]);
    $("#editar_cd_container").val(container_filtrado[0]["cd_container"]);

    $("#editar_tipo_container").children().remove();
    $("#editar_tipo_container").append('<option value="">...</option>');
    for (const tipo of tipos_container) {
        let selected = tipo["cd_tipo_container"] == container_filtrado[0]["cd_tipo_container"] ? "selected" : "";
        let opiton_tipo = '<option value="' + tipo["cd_tipo_container"] + '" ' + selected + '>' + tipo["nm_tipo_container"] + '</option>'
        $("#editar_tipo_container").append(opiton_tipo);
    }

    $("#editar_tipo_container").change();

    $("input[name='editar_status']:checked").attr("checked", false);
    if (container_filtrado[0]["ic_status"] == 'c') {
        $("#editar_status_cheio").attr("checked", true)
        $("input[name='editar_status']").change;
    } else {
        $("#editar_status_vazio").attr("checked", true)
        $("input[name='editar_status']").change;
    }

    $("input[name='editar_categoria']:checked").attr("checked", false);
    if (container_filtrado[0]["ic_categoria"] == 'e') {
        $("#editar_cat_exportacao").attr("checked", true)
        $("input[name='editar_categoria']").change;
    } else {
        $("#editar_cat_importacao").attr("checked", true)
        $("input[name='editar_categoria']").change;
    }

    $("#modal_editar_container").modal();
}

$("#btn_editar_container").click(function () {
    let old_dados_container = containers.filter(old_container => (old_container.cd_container == $("#editar_cd_container").val()));
    console.log(old_dados_container);
    let nm = $("#editar_nome_container").val();
    let cl = $("#editar_nome_cliente").val();
    let tc = $("#editar_tipo_container").val();
    let nome_repetido = containers.filter(container => (container.cd_alfanum_container == $("#editar_nome_container").val() && container.cd_container != $("#editar_cd_container").val()));
    let err = nm.length != 11 || !nm ? 1 : !cl || cl == false ? 2 : !tc || tc == "" ? 3 : nome_repetido.length != 0 ? 4 : 0;

    switch (err) {
        case 1:
            Swal.fire({
                icon: 'error',
                title: 'Insira um nome valido!'
            });
            $("#editar_nome_container").val(old_dados_container[0]["cd_alfanum_container"]);
            break;
        case 2:
            Swal.fire({
                icon: 'error',
                title: 'Insira um cliente!'
            });
            break;
        case 3:
            Swal.fire({
                icon: 'error',
                title: 'Selecione o tipo do container!'
            });
            break;
        case 4:
            Swal.fire({
                icon: 'error',
                title: 'Já existe um container com este nome!'
            });
            $("#editar_nome_container").val(old_dados_container[0]["cd_alfanum_container"]);
            break;
        default:
            $("#form_editar_container").submit();
    }
});

$("#form_editar_container").submit(function (event) {
    event.preventDefault();
    //console.log($(this).serialize());
    $.ajax({
        type: "POST",
        url: BASE_URL + "container/ajax_editar_container",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
        },
        success: function (response) {

            if (response["status"]) {
                $("#form_editar_container")[0].reset();
                $("#form_editar_container").parents(".modal").modal('hide');
                lista_containers().then((res) => {
                    datatable_containers()
                });
                Swal.fire({
                    title: "Sucesso!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                Swal.fire({
                    title: "Ocorreram os seguintes problemas:",
                    text: response["error_list"],
                    icon: "error",
                    button: "Tentar novamente",
                });
            }
        },
        error: function (err) {
            console.log(err);
        },
        statusCode: {
            404: function () {
                alert("Pagina não encontrada!");
                document.location.reload();
            },
            500: function () {
                alert("Falha ao conectar ao servidor!");
                document.location.reload();
            }
        }
    });

    return false;
});