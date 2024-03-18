


                <div class="container">
                    <footer class="footer">                    
                        <div class="w-100 clearfix">
                            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ThemeKit v2.0. All Rights Reserved.</span>
                            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Customizado <i class="fas fa-code text-dark"></i> by <a href="javascript:void" class="text-dark" >Adriele</a></span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        
        
        

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                    
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="<?= base_url('home'); ?>"><i class="ik ik-home"></i><span>Home</span></a>
                                </div>                               
                                <div class="app-item">
                                    <a href="<?= base_url('contas'); ?>"><i class="fas fa-file-invoice-dollar"></i><span>Contas</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('requisicoes'); ?>"><i class="ik ik-file-text"></i><span>Requisições</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('af'); ?>"><i class="ik ik-file-text"></i><span>AF(s)</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('contratos'); ?>"><i class="ik ik-file-text"></i><span>Contratos</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('telefonia'); ?>"><i class="ik ik-phone"></i><span>Linhas</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('ramais'); ?>"><i class="ik ik-phone"></i><span>Ramais Paço</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('usuarios'); ?>"><i class="fas fa-users"></i><span>Usuários</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="<?= base_url('sistema'); ?>"><i class="ik ik-settings"></i><span>Sistema</span></a>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/src/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/src/js/vendor/jquery-3.3.1.min.js'); ?>"></script>        
        <script src="<?php echo base_url('assets/plugins/popper.js/dist/umd/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/screenfull/dist/screenfull.js'); ?>"></script>       
        <script src="<?php echo base_url('assets/dist/js/theme.min.js'); ?>"></script>  
        <script src="<?php echo base_url('assets/js/pesquisa.js'); ?>"></script>  	
        <script src="<?php echo base_url('assets/js/page.js'); ?>"></script>
        
       

        <?php if(isset($scripts)) : ?>

        <?php foreach ($scripts as $script) : ?>

            <script src="<?php echo base_url('assets/'.$script); ?>"></script>

        <?php endforeach; ?>

        <?php endif; ?>

    </body>
</html>
