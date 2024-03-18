

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

                        <?php if(isset($usuarios)): ?>
                          <?php  foreach($usuarios as $usuario): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><?= (isset($usuario) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;'. formata_data_banco_com_hora($usuario->ultima_alteracao) : ''); ?></div>
                                    <div class="card-body">
                                        <form class="forms-sample" name="form_core" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label>Nome</label>
                                                        <input type="text" class="form-control" name="first_name" value="<?= (isset($usuario) ? $usuario->first_name : set_value('first_name')); ?>">
                                                        <?= form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label>Sobrenome</label>
                                                        <input type="text" class="form-control" name="last_name" value="<?= (isset($usuario) ? $usuario->last_name : set_value('last_name')); ?>">
                                                        <?= form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label>Usuário</label>
                                                        <input type="text" class="form-control" name="username" value="<?= (isset($usuario) ? $usuario->username : set_value('username')); ?>">
                                                        <?= form_error('username', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label>E-mail (Login)</label>
                                                        <input type="email" class="form-control" name="email" value="<?= (isset($usuario) ? $usuario->email : set_value('email')); ?>">
                                                        <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label for="senha">Senha</label>
                                                        <input type="password" class="form-control"  name="password" value="">
                                                        <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label for="confirmacao">Confirmação</label>
                                                        <input type="password" class="form-control" name="confirmacao" value="">
                                                        <?= form_error('confirmacao', '<div class="text-danger">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                        <label>Perfil de Acesso</label>

                                                        <select name="perfil" class="form-control">           

                                                             <?php if(isset($usuario)): ?>  

                                                            <option value="2"<?= ($perfil_usuario->id == 2 ? 'selected' : '')?>>User</option>
                                                            <option value="1"<?= ($perfil_usuario->id == 1 ? 'selected' : '')?>>Administrador</option>

                                                            <?php else: ?> 

                                                            <option value="2">User</option>
                                                            <option value="1">Administrador</option>
                                                             
                                                            <?php endif; ?>  

                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-20">
                                                        <label>Ativo</label>
                                                        <select name="active" class="form-control">
                                                            <?php if(isset($usuario)): ?>
                                                            <option value="0" <?= ($usuario->active == 0 ? 'selected' : '')?>>Não</option>
                                                            <option value="1" <?= ($usuario->active == 1 ? 'selected' : '')?>>Sim</option>

                                                            <?php else: ?>

                                                                <option value="0">Não</option>
                                                                <option value="1">Sim</option>

                                                            <?php endif; ?>    
                                                        </select>
                                                    </div>
                                                </div>

                                                    <?php if (isset($usuario)): ?>
                                                        <div class="form-group row">                                                    
                                                            <div class="col-md-12">
                                                                <input type="hidden" class="form-control" name="usuario_id" value="<?= $usuario->id ; ?>">
                                                            </div>
                                                        </div>  
                                                    <?php endif; ?>
                                               
                                                    <?php endforeach;?>      
                                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                                <a href="<?= base_url(); ?>" class="btn btn-info">Voltar</a>
                                            </form>                                              
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php endif; ?>                          
                    </div>
                </div>       
            </div>
        