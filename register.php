<?php

session_start();

if (!empty($_SESSION['auth']) && $_SESSION['auth']){
  header('Location: /index.php');
}

?>

<?php require 'header.php'; ?>

<div class="auth mt-5 d-flex justify-content-center">
  <div class="auth__inner d-flex flex-column col-6">
    <h2 class="auth__title align-self-center mb-5">Регистрация</h3>
    <form method="POST" action="/php_scripts/register_user.php" class="auth__form d-flex flex-column">
      <div class="mb-3 row">
        <div class="col-5">
          <label for="name">Имя</label>
          <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="col-7">
          <label for="surname">Фамилия</label>
          <input type="text" name="surname" class="form-control" id="surname">
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3 row">
        <div class="col">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="col">
          <label for="rep_password" class="form-label">Повтор пароля</label>
          <input type="password" name="rep_password" class="form-control" id="rep_password">
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="login.php">Вход</a>
        <button type="submit" class="btn btn-success align-self-end">Войти</button>
      </div>
    </form>
  </div>
</div>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>