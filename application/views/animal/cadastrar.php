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
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form name="form_core" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-md-2 mb-20">
                                        <div class="form-group">Data de Cadastro</label>
                                            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro">
                                            <?= form_error('data_cadastro', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-20">Tipo de Animal</label>
                                        <input type="text" class="form-control" id="tipo_animal" name="tipo_animal">
                                        <?= form_error('tipo_animal', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2 mb-20">
                                        <label for="nome">Nome do Animal</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= set_value('nome'); ?>" style="text-transform: uppercase;">
                                        <?= form_error('nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label for="cor">Cor</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Preto" id="cor" name="cor" style="text-transform: uppercase;">
                                            <?= form_error('cor', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="sexo">Sexo</label>
                                            <select name="sexo" id="sexo">
                                                <option value="Macho">Macho</option>
                                                <option value="Fêmea">Fêmea</option>
                                            </select>
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label for="raca">Raça</label>
                                            <input type="text" class="form-control" id="raca" name="raca" style="text-transform: uppercase;">
                                            <?= form_error('raca', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="porte">Porte</label>
                                            <select name="porte" id="porte">
                                                <option value="pequeno">Pequeno</option>
                                                <option value="medio">Médio</option>
                                                <option value="grande">Grande</option>
                                                <?= form_error('porte', '<div class="text-danger">', '</div>'); ?>
                                            </select>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="castrado">Castrado</label>
                                            <select name="castrado" id="castrado">
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                                <?= form_error('castrado', '<div class="text-danger">', '</div>'); ?>
                                            </select>
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="obs">Observação:</label>
                                            <input type="text" class="form-control" id="obs" name="obs">
                                            <?= form_error('obs', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto">Foto:</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
                                            <img id="preview" width="250" src="#" style="display: none;"/>
                                            <?= form_error('foto', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 ml-20">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            <a href="<?= base_url($this->router->fetch_class()); ?>" class="btn btn-info ml-20">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    foto.onchange = evt => {
        const [file] = foto.files
        if (file) {
            preview.src = URL.createObjectURL(file)
            preview.style.display = 'block';
        }
    }
</script>