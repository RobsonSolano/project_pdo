<?php include_once 'template/header_app.php'; ?>
<?php
include_once('php/contatos.php');

$contatos = get_contatos();
?>

<section>

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center pt-5">
            <div class="col-12 card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Gerencie seus contatos</h4>
                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#create-contact">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Cadastrar
                    </button>
                </div>
                <div class="card-body">
                    <?php if (empty($contatos)) { ?>
                        <p>Nenhum contato encontrado.</p>
                    <?php } else { ?>
                        <div class="table-responsive">
                            <?php if (!empty($_SESSION['message'])) { ?>
                                <div class="alert alert-<?php echo $_SESSION['type'] ?> alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['message']  ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <?php unset($_SESSION['message']); ?>
                                <?php unset($_SESSION['type']); ?>
                            <?php } ?>
                            <table class="table table-striped">
                                <thead class="btn-dark">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Celular</th>
                                        <th style="width: 150px; text-align:center;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contatos as $contato) { ?>
                                        <tr>
                                            <td><?php echo $contato['nome'] ?></td>
                                            <td><?php echo formata_celular($contato['numero']) ?></td>
                                            <td style="width: 150px; text-align:center;">
                                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#edit-contact-<?php echo $contato['id'] ?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-contact-<?php echo $contato['id'] ?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete-contact-<?php echo $contato['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja deletar?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-danger"><strong>Atenção</strong> esta ação não pode ser desfeita.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <a href="<?php echo BASE_URL . 'php/contatos.php?action=deletar&item=' . $contato['id'] ?>" class="btn btn-danger">Deletar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="edit-contact-<?php echo $contato['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edite o contato: <?php echo $contato['nome'] ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body text-left">
                                                                <p class="text-start text-success">Altere os dados de contato</p>
                                                                <form action="<?php echo BASE_URL . 'php/contatos.php?action=atualizar' ?>" method="post">
                                                                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $contato['id'] ?>">
                                                                    <div class="form-group mb-3 text-left">
                                                                        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $contato['nome'] ?>">
                                                                    </div>
                                                                    <div class="form-group mb-3 text-left">
                                                                        <input type="tel" onkeypress="$(this).mask('(00) 00000-0000')" name="numero" id="numero" class="form-control" value="<?php echo $contato['numero'] ?>">
                                                                    </div>
                                                                    <div class="form-group d-flex justify-content-between w-100">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-success">Salvar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="create-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastre um contato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <p class="text-start text-primary">Todos os campos são obrigatórios.</p>
                <form class="w-100" action="<?php echo BASE_URL . 'php/contatos.php?action=cadastrar' ?>" method="post">
                    <div class="form-group mb-3 text-left">
                        <input type="text" name="nome" id="nome" class="form-control" value="" placeholder="Informe o nome">
                    </div>
                    <div class="form-group mb-3 text-left">
                        <input type="tel" name="numero" onkeypress="$(this).mask('(00) 00000-0000')" id="numero" class="form-control" value="" placeholder="Informe o número">
                    </div>
                    <div class="form-group d-flex justify-content-between w-100">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include_once 'template/footer.php'; ?>