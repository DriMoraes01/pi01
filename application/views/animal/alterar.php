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
                    <?php foreach ($animais as $animal) : ?>
                        <div class="card">
                            <div class="card-header"><?= (isset($animal) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;' . date("d/m/Y H:i:s", strtotime($animal->ultima_alteracao)) : ''); ?></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form_core" name="form_core" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-4 mb-20">
                                            <label>Nome do Animal</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?= (isset($animal) ? $animal->nome : set_value('nome')); ?>" style="text-transform: uppercase;">
                                            <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3 mb-20">
                                            <label>Sexo</label>
                                            <input type="text" class="form-control" name="sexo" id="sexo" value="<?= (isset($animal) ? $animal->sexo : set_value('sexo')); ?>" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cor">Cor:</label>
                                                <input type="text" class="form-control" id="cor" name="cor" value="<?= (isset($animal) ? $animal->cor : set_value('cor')); ?>">
                                                <small></small>
                                                <?= form_error('cor', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-md-4 mb-20">
                                            <label>Raça:</label>
                                            <input type="raca" id="raca" class="form-control" name="raca" value="<?= (isset($animal) ? $animal->raca : set_value('raca')); ?>">
                                            <?= form_error('raca', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="porte">Porte:</label>
                                                <input type="text" class="form-control" id="porte" name="porte" value="<?= (isset($animal) ? $animal->porte : set_value('porte')); ?>">
                                                <?= form_error('porte', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="obs">Observação:</label>
                                                <input type="text" class="form-control" id="obs" name="obs" value="<?= (isset($animal) ? $animal->obs : set_value('obs')); ?>">
                                                <?= form_error('obs', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="data_cadastro">Data de Cadastro:</label>
                                                <input type="text" class="form-control" id="uf" name="uf" value="<?= (isset($animal) ? formata_data_banco_com_hora($animal->data_cadastro) : set_value('data_cadastro')); ?>" disabled>
                                                <?= form_error('data_cadastro', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if (isset($animal)) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="id" value="<?= $animal->id; ?>">
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