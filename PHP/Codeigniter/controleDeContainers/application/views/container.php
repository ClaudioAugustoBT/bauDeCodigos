<main class="bg-light container-fluid h-100 w-100 d-inline-block" width="100%">
    <header class="row justify-content-center m-2">
        <div class="col-lg-offset-12 col-lg-12 text-center">
            <h2>GERENCIAMENTO DE CONTAINERS</h2>
        </div>
    </header>
    <section id="btn_row" class="row justify-content-center m-1">
        <div class="col-lg-offset-3 p-2 m-2">
            <button id="btn_novo_container" class="btn btn-info justify-content-center">CADASTRAR CONTAINER</button>
        </div>
    </section>
    <section id="table_row" class="row justify-content-center m-1 table-responsive">
        <table id="tb_containers" class="table table-striped table-bordered" width="90%" cellspacing="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th class="no-sort">Container</th>
                    <th class="no-sort">Cliente</th>
                    <th class="no-sort">Tipo</th>
                    <th class="no-sort">Status</th>
                    <th class="no-sort">Categoria</th>
                    <th class="no-sort">Ação </th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </section>

    <div id="modal_novo_container" class="modal">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <header class="modal-header">
                    <div class="title-header">
                        <h2>CADASTRAR CONTAINER</h2>
                    </div>
                </header>
                <section class="modal-body">
                    <form id="form_novo_container" class="was-validated">
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="nome_container">NOME DO CONTAINER</label>
                                <input type="text" id="nome_container" name="nome_container" class="form-control container_cod" minlength="11" maxlength="11" required />
                                <div class="invalid-feedback">Nome deve ter 4 letras e 7 numeros (Ex.: ABCD1234567)</div>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="nome_cliente">CLIENTE</label>
                                <input type="text" id="nome_cliente" name="nome_cliente" class="form-control" maxlength="40" required />
                                <div class="invalid-feedback">Digite o nome do cliente</div>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="tipo_container">TIPO CONTAINER</label>
                                <select name="tipo_container" id="tipo_container" class="form-control" style="width: 100%;" required>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">Selecione um tipo</div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3 p-1 justify-content-center">
                                <label>STATUS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status_cheio" value="c" checked required />
                                    <label class="form-check-label text-uppercase" for="status_cheio">
                                        Cheio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status_vazio" value="v" required />
                                    <label class="form-check-label text-uppercase" for="status_vazio">
                                        Vazio
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-3 p-1 justify-content-center">
                                <label>CATEGORIA</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat_exportacao" value="e" checked required />
                                    <label class="form-check-label text-uppercase" for="cat_exportacao">
                                        Exportação
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat_importacao" value="i" required />
                                    <label class="form-check-label text-uppercase" for="cat_importacao">
                                        Importação
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <div class="modal-footer justify-content-center">
                    <button type="button" id="btn_fechar_modal_container" class="btn btn-danger close-modal m-2 text-uppercase">FECHAR</button>
                    <button type="button" id="btn_cadastar_container" class="btn btn-primary m-2 text-uppercase">Cadastrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="modal_editar_container" class="modal">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <header class="modal-header">
                    <div class="title-header">
                        <h2>EDITAR DADOS DO CONTAINER</h2>
                    </div>
                </header>
                <section class="modal-body">
                    <form id="form_editar_container" class="was-validated">
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="editar_nome_container">CÓDIGO</label>
                                <input type="text" id="editar_cd_container" name="editar_cd_container" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="editar_nome_container">NOME DO CONTAINER</label>
                                <input type="text" id="editar_nome_container" name="editar_nome_container" class="form-control container_cod" minlength="11" maxlength="11" required />
                                <div class="invalid-feedback">Nome deve ter 4 letras e 7 numeros (Ex.: ABCD1234567)</div>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="editar_nome_cliente">CLIENTE</label>
                                <input type="text" id="editar_nome_cliente" name="editar_nome_cliente" class="form-control" maxlength="40" required />
                                <div class="invalid-feedback">Digite o nome do cliente</div>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="editar_tipo_container">TIPO CONTAINER</label>
                                <select name="editar_tipo_container" id="editar_tipo_container" class="form-control" style="width: 100%;" required>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">Selecione um tipo</div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3 p-1 justify-content-center">
                                <label>STATUS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editar_status" id="editar_status_cheio" value="c" required />
                                    <label class="form-check-label text-uppercase" for="editar_status_cheio">
                                        Cheio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editar_status" id="editar_status_vazio" value="v" required />
                                    <label class="form-check-label text-uppercase" for="editar_status_vazio">
                                        Vazio
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-3 p-1 justify-content-center">
                                <label>CATEGORIA</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editar_categoria" id="editar_cat_exportacao" value="e" required />
                                    <label class="form-check-label text-uppercase" for="editar_cat_exportacao">
                                        Exportação
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editar_categoria" id="editar_cat_importacao" value="i" required />
                                    <label class="form-check-label text-uppercase" for="editar_cat_importacao">
                                        Importação
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <div class="modal-footer justify-content-center">
                    <button type="button" id="btn_fechar_modal_editar_container" class="btn btn-danger close-modal m-2 text-uppercase">FECHAR</button>
                    <button type="button" id="btn_editar_container" class="btn btn-primary m-2 text-uppercase">SALVAR</button>
                </div>
            </div>

        </div>
    </div>

    <div id="modal_movimentar_container" class="modal">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <header class="modal-header">
                    <div class="title-header">
                        <h2>EDITAR DADOS DO CONTAINER</h2>
                    </div>
                </header>
                <section class="modal-body">
                    <form id="form_novo_container" class="was-validated">
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="editar_nome_container">NOME DO CONTAINER</label>
                                <input type="text" id="mov_nome_container" name="mov_nome_container" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md">
                                <label for="tipo_movimentacao" class="text-uppercase">TIPO de Movimentação</label>
                                <select name="tipo_movimentacao" id="tipo_movimentacao" class="form-control" style="width: 100%;" required>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">Selecione um tipo</div>
                            </div>
                        </div>
                    </form>
                </section>
                <div class="modal-footer justify-content-center">
                    <button type="button" id="btn_fechar_modal_movimentar_container" class="btn btn-danger close-modal m-2 text-uppercase">FECHAR</button>
                    <button type="button" id="btn_movimentar_container" class="btn btn-primary m-2 text-uppercase">INICIAR MOVIMENTAÇão</button>
                </div>
            </div>

        </div>
    </div>
</main>