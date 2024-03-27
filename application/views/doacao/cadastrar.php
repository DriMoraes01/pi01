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
                                    <div class="col-md-6 mb-20">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" style="text-transform: uppercase;">
                                        <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf">
                                            <?= form_error('cpf', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 mb-20">
                                        <label for="valor">Valor</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="R$" id="valor" name="valor">
                                            <?= form_error('valor', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-10">
                                        <div class="form-group">Data da Doação</label>
                                            <input type="date" class="form-control" id="data_doacao" name="data_doacao">
                                            <?= form_error('data_doacao', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-10">
                                        <div class="form-group">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                            <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
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