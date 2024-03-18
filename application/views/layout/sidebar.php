


        <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="javascript:void">                            
                            <span style="color: #f2f3ef; font-family: 'Fjalla One', sans-serif; font-size: 20px;">Kontensystem</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">                                                             
                                    <div class="nav-item">
                                        <a href="<?= base_url('home'); ?>"><i class="ik ik-home"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Home</span></a>
                                    </div>
                                    <div class="nav-item">
                                        <a href="<?= base_url('contas'); ?>"><i class="fas fa-file-invoice-dollar"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Contas</span> <span class="badge badge-success"></span></a>
                                    </div>
                                    <div class="nav-item">
                                        <a href="<?= base_url('requisicoes'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Requisições</span> <span class="badge badge-success"></span></a>
                                    </div> 
                                    <div class="nav-item">
                                        <a href="<?= base_url('af'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">AF</span> <span class="badge badge-success"></span></a>
                                    </div> 
                                    <div class="nav-item">
                                        <a href="<?= base_url('contratos'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Contratos</span> <span class="badge badge-success"></span></a>
                                    </div>

                                    <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-phone"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Telefonia</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= base_url('telefonia'); ?>" class="menu-item" style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 12px;">Linhas</a>
                                        <a href="<?= base_url('ramais'); ?>" class="menu-item" style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 12px;">Ramais Paço</a>                                        
                                    </div>
                                    </div>             
                                    <?php if ($this->ion_auth->is_admin()): ?>                                   
                                    <div class="nav-lavel">Administração</div>                                                              
                                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'usuarios' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?= base_url('usuarios'); ?>"><i class="fas fa-users"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Usuários</span> <span class="badge badge-success"></span></a>
                                    </div>
                                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'sistema' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?= base_url('sistema'); ?>"><i class="ik ik-settings"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Sistema</span> <span class="badge badge-success"></span></a>
                                    </div>
                                    <?php endif; ?>          
                            </nav>
                        </div>
                    </div>
                </div>
                


             