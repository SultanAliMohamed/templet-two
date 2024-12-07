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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
    <div class="center">
        <h1>جميع المنتجات</h1>

        <table>
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>اسم المنتج</th>
                    <th>السعر</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // عرض جميع المنتجات
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' width='100' height='100'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . " جنيه</td>";
                    echo "<td><a href='delete.php?id=" . $row['id'] . "'>حذف</a></td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "'>تعديل</a></td>";
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
