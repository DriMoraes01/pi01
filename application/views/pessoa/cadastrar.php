<?php $this->load->view('layout/navbar'); ?>
<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="<?= $icone_view; ?> bg-blue"></i>
                            <div class="d-inline">
                                <h5><?php echo $titulo; ?></h5>
                                <span><?php echo $sub_titulo; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form name="form_core" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-4 mb-20">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome" value="<?= set_value('nome'); ?>" style="text-transform: uppercase;">
                                        <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="sobrenome" value="<?= set_value('sobrenome'); ?>" style="text-transform: uppercase;">
                                        <?= form_error('sobrenome', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" name="cpf" value="<?= set_value('cpf'); ?>" placeholder="111.111.111-01">
                                        <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label>RG</label>
                                        <input type="text" class="form-control" name="rg" value="<?= set_value('rg'); ?>" placeholder="11.111.111-1">
                                        <?= form_error('rg', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 mb-20">
                                        <label for="cep">CEP:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="00000-000" aria-label="" aria-describedby="" id="cep" name="cep" maxlength="9" placeholder="00000-000" onblur="pesquisacep(this.value)">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">Buscar</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="logradouro">Logradouro:</label>
                                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="numero">N°:</label>
                                                <input type="text" class="form-control" id="numero" name="numero">
                                                <small></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bairro">Bairro:</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bairro">Complemento:</label>
                                            <input type="text" class="form-control" id="complemento" name="complemento">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cidade">Cidade:</label>
                                            <input type="text" class="form-control" id="cidade" name="cidade">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="uf">UF:</label>
                                            <input type="text" class="form-control" id="uf" name="uf">
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Telefone:</label>
                                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(99)9999-9999">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Celular:</label>
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder="(99)99999-9999">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">E-mail:</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Data de Cadastro:</label>
                                            <input type="text" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Data de Cadastro do Usuário" disabled>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">Gênero:</label>
                                            <input type="text" class="form-control" id="genero" name="genero">
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="uf">E-mail:</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                                    <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>