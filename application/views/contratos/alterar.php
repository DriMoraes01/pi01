

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
                                            <li class="breadcrumb-item">
                                                <a data-toggle="tooltip" data-placement="bottom" title="Listar"  href="<?php echo base_url($this->router->fetch_class()); ?>">Listar &nbsp;<?= $this->router->fetch_class(); ?></a>
                                            </li>      
                                            <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($cts as $ct): ?>
                                <div class="card">   
                                <div class="card-header"><?= (isset($ct) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'. date("d/m/Y H:i:s", strtotime( $ct->contrato_data_alteracao)): ''); ?></div>
                                <div class="card-body">                                   
                                    <form class="forms-sample" name="form_core" method="POST">
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-20">
                                            <label>Número</label>
                                            <input type="text" class="form-control" name="numero" value="<?= (isset($ct) ?$ct->numero : set_value('numero')); ?>">
                                            <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                            <div class="col-md-4 mb-20">                                                 
                                                <label>Empresa</label>
                                                <input type="text" class="form-control" name="nome_empresa" value="<?= (isset($ct) ?$ct->nome_empresa : set_value('nome_empresa')); ?>">
                                                <?= form_error('nome_empresa', '<div class="text-danger">', '</div>'); ?>                                                          
                                            </div>
                                            <div class="col-md-4 mb-20">
                                                <label>Serviço</label>
                                                <input type="text" class="form-control" name="servico" value="<?= (isset($ct) ?$ct->servico : set_value('servico')); ?>">                                                    
                                                <?= form_error('servico', '<div class="text-danger">', '</div>'); ?>
                                            </div>                                                                                        
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-20">
                                                <label>AF</label> 
                                                <input type="text" class="form-control" name="af" value="<?= (isset($ct) ?$ct->af : set_value('af')); ?>">                                                
                                                <?= form_error('af', '<div class="text-danger">', '</div>'); ?>
                                            </div>    
                                            <div class="col-md-4 mb-20">
                                            <label>Início</label>
                                            <input type="date" class="form-control" name="data_inicio" value="<?= (isset($ct) ?$ct->data_inicio : set_value('data_inicio')); ?>">
                                            <?= form_error('data_inicio', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                            <div class="col-md-4 mb-20">
                                                <label>Fim</label>
                                                <input type="date" class="form-control" name="data_fim" value="<?= (isset($ct) ?$ct->data_fim : set_value('data_fim')); ?>">                                                    
                                                <?= form_error('data_fim', '<div class="text-danger">', '</div>'); ?>
                                            </div>                                                                                   
                                        </div>            
                                        <?php if (isset($ct)): ?>
                                            <div class="form-group row">                                                    
                                                <div class="col-md-12">
                                                    <input type="hidden" class="form-control" name="id" value="<?= $ct->id ; ?>">
                                                </div>
                                            </div>  
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                            <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>                       
                    </div>
                </div>
        