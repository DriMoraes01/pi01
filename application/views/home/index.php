
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
                                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Total de Contas</h6>
                                                <h3 class="fw-700 text-blue text-center"><?= $totContas; ?></h3>                                               
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-invoice-dollar bg-blue"></i>
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
                                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Valor das Contas</h6>
                                                <h3 class="fw-700 text-green text-center">R$&nbsp;<?php echo $total_mensalidades->total_mensalidades; ?></h3>                                               
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hand-holding-usd bg-green"></i>
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
                                                <h6 class="mb-25 text-center" style="font-family: 'Roboto', sans-serif; font-size: 18px;">Usuários</h6>
                                                <h3 class="fw-700 text-yellow text-center"><?= $totUsers; ?></h3>                                               
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users bg-yellow"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        