<?php

$con = mysqli_connect('localhost','root','','shope');

if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>