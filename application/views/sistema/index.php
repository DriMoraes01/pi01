

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
                                                <a data-toggle="tooltip" data-placement="left" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                            </li>                                            
                                                 
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <?php if($message = $this->session->flashdata('sucesso')) : ?>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                                        <strong><?= $message ?></strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="ik ik-x"></i>
                                            </button>
                                    </div>
                                </div>
                                </div>

                                <?php endif; ?>

                                <?php if($message = $this->session->flashdata('error')) : ?>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                        <strong><?= $message ?></strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="ik ik-x"></i>
                                            </button>
                                    </div>
                                </div>
                                </div>

                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                
                                <?php foreach($sistema as $sistem): ?>
                                    <div class="card-header"><?= (isset($sistem) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'.  date("d/m/Y H:i:s", strtotime( $sistem->sistema_data_alteracao)): ''); ?></div>
                                    <div class="card-body">                                   
                                        <form class="forms-sample" name="form_index" method="POST">
                                                <div class="form-group row">                                                                                                
                                                    <div class="col-md-6 mb-20">
                                                        <label>Nome do Sistema</label>
                                                        <input type="text" class="form-control" name="sistema_nome" value="<?= (isset($sistem) ? $sistem->sistema_nome : set_value('sistema_nome')); ?>">
                                                        <?= form_error('sistema_nome', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                    <div class="col-md-6 mb-20">                                                   
                                                        <label>URL do site</label>
                                                        <input type="text" class="form-control" name="sistema_site_url" value="<?= (isset($sistem) ? $sistem->sistema_site_url : set_value('sistema_site_url')); ?>">
                                                        <?= form_error('sistema_site_url', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                               
                                                    <div class="col-md-6 mb-20">
                                                        <label>E-mail de contato</label>
                                                        <input type="email" class="form-control" name="sistema_email" value="<?= (isset($sistem) ? $sistem->sistema_email : set_value('sistema_email')); ?>">
                                                        <?= form_error('sistema_email', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                </div>                    
                                                <?php endforeach; ?>

                                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                                <a href="<?= base_url('/'); ?>" class="btn btn-info">Voltar</a>
                                       </form>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>             
            </div>
        