<?php

    $file = $_GET['file'];
    $name = $_GET['name'];

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=".$name."");
    header("Content-Transfer-Encoding: binary");
    header("Content-Type: binary/octet-stream");
    readfile($file);

?>