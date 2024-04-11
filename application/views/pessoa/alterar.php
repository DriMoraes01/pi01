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
                    <?php foreach ($pessoas as $pessoa) : ?>
                        <div class="card">
                            <div class="card-header"><?= (isset($pessoa) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;' . date("d/m/Y H:i:s", strtotime($pessoa->ultima_alteracao)) : ''); ?></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form_core" name="form_core" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= (isset($pessoa) ? $pessoa->cpf : set_value('cpf')); ?>">
                                            <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3 mb-20">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?= (isset($pessoa) ? $pessoa->nome : set_value('nome')); ?>" style="text-transform: uppercase;">
                                            <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label for="data_nascimento">Data de Nascimento</label>
                                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= (isset($pessoa) ? $pessoa->data_nascimento : set_value('data_nascimento')); ?>">
                                            <?= form_error('data_nascimento', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Sexo</label>
                                            <input type="text" class="form-control" name="sexo" id="sexo" value="<?= (isset($pessoa) ? $pessoa->sexo : set_value('sexo')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="celular">Celular:</label>
                                                <input type="text" class="form-control" id="celular" name="celular" value="<?= (isset($pessoa) ? $pessoa->celular : set_value('celular')); ?>">
                                                <small></small>
                                                <?= form_error('celular', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-20">
                                            <label>Email</label>
                                            <input type="email" id="email" class="form-control" name="email" value="<?= (isset($pessoa) ? $pessoa->email : set_value('email')); ?>">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3 mb-20">
                                            <label for="cep">CEP:</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="cep" name="cep" maxlength="9" value="<?= (isset($pessoa) ? $pessoa->cep : set_value('cep')); ?>" onblur="pesquisacep(this.value)">
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
                                                <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= (isset($pessoa) ? $pessoa->logradouro : set_value('logradouro')); ?>">
                                                <?= form_error('logradouro', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="numero">N°:</label>
                                                <input type="text" class="form-control" id="numero" name="numero" value="<?= (isset($pessoa) ? $pessoa->numero : set_value('numero')); ?>">
                                                <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="complemento">Complemento:</label>
                                                <input type="text" class="form-control" id="complemento" name="complemento" value="<?= (isset($pessoa) ? $pessoa->complemento : set_value('complemento')); ?>">
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-20">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= (isset($pessoa) ? $pessoa->bairro : set_value('bairro')); ?>">
                                            <?= form_error('bairro', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3 ml-20">
                                            <div class="form-group">
                                                <label for="localidade">Cidade:</label>
                                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?= (isset($pessoa) ? $pessoa->localidade : set_value('localidade')); ?>">
                                                <?= form_error('localidade', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="uf">UF:</label>
                                                <input type="text" class="form-control" id="uf" name="uf" value="<?= (isset($pessoa) ? $pessoa->uf : set_value('uf')); ?>">
                                                <?= form_error('uf', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="data_cadastro">Data de Cadastro:</label>
                                                <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="<?= (isset($pessoa) ? formata_data_banco_sem_hora($pessoa->data_cadastro) : set_value('data_cadastro')); ?>">
                                                <?= form_error('data_cadastro', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <?php if (isset($pessoa)) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="id" value="<?= $pessoa->id; ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="form-group row">
                                    <div class="col-md-12 ml-20">
                                        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                        <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>