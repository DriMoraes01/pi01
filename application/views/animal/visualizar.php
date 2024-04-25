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
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <img width="50" height="50" class="rounded-circle" src="<?= base_url($animal->foto) ?>">
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label for="nome">Nome do Animal</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($animal) ? $animal->nome : ''; ?>" style="text-transform: uppercase;" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label for="castrado">Castrado</label>
                                            <?php if (($animal->castrado == '0')) : ?>
                                                <input type="text" class="form-control" name="castrado" id="castrado" value="<?= 'Não'; ?>" readonly>
                                            <?php else : ?>
                                                <input type="text" class="form-control" name="castrado" id="castrado" value="<?= 'Sim'; ?>" readonly>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="sexo">Sexo</label>
                                                <input type="text" id="sexo" class="form-control" name="sexo" value="<?= isset($animal) ? $animal->sexo : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="data_cadastro">Data de Cadastro</label>
                                                <input type="text" id="data_cadastro" class="form-control" name="data_cadastro" value="<?= isset($animal) ? formata_data_banco_sem_hora($animal->data_cadastro) : ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cor">Cor</label>
                                                <input type="text" class="form-control" id="cor" name="cor" value="<?= isset($animal) ? $animal->cor : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label for="raca">Raça</label>
                                            <input type="text" id="raca" class="form-control" name="raca" value="<?= isset($animal) ? $animal->raca : ''; ?>" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="porte">Porte</label>
                                                <input type="text" id="porte" class="form-control" name="porte" value="<?= isset($animal) ? $animal->porte : ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="observacao">Observação:</label>
                                                <input type="text" class="form-control" id="observacao" name="observacao" value="<?= isset($animal) ? $animal->observacao : ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($animal)) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="id" value="<?= $animal->id_animal; ?>">
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