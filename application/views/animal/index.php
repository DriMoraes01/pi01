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
                            <!--    
                        <//?php elseif ($message = $this->session->flashdata('error')) : ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                        <strong><//?= $message ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                        <?php endif; ?>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block"><a data-toggle="tooltip" data-placement="right" title="Cadastrar <?= $this->router->fetch_class(); ?>" class="btn bg-blue float-right text-white" href="<?= base_url($this->router->fetch_class() . '/cadastrar/'); ?>">+ Novo</a></div>

                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table data-table table-sm pl-20 pr-20">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Foto</th>
                                                        <th class="text-center">Nome</th>
                                                        <th class="text-center">Sexo</th>
                                                        <th class="text-center">Raça</th>
                                                        <th class="text-center">Porte</th>
                                                        <th class="text-center">Castrado</th>
                                                        <th class="text-center">Data de Cadastro</th>
                                                        <th class="nosort text-right pr-25">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($animais)) : ?>
                                                        <?php foreach ($animais as $animal) : ?>
                                                            <tr>
                                                                <td class="text-center"><img width="50" height="50" class="rounded-circle" src="<?= base_url($animal->foto) ?>"></td>
                                                                <td class="text-center"><?= mb_strtoupper($animal->nome); ?></td>
                                                                <td class="text-center"><?= $animal->sexo; ?></td>
                                                                <td class="text-center"><?= $animal->raca; ?></td>
                                                                <td class="text-center"><?= $animal->porte; ?></td>
                                                                <td class="text-center">
                                                                    <?php if ($animal->castrado == '0') : ?>
                                                                        <?= "Não"; ?>
                                                                    <?php else : ?>
                                                                        <?= "Sim"; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td class="text-center"><?= formata_data_banco_sem_hora($animal->data_cadastro); ?></td>
                                                                <!--<td class="text-center"><img width="100" height="100" src="<//?= base_url($animal->foto_animal) ?>" alt="Imagem animal"></td> -->

                                                                <td class="nosort text-right pr-100">
                                                                    <div class="table-actions">
                                                                        <a data-toggle="tooltip" data-placement="bottom" title="Visualizar <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()) . '/visualizar/' . $animal->id_animal; ?> " class="btn btn-icon btn-primary"><i class="ik ik-eye text-info"></i>
                                                                            <a data-toggle="tooltip" data-placement="bottom" title="Editar <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()) . '/alterar/' . $animal->id_animal; ?> " class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a></a>
                                                                        <button type="button" data-toggle="modal" data-target="#categoria-<?= $animal->id_animal; ?>" data-placement="bottom" title="Excluir <?= $this->router->fetch_class(); ?>" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="categoria-<?= $animal->id_animal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document" id="categoria-<?= $animal->id_animal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
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
                                                                            <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()) . '/del/' . $animal->id_animal; ?> " class="btn btn-danger">Sim, excluir</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--   <//?php endforeach; ?>
                                                            <//?php endif; ?> -->
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