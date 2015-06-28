<?php require_once '_parts/head.php'; ?>
<div class="wrapper">
  <div class="login-container">
    <div class="login-container-header">
      <h3 class="login-container-header-text">Авторизуйтесь</h3>
    </div>
    <div class="login-container-body">
      <div class="login-form-wrapper">
        <form id="form" action="#" method="post">
          <div class="login-input-form-container">
            <div class="login-input-name-wrapper">
              <label class="login-form-title">Логин</label>
              <input type="text" id="login" data-validation="login" class="login-input-form" name="login" placeholder="Введите имя">
            </div>
            <div class="login-input-password-wrapper">
              <label class="login-form-title">Пароль</label>
              <input type="password" id="pass" data-validation="pass" class="login-input-form" name="password" placeholder="Введите пароль">

            </div>
          </div>
          <div class="login-button-wrapper clearfix">
            <input type="submit" class="login-submit-form" value="Войти">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once '_parts/footer2.php' ?>