<?php include_once('template/header.php'); ?>

<div class="container">
  <div class="row pt-4">

    <div class="col-10 col-sm-6 col-md-6">

      <div class="card neumorphism-element p-3">
        <h2>Cadastre-se agora</h2>
        <hr>
        <?php if (!empty($_GET['account']) && $_GET['account'] == 'error') { ?>
          <div class="alert alert-warning">Não foi possível realizar seu cadastro<br>Por favor tente novamente.</div>
        <?php } ?>
        <form action="<?php echo BASE_URL ?>/php/auth/cadastro.php" method="post" class="form">

          <div class="form-group mb-3">
            <label for="email">Informe seu e-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com">
          </div>

          <div class="form-group mb-3">
            <label for="nome">Informe seu nome</label>
            <input type="text" name="nome" value="" id="nome" class="form-control" placeholder="Nome de usuário">
          </div>

          <div class="form-group mb-3">
            <label for="password">Informe sua senha</label>
            <input type="password" value="" name="password" id="password" class="form-control" min="3" maxlength="10" placeholder="**********">
          </div>

          <div class="form-group">

            <button type="submit" class="btn btn-success mb-2 w-100">Cadastrar</button>

            <p>Já possuí conta? <a href="#" class="js-show-login">Clique aqui</a></p>

          </div>

        </form>
      </div>
    </div>

    <div class="col-10  col-sm-6 col-md-6">
      <div class="card neumorphism-element p-3">
        <h2>Acesse sua conta</h2>
        <hr>
        <?php if (!empty($_GET['account']) && $_GET['account'] == 'success') { ?>
          <div class="alert alert-success">Cadastro realizado com sucesso<br>Efetue login</div>
        <?php } ?>
        <form action="<?php echo BASE_URL ?>/php/auth/login.php" method="post" class="form js-form-login">

          <div class="form-group mb-3">
            <label for="email_login">Informe seu e-mail</label>
            <input type="email" name="email" id="email_login" class="form-control js-input-email" placeholder="example@email.com">
          </div>

          <div class="form-group mb-3">
            <label for="password_login">Informe sua senha</label>
            <input type="password" name="password" id="password_login" class="form-control js-input-senha" min="3" maxlength="10" placeholder="**********">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success js-btn-submit mb-2 w-100">Entrar</button>
            <p>Crie sua conta agora <a href="#" class="js-show-cadastro">Clique aqui</a></p>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>

<?php include_once('template/footer.php'); ?>