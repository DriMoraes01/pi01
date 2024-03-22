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
                                    <div class="col-md-2 mb-20">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?= set_value('cpf'); ?>" placeholder="111.111.111-01">
                                        <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= set_value('nome'); ?>" style="text-transform: uppercase;">
                                        <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>                                    
                                    <div class="col-md-2 mt-10">
                                        <div class="form-group">
                                            <label for="sexo">Sexo:</label>
                                            <select name="sexo" id="sexo">
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                                <option value="outro">Prefiro não Dizer</option>
                                            </select>
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label for="celular">Celular:</label>
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder="(99)99999-9999">
                                            <?= form_error('celular', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="uf">E-mail:</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label for="cep">CEP:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="00000-000" id="cep" name="cep" maxlength="9" onblur="pesquisacep(this.value)">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">Buscar</button>
                                            </div>
                                            <?= form_error('cep', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logradouro">Logradouro:</label>
                                            <input type="text" class="form-control" id="logradouro" name="logradouro">
                                            <?= form_error('logradouro', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="numero">N°:</label>
                                            <input type="text" class="form-control" id="numero" name="numero">
                                            <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="complemento">Complemento:</label>
                                            <input type="text" class="form-control" id="complemento" name="complemento">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ml-20">
                                        <div class="form-group">
                                            <label for="bairro">Bairro:</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro">
                                            <?= form_error('bairro', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 ml-20">
                                        <div class="form-group">
                                            <label for="localidade">Cidade:</label>
                                            <input type="text" class="form-control" id="localidade" name="localidade">
                                            <?= form_error('localidade', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="uf">UF:</label>
                                            <input type="text" class="form-control" id="uf" name="uf">
                                            <?= form_error('uf', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="data_cadastro">Data de Cadastro:</label>
                                            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro">
                                            <?= form_error('data_cadastro', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 ml-20">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info ml-20">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>