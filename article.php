<?php
require(dirname(__FILE__) ."/components/header.php");
require(dirname(__FILE__) ."./functions/db.php");

if (!isset($_GET["id"])) {
    echo "<script> 
        alert('Вы не выбрали запись!');
        location.href = '/';
    </script>";
    exit();
}

$id = $_GET["id"];

$sql = "SELECT * FROM article WHERE `id` = $id";

$result = $connection->query($sql);
$article = $result->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["image"]))  {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_POST["image"];
    $sql = "UPDATE `article` SET `title` = '$title', `content` = '$content', `img` = '$image' WHERE `id` = $id";
    $connection->exec($sql);
    header('Location: article.php?id=' . $id);
}

?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная страница</a></li>
            <li class="breadcrumb-item active" aria-current="page">Название записи</li>
        </ol>
    </nav>

    <p class="d-inline-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            Редактировать запись
        </a>
        <a href="functions/delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Удалить запись</a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Название записи</label>
                    <input type="text" name="title" required max="100" class="form-control" id="title"
                        aria-describedby="title" value="<?php echo $article[0]["title"];?>">
                </div>

                <textarea name="content" name="content" id="editor" required>
                    <?php echo $article[0]["content"];?>
                </textarea>
                <div class="my-3">

                    <label for="image" class="form-label">Ссылка на картинку</label>
                    <input type="text" name="image" required max="100" class="form-control" id="image"
                        aria-describedby="image" value="<?php echo $article[0]["img"];?>">
                </div>
                <button type="submit" class="btn btn-primary">Добавить запись</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <img src="  <?php echo $article[0]["img"];?>" class="img-fluid" alt="">

        </div>
        <div class="col-6">
            <h1><?php echo $article[0]["title"];?></h1>
            <?php echo $article[0]["content"];?>
        </div>
    </div>


</div>

<?php
require(dirname(__FILE__) ."/components/footer.php");
?>