<?php
include('config.php');
$ID = $_GET['id'];
$up = mysqli_query($con , "select * from prod where id=$ID");
$data = mysqli_fetch_array($up);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<link rel="stylesheet" href="index.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meat http-equiv="X-UA_Compatible" content="IE=edge" >
<!-- <meta name="viewport" content="width=device-width, intial-scale=1.0"> -->
    <title>Document</title>
    <style>
        input{
            display: none;

        }
        .main{
            width: 30%;
            padding: 20px;
            box-shadw:1px , 1px ,10px silver;
            margin-top: 50px;


        }
    </style>
</head>
<body>
    <center>
    <div main="main">
        <form action="insert-card.php" method="post">
        <h2>هل فعلا تريد شراء المنتج</h2>
        <input type="text" name="id" value='<?php echo $data['id']?>'>
        <input type="text" name="name" value='<?php echo $data['name']?>'>
        <input type="text" name="price" value='<?php echo $data['price']?>'>
        <button name="add" type="submit" class='btn btn-warning'>تاكيد اضافة المنتج لللعربة </button>
        <br>
        <a href="shope.php">الرجوع لصفحة المنتجات</a>
    </div>

    </center>
</body>
</html>