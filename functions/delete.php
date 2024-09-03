<?php
require("../functions/db.php");

if (!isset($_GET["id"])) {
    echo "<script> 
        alert('Вы не выбрали запись!');
        location.href = '/';
    </script>";
    exit();
}

$id = $_GET["id"];
$sql = "DELETE FROM article WHERE `id` = $id";
$affectedRowsNumber = $connection->exec($sql);
echo "<script> 
alert('Вы удалили запись!');
 location.href = '/';
</script>";


?>