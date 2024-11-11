<?php
$answernum = rand(0,100);
setcookie("answer", "$answernum", time() + (86400 * 30), "/");
header("Location:index.php?");
exit;