

        <header class="header-top" header-theme="blue">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>                            
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">                  
                           <?php if ($this->ion_auth->is_admin()): ?>
                           <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                           &nbsp; &nbsp; 
                           <?php endif; ?>
                           <?php if ($this->ion_auth->is_admin()): ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-user ik-2x text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a data-toggle="tooltip" data-placement="left" title="Gerenciar perfil" class="dropdown-item" href="<?php echo base_url('usuarios/editar/'.$this->session->userdata('user_id')); ?>"><i class="ik ik-user dropdown-icon"></i> Perfil</a>                                   
                                    <a data-toggle="tooltip" data-placement="left" title="Encerrar a sessão" class="dropdown-item" href="<?= base_url('login/logout'); ?>"><i class="ik ik-power dropdown-icon"></i> Sair</a>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-user ik-2x text-white"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a data-toggle="tooltip" data-placement="left" title="Visualizar perfil" class="dropdown-item" href="<?php echo base_url('usuarios/visualizar/'.$this->session->userdata('user_id')); ?>"><i class="ik ik-user dropdown-icon"></i> Perfil</a>
                                    <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><i class="ik ik-power dropdown-icon"></i> Sair</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        </header>
