

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url(<?= base_url('public/img/auth/login.jpg') ?>)">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-justify">
                                <a class="header-brand" href="javascript:void">                            
                                <span style="color: #444444; font-family: 'Fjalla One', sans-serif; font-size: 30px;">HelpOnPets</span>
                                </a>
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
                            
                            <h3>Seja muito bem-vindo(a)!</h3>
                            
                            <form method="POST" action="<?= base_url('login/auth'); ?>">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Lembrar de mim</span> <!--criar método para redefinir senha -->
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="<?= base_url('login/senha'); ?>">Esqueceu a senha?</a> <!--criar método para redefinir senha -->
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-secondary">Entrar</button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     