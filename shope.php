<?php
include('config.php');  // ربط الاتصال بقاعدة البيانات

// استعلام لجلب جميع المنتجات
$sql = "SELECT * FROM prod";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("خطأ في جلب البيانات: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>عرض المنتجات</title>
     
        <style>
          table{
            margin: 20px;
            margin: center;
            box-shadow : 1px 1px 10px;
          }
         tr{

            margin:text center;
         }








         </style>
</head>
<body>
    <nav class="navbar navbar-daark bg-dark">
        <a id="aa"href="card.php" class="navbar-brand">mycard</a>
    </nav>
    <center>
    <div class="center">
        <h1>المنتجات المتوفرة</h1>

        <table>
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>اسم المنتج</th>
                    <th>السعر</th>
             
                </tr>
            </thead>
            <tbody>
                <?php
                // عرض جميع المنتجات
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' width='100' height='100'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td><a href='val.php?id=" . $row['id'] . "'>اضافة اللمنتج للعربة </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="back-link">العودة إلى الصفحة الرئيسية</a>
    </div>
            </center>
</body>
</html>
