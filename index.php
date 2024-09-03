<?php
require(dirname(__FILE__) ."/components/header.php");
require(dirname(__FILE__) ."./functions/db.php");


if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["image"]))  {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_POST["image"];
    $date = date("Y.m.d H:i");
    $sql = "INSERT INTO `article` (`title`, `content`, `img` , `date`) VALUES ('$title', '$content', '$image', '$date')";
    $connection->exec($sql);
    echo "<script> 
    alert('Запись добавлена!');
     location.href = '/';
</script>";
   
}

$sql = "SELECT * FROM article";
$result = $connection->query($sql);
$articles = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Записи</h1>


    <p class="d-inline-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            Создать запись
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Название записи</label>
                    <input type="text" name="title" required max="100" class="form-control" id="title"
                        aria-describedby="title">
                </div>

                <textarea name="content" name="content" id="editor" required>

                </textarea>
                <div class="my-3">

                    <label for="image" class="form-label">Ссылка на картинку</label>
                    <input type="text" name="image" required max="100" class="form-control" id="image"
                        aria-describedby="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить запись</button>
            </form>
        </div>
    </div>


    <div class="album py-5" bis_skin_checked="1">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" bis_skin_checked="1">
            <?php foreach ($articles as $item) : ?>

            <div class="col" bis_skin_checked="1">
                <div class="card shadow-sm" bis_skin_checked="1">
                    <img src=" <?php echo $item['img']; ?>" alt="" class="img-fluid">
                    <div class="card-body" bis_skin_checked="1">
                        <p class="card-text">
                            <?php echo $item['title']; ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center" bis_skin_checked="1">
                            <div class="btn-group" bis_skin_checked="1">
                                <a href="article.php?id=<?php echo $item['id']; ?>"
                                    class="btn btn-sm btn-outline-secondary">Просмотр</a></a>
                            </div>
                            <small class="text-body-secondary"><?php echo $item['date']; ?> </small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
</div>

<?php
require(dirname(__FILE__) ."/components/footer.php");
?>