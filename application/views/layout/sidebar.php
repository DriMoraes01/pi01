<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="javascript:void">
                <span style="color: #f2f3ef; font-family: 'Fjalla One', sans-serif; font-size: 20px;">HelpOnPets
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-item">
                        <a href="<?= base_url('home'); ?>"><i class="ik ik-home"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Home</span></a>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Pessoas</span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('pessoa'); ?>"><i class="ik ik-home"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Pessoas</span></a>
                            <a href="<?= base_url('voluntario'); ?>"><i class="fas fa-file-invoice-dollar"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Voluntários</span> <span class="badge badge-success"></span></a>                           
                        </div>
                    </div>                   
                    <div class="nav-item">
                        <a href="<?= base_url('animal'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Animais</span> <span class="badge badge-success"></span></a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('adocao'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Adoção</span> <span class="badge badge-success"></span></a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('doacao'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Doação</span> <span class="badge badge-success"></span></a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('resgate'); ?>"><i class="ik ik-file-text"></i><span style="color: #f2f3ef; font-family: 'Roboto', sans-serif; font-size: 14px;">Resgate de Animais</span> <span class="badge badge-success"></span></a>
                    </div>
                    <?php if ($this->ion_auth->is_admin()) : ?>
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