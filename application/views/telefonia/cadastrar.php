

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
                                        <form name="form_core" method="POST">
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-20">
                                                <label>Local</label>
                                                <input type="text" class="form-control" name="local" value="<?= set_value('local'); ?>" style="text-transform: uppercase;">
                                                <?= form_error('local', '<div class="text-danger">', '</div>'); ?>
                                                </div>                                                
                                                <div class="col-md-3 mb-20">
                                                    <label>Linha</label>
                                                    <input type="text" class="form-control" name="linha" value="<?= set_value('linha'); ?>" placeholder="1935411000">
                                                    <?= form_error('linha', '<div class="text-danger">', '</div>'); ?>
                                                </div> 
                                                <div class="col-md-2 mb-20">
                                                    <label>NRC</label>
                                                    <input type="text" class="form-control" name="nrc" value="<?= set_value('nrc'); ?>">
                                                    <?= form_error('nrc', '<div class="text-danger">', '</div>'); ?>
                                                </div> 
                                                <div class="col-md-3 mb-20">
                                                    <label for="cep">CEP:</label>
                                                    <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="00000-000" aria-label="" aria-describedby="" id="cep" name="cep" maxlength="9" placeholder="00000-000" onblur="pesquisacep(this.value)">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button">Buscar</button>
                                                    </div>
                                                    </div>
                                                </div>                                               
                                            </div>                                
                                            <div class="form-group row">                                               
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="logradouro">Logradouro:</label>
                                                    <input type="text" class="form-control" id="logradouro" name="logradouro">
                                                    <small></small> 
                                                </div>  
                                                </div> 
                                                <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="numero">N°:</label>
                                                    <input type="text" class="form-control" id="numero" name="numero">
                                                    <small></small> 
                                                </div>  
                                                </div> 

                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="bairro">Bairro:</label>
                                                    <input type="text" class="form-control" id="bairro" name="bairro">
                                                    <small></small> 
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="localidade">Cidade:</label>
                                                    <input type="text" class="form-control" id="localidade" name="localidade">
                                                    <small></small> 
                                                    </div>                                                
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="uf">UF:</label>
                                                        <input type="text" class="form-control" id="uf" name="uf">
                                                        <small></small> 
                                                    </div>	
                                                </div>                                   
                                            </div>                                                                                    				
                                             <div class="form-group col-md-6">
                                                <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                                                <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                             </div>                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>  
            </div>
        