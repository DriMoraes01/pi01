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
                                        <div class="form-group">Data de Cadastro:</label>
                                            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro">
                                            <?= form_error('data_cadastro', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">Data de Resgate:</label>
                                            <input type="date" class="form-control" id="data_resgate" name="data_resgate" value="<?= (isset($resgate) ? $resgate->data_resgate : set_value('data_resgate')); ?>" disabled>
                                            <?= form_error('data_resgate', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">Local de Resgate:</label>
                                            <input type="text" class="form-control" id="local_resgate" name="local_resgate" value="<?= (isset($resgate)) ? $resgate->logradouro . ',&nbsp;' . $resgate->numero . ',&nbsp;' . $resgate->bairro . ',&nbsp;' . $resgate->localidade . ',&nbsp;' . $resgate->uf : set_value('local_resgate'); ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 mb-20">
                                        <label for="nome">Nome do Animal</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= set_value('nome'); ?>" style="text-transform: uppercase;">
                                        <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label for="cor">Cor:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Preto" id="cor" name="cor">
                                            <?= form_error('cor', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-20">
                                        <div class="form-group">
                                            <label for="sexo">Sexo:</label>
                                            <select name="sexo" id="sexo">
                                                <option value="macho">Macho</option>
                                                <option value="femea">Fêmea</option>
                                            </select>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label for="raca">Raça:</label>
                                            <input type="text" class="form-control" id="raca" name="raca">
                                            <?= form_error('raca', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="porte">Porte:</label>
                                            <input type="text" class="form-control" id="porte" name="porte">
                                            <?= form_error('porte', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="obs">Observação:</label>
                                            <input type="text" class="form-control" id="obs" name="obs">
                                            <?= form_error('obs', '<div class="text-danger">', '</div>'); ?>
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
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>