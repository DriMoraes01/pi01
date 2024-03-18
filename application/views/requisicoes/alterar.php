

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
                                <?php foreach($requisicao as $requisicao): ?>
                                    <div class="card-header"><?= (isset($requisicao) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'. formata_data_banco_com_hora($requisicao->requisicao_data_alteracao) : ''); ?></div>
                                    <div class="card-body">
                                        <form class="forms-sample" name="form_core" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label>Número</label>
                                                        <input type="text" class="form-control" name="numero" value="<?= (isset($requisicao) ?$requisicao->numero : set_value('numero')); ?>">
                                                        <?= form_error('numero', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label>Data de Elaboração</label>
                                                        <input type="date" class="form-control" name="data" value="<?= (isset($requisicao) ?$requisicao->data : set_value('data')); ?>">
                                                        <?= form_error('data', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label>Descrição</label>
                                                        <textarea class="form-control" name="descricao"><?= (isset($requisicao) ? $requisicao->descricao : set_value('descricao')); ?></textarea>
                                                        <?= form_error('descricao', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label>Situação</label>
                                                        <textarea class="form-control" name="situacao"><?= (isset($requisicao) ? $requisicao->situacao : set_value('situacao')); ?></textarea>                                                        
                                                        <?= form_error('situacao', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row"> 
                                                    <div class="col-md-6 mb-20">
                                                        <label>Itens</label>
                                                        <textarea class="form-control" name="itens"><?= (isset($requisicao) ? $requisicao->itens : set_value('itens')); ?></textarea>                                                        
                                                        <?= form_error('itens', '<div class="text-danger">', '</div>'); ?>
                                                    </div> 
                                                                                                                                                     
                                                    <div class="col-md-6 mb-20">
                                                        <label>Ativo</label>
                                                        <select name="ativa" class="form-control">
                                                            <?php if(isset($requisicao)): ?>
                                                            <option value="0" <?= ($requisicao->ativa == 0 ? 'selected' : '')?>>Não</option>
                                                            <option value="1" <?= ($requisicao->ativa == 1 ? 'selected' : '')?>>Sim</option>
                                                            <?php else: ?>
                                                                <option value="0">Não</option>
                                                                <option value="1">Sim</option>
                                                            <?php endif; ?>    
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php if (isset($requisicao)): ?>
                                                    <div class="form-group row">                                                    
                                                        <div class="col-md-12">
                                                            <input type="hidden" class="form-control" name="id" value="<?= $requisicao->id ; ?>">
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
        