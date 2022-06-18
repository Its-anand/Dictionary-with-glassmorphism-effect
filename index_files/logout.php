<?php
session_start();
session_unset();
session_destroy();
header("location: ./index_files/Add Word.php");
?>