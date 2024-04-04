            <?php $this->load->view('layout/navbar'); ?>
            <div class="page-wrap">

                <?php $this->load->view('layout/sidebar'); ?>

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="<?php echo $icone_view; ?> bg-blue"></i>
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
                                                <a title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <?php if ($message = $this->session->flashdata('sucesso')) : ?>

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

                        <?php elseif ($message = $this->session->flashdata('error')) : ?>

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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <?php if ($this->ion_auth->is_admin()) : ?>
                                        <div class="card-header d-block"></a></div>
                                    <?php else : ?>
                                        <div class="card-header d-block"></div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table data-table table-sm pl-20 pr-20">
                                                <thead>
                                                    <tr>                                                      
                                                        <th class="text-center">Nome</th>
                                                        <th class="text-center">CPF</th>
                                                        <th class="text-center">Celular</th>
                                                        <th class="text-center">E-mail</th>
                                                        <th class="text-center">Observação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($voluntarios)) : ?>
                                                        <?php foreach ($voluntarios as $voluntario) : ?>                                                
                                                                
                                                            <td class="text-center"><?= mb_strtoupper($voluntario->nome); ?></td>
                                                            <td class="text-center"><?= $voluntario->cpf; ?></td>
                                                            <td class="text-center"><?= $voluntario->celular; ?></td>
                                                            <td class="text-center"><?= $voluntario->email ?></td>
                                                            <td class="text-center"><?= $voluntario->observacao; ?></td>
                                                            </tr>
                                                            <div class="modal fade" id="categoria-<?= $voluntario->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document" id="categoria-<?= $voluntario->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterLabel"><i class="fas fa-exclamation-triangle text-danger"></i>&nbsp;Tem certeza que quer excluir?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Para apagar o registro, clique em <strong>Sim, excluir</strong> </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button data-toggle="tooltip" data-placement="bottom" title="Cancelar Exclusão" type="button" class="btn btn-secondary" data-dismiss="modal">Não, voltar</button>
                                                                            <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()) . '/del/' . $adocao->id; ?> " class="btn btn-danger">Sim, excluir</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>