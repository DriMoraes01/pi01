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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($adocoes as $adocao) : ?>
                        <div class="card">
                            <div class="card-header"><?= (isset($adocao) ? '<i class="ik ik-calendar ik-2x"></i>&nbsp;Data da última alteração: &nbsp;' . date("d/m/Y H:i:s", strtotime($adocao->ultima_alteracao)) : ''); ?></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form_core" name="form_core" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>Nome do Adotante</label>
                                            <input type="text" class="form-control" id="nome_adotante" name="nome_adotante" value="<?= isset($adocao) ? $adocao->nome_adotante : ''; ?>" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= isset($adocao) ? $adocao->cpf : 'cpf'; ?>" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Data de Adoção</label>
                                            <input type="date" class="form-control" id="data_adocao" name="data_adocao" value="<?= isset($adocao) ? $adocao->data_adocao : ''; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3
                                         mb-20">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= isset($adocao) ? $adocao->email : ''; ?>" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Celular</label>
                                            <input type="text" class="form-control" id="celular" name="celular" value="<?= isset($adocao) ? $adocao->celular : ''; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label>Tipo de Animal</label>
                                            <input type="text" class="form-control" id="tipo_animal" name="tipo_animal" value="<?= isset($adocao) ? $adocao->tipo_animal : ''; ?>" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Nome do Animal</label>
                                            <input type="text" class="form-control" id="nome_animal" name="nome_animal" value="<?= isset($adocao) ? $adocao->nome_animal : ''; ?>" readonly>
                                        </div>
                                        <div class="col-md-2 mb-20">
                                            <label>Sexo</label></br>
                                            <input type="text" class="form-control" name="sexo_animal" id="sexo_animal" value="<?= isset($adocao) ? $adocao->sexo_animal : ''; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-20">
                                            <label for="cep">CEP:</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="cep" name="cep" maxlength="9" value="<?= isset($adocao) ? $adocao->cep : ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="logradouro">Logradouro:</label>
                                                <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= isset($adocao) ? $adocao->logradouro : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="numero">N°:</label>
                                                <input type="text" class="form-control" id="numero" name="numero" value="<?= isset($adocao) ? $adocao->numero : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-20">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= isset($adocao) ? $adocao->bairro : ''; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="localidade">Cidade:</label>
                                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?= isset($adocao) ? $adocao->localidade : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="uf">UF:</label>
                                                <input type="text" class="form-control" id="uf" name="uf" value="<?= isset($adocao) ? $adocao->uf : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="observacao">Observação</label>
                                                <input type="text" class="form-control" id="observacao" name="observacao" value="<?= isset($adocao) ? $adocao->observacao : ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($adocao)) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="id" value="<?= $adocao->id; ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="form-group row">
                                    <div class="col-md-12 ml-20">
                                        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                        <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info">Voltar</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>