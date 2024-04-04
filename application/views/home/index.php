<?php $this->load->view('layout/sidebar'); ?>

<?php $this->load->view('layout/navbar'); ?>


<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Animais</h6>
                                <h3 class="fw-700 text-blue text-center"><?= $totAnimais; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star bg-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Voluntários</h6>
                                <h3 class="fw-700 text-green text-center"><?= $totVoluntarios; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user bg-green"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Doações</h6>
                                <h3 class="fw-700 text-red text-center">R$<?php echo $totDoacoes->valor_doacoes; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign bg-red"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Adoções</h6>
                                <h3 class="fw-700 text-yellow text-center"><?= $totAdocoes; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sun bg-yellow "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Resgates de Animais</h6>
                                <h3 class="fw-700 text-orange text-center"><?= $totResgates; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck bg-orange "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Usuários</h6>
                                <h3 class="fw-700 text-green text-center"><?= $totUsers; ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users bg-green "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>