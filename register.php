<?php
require(dirname(__FILE__) ."/components/header.php");
require(dirname(__FILE__) ."./functions/db.php");


if (isset($_POST["email"]) && isset($_POST["password"]) )  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
    $connection->exec($sql);

    header('Location:auth.php');
}
?>

<div class="container">
    <h1 class="text-center">Регистрация</h1>
    <form class="w-50 m-auto" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" min="8" max="20" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" min="8" max="20" required class="form-control" id="exampleInputPassword1"
                name="password">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </div>

    </form>
</div>

<?php
require(dirname(__FILE__) ."/components/footer.php");
?>