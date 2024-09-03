<?php
setcookie("email_user","",time()-3600,"/");
unset($_COOKIE['email_user']);
header('Location: /');
?>