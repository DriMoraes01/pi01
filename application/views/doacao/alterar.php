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
                    <?php foreach ($doacoes as $doacao) : ?>
                        <div class="card">
                            <div class="card-header"><?= (isset($doacao) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;' . date("d/m/Y H:i:s", strtotime($doacao->ultima_alteracao)) : ''); ?></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form_core" name="form_core" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-4 mb-20">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?= (isset($doacao) ? $doacao->nome : set_value('nome')); ?>" style="text-transform: uppercase;">
                                            <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cpf">CPF</label>
                                                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= (isset($doacao) ? $doacao->cpf : set_value('cpf')); ?>">
                                                <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label for="raca">Raça:</label>
                                            <input type="text" id="raca" class="form-control" name="raca" value="<?= (isset($animal) ? $animal->raca : set_value('raca')); ?>">
                                            <?= form_error('raca', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="porte">Porte:</label>
                                                <input type="text" class="form-control" id="porte" name="porte" value="<?= (isset($animal) ? $animal->porte : set_value('porte')); ?>">
                                                <?= form_error('porte', '<div class="text-danger">', '</div>'); ?>
                                                <small></small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="observacao">Observação:</label>
                                                <input type="text" class="form-control" id="observacao" name="observacao" value="<?= (isset($animal) ? $animal->observacao : set_value('observacao')); ?>">
                                                <?= form_error('observacao', '<div class="text-danger">', '</div>'); ?>
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