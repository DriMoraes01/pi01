

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
                                <div class="card">
                               
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <form class="forms-sample" name="form_core" action="<?= base_url($this->router->fetch_class()).'/cadastrar/'; ?>" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-4 mb-20">
                                                        <label>Nome da Empresa</label>
                                                        <input type="text" class="form-control" name="nome_empresa" value="<?php echo set_value('nome_empresa'); ?>">
                                                        <?= form_error('nome_empresa', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-4 mb-20">
                                                        <label>Serviço Prestado</label>
                                                        <input type="text" class="form-control" name="servico" value="<?php echo set_value('servico'); ?>">
                                                        <?= form_error('servico', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-4 mb-20">
                                                        <label>AF</label>
                                                        <input type="text" class="form-control" name="af" value="<?php echo set_value('af'); ?>">
                                                        <?= form_error('af', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">                                                    
                                                    <div class="col-md-4 mb-20">
                                                        <label>Data de Vencimento</label>
                                                        <input type="text" class="form-control" name="data_vencto" value="<?php echo set_value('data_vencto'); ?>">
                                                        <?= form_error('data_vencto', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-4 mb-20">
                                                        <label>Valor</label>
                                                        <input type="text" class="form-control" name="valor" value="<?php echo set_value('valor'); ?>">
                                                        <?= form_error('valor', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-4 mb-20">
                                                            <label>Tipo de Documento</label>
                                                            <input type="text" class="form-control" name="tipo_documento" value="<?php echo set_value('tipo_documento'); ?>">
                                                            <?= form_error('tipo_documento', '<div class="text-danger">', '</div>'); ?>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row">
                                                        <div class="col-md-2 mb-20">
                                                            <label>Processo</label>
                                                            <input type="text" class="form-control" name="processo" value="<?php echo set_value('processo'); ?>">
                                                            <?= form_error('processo', '<div class="text-danger">', '</div>'); ?>
                                                        </div>
                                                        <div class="col-md-2 mb-20">
                                                            <label>Valor do Processo</label>
                                                            <input type="text" class="form-control" name="total_processo" value="<?php echo set_value('total_processo'); ?>">
                                                            <?= form_error('total_processo', '<div class="text-danger">', '</div>'); ?>
                                                        </div>
                                                        <div class="col-md-3 mb-20">
                                                            <label>Período</label>
                                                            <input type="text" class="form-control" name="periodo" value="<?php echo set_value('periodo'); ?>">
                                                            <?= form_error('periodo', '<div class="text-danger">', '</div>'); ?>
                                                        </div>
                                                        <div class="col-md-3 mb-20">
                                                            <label>Contrato</label>
                                                            <input type="text" class="form-control" name="contrato" value="<?php echo set_value('contrato'); ?>">
                                                            <?= form_error('contrato', '<div class="text-danger">', '</div>'); ?>
                                                        </div>
                                                        <div class="col-md-2 mb-20">
                                                            <label>Ativa</label>
                                                            <select name="ativa" class="form-control">
                                                                <?php if(isset($mensalidade)): ?>
                                                                <option value="0" <?= ($mensalidade->ativa == 0 ? 'selected' : '')?>>Não</option>
                                                                <option value="1" <?= ($mensalidade->ativa == 1 ? 'selected' : '')?>>Sim</option>

                                                                <?php else: ?>

                                                                    <option value="0">Não</option>
                                                                    <option value="1">Sim</option>

                                                                <?php endif; ?>    
                                                            </select>
                                                        </div>
                                                    </div>

                                                    
                                               
                                                <?php if (isset($mensalidade)): ?>
                                                        <div class="form-group row">                                                    
                                                            <div class="col-md-12">
                                                                <input type="hidden" class="form-control" name="id_empresa" value="<?= $mensalidade->id_empresa ; ?>">
                                                            </div>
                                                        </div>  
                                                    <?php endif; ?>

                                                

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
        