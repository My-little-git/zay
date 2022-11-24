<?php

session_start();

if (!empty($_SESSION['auth']) && $_SESSION['auth']){
  header('Location: /index.php');
}
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>


<div class="auth mt-5 d-flex justify-content-center">
  <div class="auth__inner d-flex flex-column col-6">
    <h2 class="auth__title align-self-center mb-5">Вход в админку</h3>
    <form method="POST" action="/php_scripts/login_admin.php" class="auth__form d-flex flex-column">
      <div class="mb-3">
        <label for="login" class="form-label">Логин</label>
        <input type="text" name="login" class="form-control" id="login">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-success">Войти</button>
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