

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

                                
                                <?php foreach($conta as $info): ?>
                                    <div class="card-header"><?= (isset($info) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'. formata_data_banco_com_hora($info->mensalidade_ultima_alteracao) : ''); ?></div>
                                    <div class="card-body">                                   
                                        <form class="forms-sample" name="form_index" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">                                                   
                                                        <label>Empresa</label>
                                                        <input type="text" class="form-control" name="nome_empresa" value="<?= (isset($info) ? $info->nome_empresa : set_value('nome_empresa')); ?>" readonly="">
                                                        <?= form_error('nome_empresa', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                               
                                                    <div class="col-md-6 mb-20">
                                                        <label>Processo</label>
                                                        <input type="text" class="form-control" name="processo" value="<?= (isset($info) ? $info->processo : set_value('processo')); ?>" readonly="">
                                                        <?= form_error('processo', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-3 mb-20">                                                   
                                                        <label>AF</label>
                                                        <input type="text" class="form-control" name="af" value="<?= (isset($info) ? $info->af : set_value('af')); ?>" readonly="">
                                                        <?= form_error('af', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                               
                                                    <div class="col-md-3 mb-20">
                                                        <label>Valor Mensal</label>
                                                        <input type="text" class="form-control" name="valor" value="<?= (isset($info) ? $info->valor : set_value('valor')); ?>" readonly="">
                                                        <?= form_error('valor', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                    <div class="col-md-3 mb-20">                                                   
                                                        <label>Período</label>
                                                        <input type="text" class="form-control" name="periodo" value="<?= (isset($info) ? $info->periodo : set_value('periodo')); ?>" readonly="">
                                                        <?= form_error('periodo', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                               
                                                    <div class="col-md-3 mb-20">
                                                        <label>Total Processo</label>
                                                        <input type="text" class="form-control" name="total_processo" value="<?= (isset($info) ? $info->total_processo : set_value('total_processo')); ?>" readonly="">
                                                        <?= form_error('total_processo', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                    <div class="col-md-2 mb-20">                                                   
                                                        <label>Contrato</label>
                                                        <input type="text" class="form-control" name="contrato" value="<?= (isset($info) ? $info->contrato : set_value('contrato')); ?>" readonly="">
                                                        <?= form_error('contrato', '<div class="text-danger">', '</div>'); ?>
                                                    </div>     
                                                </div>                                        

                                                <?php endforeach; ?>
                                               
                                                <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                       </form>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>             

               
                
            </div>
        