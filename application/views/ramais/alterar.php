

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
                                <?php foreach($ramais as $ramal): ?>
                                <div class="card">   
                                <div class="card-header"><?= (isset($ramal) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'. date("d/m/Y H:i:s", strtotime( $ramal->ramal_data_alteracao)): ''); ?></div>
                                <div class="card-body">                                   
                                    <form class="forms-sample" name="form_core" method="POST">
                                        <div class="form-group row">
                                            <div class="col-md-8 mb-20">                                            
                                            <label>Departamento</label>
                                                <input type="text" class="form-control" name="departamento" value="<?= (isset($ramal) ?$ramal->departamento : set_value('departamento')); ?>" style="text-transform: uppercase;">
                                            <?= form_error('local', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                              
                                            <div class="col-md-4 mb-20">
                                                <label>Ramal</label>
                                                <input type="text" class="form-control" name="ramal" value="<?= (isset($ramal) ?$ramal->ramal : set_value('ramal')); ?>" placeholder="0000">
                                                <?= form_error('ramal', '<div class="text-danger">', '</div>'); ?>
                                            </div>                                                 
                                        </div>                                     
                                                   
                                        <?php if (isset($ramal)): ?>
                                            <div class="form-group row">                                                    
                                                <div class="col-md-12">
                                                    <input type="hidden" class="form-control" name="id" value="<?= $ramal->id ; ?>">
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
        