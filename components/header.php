<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">CRUD</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/"
                        class="nav-link <?php if ($_SERVER['REQUEST_URI']=="/" || $_SERVER['REQUEST_URI']=="/index.php"):?> active <?php endif; ?>">Главная</a>
                </li>
                <li class="nav-item"><a href="about.php"
                        class="nav-link <?php if ($_SERVER['REQUEST_URI']=="/about.php"):?> active <?php endif; ?>">О
                        нас</a></li>

                <?php if (isset($_COOKIE["email_user"])): ?>
                <li class="nav-item"><a href="#" class="nav-link "><?php echo $_COOKIE["email_user"]; ?></a>
                </li>
                <li class="nav-item"><a href="functions/logout.php" class="nav-link ">Выйти</a>
                </li>
                <?php else: ?>

                <li class="nav-item"><a href="auth.php"
                        class="nav-link <?php if ($_SERVER['REQUEST_URI']=="/auth.php"):?> active <?php endif; ?>">Вход</a>
                </li>
                <li class="nav-item"><a href="register.php"
                        class="nav-link <?php if ($_SERVER['REQUEST_URI']=="/register.php"):?> active <?php endif; ?>">Регистрация</a>
                </li>
                <?php endif; ?>
            </ul>
        </header>
    </div>