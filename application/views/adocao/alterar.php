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
                    <?php foreach ($adocoes as $adocao) : ?>
                        <div class="card">
                            <div class="card-header"><?= (isset($adocao) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;' . date("d/m/Y H:i:s", strtotime($adocao->ultima_alteracao)) : ''); ?></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form_core" name="form_core" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>Nome do Adotante</label>
                                            <input type="text" class="form-control" id="nome_adotante" name="nome_adotante" value="<?= (isset($adocao) ? $adocao->nome_adotante : set_value('nome_adotante')); ?>">
                                            <?= form_error('nome_adotante', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4 mb-20">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= (isset($adocao) ? $adocao->cpf : set_value('cpf')); ?>">
                                            <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4 mb-20">
                                            <label>Data de Adoção</label>
                                            <input type="date" class="form-control" id="data_adocao" name="data_adocao" value="<?= (isset($adocao) ? $adocao->data_adocao : set_value('data_adocao')); ?>">
                                            <?= form_error('data_adocao', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= (isset($adocao) ? $adocao->email : set_value('email')); ?>">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Celular</label>
                                            <input type="text" class="form-control" id="celular" name="celular" value="<?= (isset($adocao) ? $adocao->celular : set_value('celular')); ?>">
                                            <?= form_error('celular', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>Tipo de Animal</label>
                                            <input type="text" class="form-control" id="tipo_animal" name="tipo_animal" value="<?= (isset($adocao) ? $adocao->tipo_animal : set_value('tipo_animal')); ?>">
                                            <?= form_error('tipo_animal', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Nome do Animal</label>
                                            <input type="text" class="form-control" id="nome_animal" name="nome_animal" value="<?= (isset($adocao) ? $adocao->nome_animal : set_value('nome_animal')); ?>">
                                            <?= form_error('nome_animal', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3 mb-20">
                                            <label>Sexo</label></br>
                                            <select name="sexo_animal" id="sexo_animal" value="<?= (isset($adocao) ? $adocao->sexo_animal : set_value('sexo_animal')); ?>">
                                                <option value="Macho">Macho</option>
                                                <option value="Fêmea">Fêmea</option>
                                            </select>
                                            <small></small>
                                            <?= form_error('sexo_animal', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <div class="col-md-3 mb-20">
                                            <label for="cep">CEP:</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="cep" name="cep" maxlength="9" value="<?= (isset($adocao) ? $adocao->cep : set_value('cep')); ?>" onblur="pesquisacep(this.value)">
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
                                                <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= (isset($adocao) ? $adocao->logradouro : set_value('logradouro')); ?>">
                                                <?= form_error('logradouro', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="numero">N°:</label>
                                                <input type="text" class="form-control" id="numero" name="numero" value="<?= (isset($adocao) ? $adocao->numero : set_value('numero')); ?>">
                                                <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-20">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= (isset($adocao) ? $adocao->bairro : set_value('bairro')); ?>">
                                            <?= form_error('bairro', '<div class="text-danger">', '</div>'); ?>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="localidade">Cidade:</label>
                                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?= (isset($adocao) ? $adocao->localidade : set_value('localidade')); ?>">
                                                <?= form_error('localidade', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="uf">UF:</label>
                                                <input type="text" class="form-control" id="uf" name="uf" value="<?= (isset($adocao) ? $adocao->uf : set_value('uf')); ?>">
                                                <?= form_error('uf', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="observacao">Observação</label>
                                                <input type="text" class="form-control" id="observacao" name="observacao" value="<?= (isset($adocao) ? $adocao->observacao : set_value('observacao')); ?>">
                                                <?= form_error('observacao', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($adocao)) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="id" value="<?= $adocao->id; ?>">
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