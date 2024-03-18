

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
                                        <form class="forms-sample" name="form_core" method="POST">
                                            <div class="form-group row">
                                                <div class="col-md-6 mb-20">
                                                <label>Número</label>
                                                <input type="text" class="form-control" name="numero" value="<?= set_value('numero'); ?>">
                                                <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="col-md-6 mb-20">
                                                <label>Data de Emissão</label>
                                                <input type="date" class="form-control" name="data" value="<?= set_value('data'); ?>">
                                                <?= form_error('data', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-20">
                                                    <label>Fornecedor</label>
                                                    <input type="text" class="form-control" name="fornecedor" value="<?= set_value('fornecedor'); ?>">                                                    
                                                    <?= form_error('fornecedor', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="col-md-4 mb-20">
                                                    <label>Ano</label>
                                                    <input type="text" class="form-control" name="ano" value="<?= set_value('ano'); ?>">  
                                                    <?= form_error('ano', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="col-md-4 mb-20">
                                                    <label>Descrição</label> 
                                                    <input type="text" class="form-control" name="descricao" value="<?= set_value('descricao'); ?>">                                                
                                                    <?= form_error('descricao', '<div class="text-danger">', '</div>'); ?>
                                                </div>                                           
                                            </div>                                            
                                            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                                            <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>  
            </div>
        