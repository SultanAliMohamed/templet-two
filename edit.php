<?php
include('config.php');  // ربط الاتصال بقاعدة البيانات

// التحقق من وجود معرّف المنتج في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // استعلام لجلب تفاصيل المنتج بناءً على المعرف
    $sql = "SELECT * FROM prod WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script> alert('المنتج غير موجود'); window.location.href = 'product.php'; </script>";
    }
} else {
    echo "<script> alert('لا يوجد معرّف للمنتج'); window.location.href = 'product.php'; </script>";
}

// التحقق من إرسال النموذج
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    // إذا تم رفع صورة جديدة، سيتم تحديث الصورة
    if ($image['error'] == 0) {
        $image_location = $image['tmp_name'];
        $image_name = $image['name'];
        $image_up = "images/" . $image_name;
        
        if (move_uploaded_file($image_location, $image_up)) {
            // استعلام لتحديث المنتج مع الصورة الجديدة
            $update = "UPDATE prod SET name = '$name', price = '$price', image = '$image_up' WHERE id = $id";
            if (mysqli_query($con, $update)) {
                echo "<script> alert('تم تعديل المنتج بنجاح'); window.location.href = 'product.php'; </script>";
            } else {
                echo "<script> alert('حدث خطأ أثناء تعديل المنتج'); </script>";
            }
        }
    } else {
        // في حال لم يتم رفع صورة جديدة، فقط نقوم بتحديث الاسم والسعر
        $update = "UPDATE prod SET name = '$name', price = '$price' WHERE id = $id";
        if (mysqli_query($con, $update)) {
            echo "<script> alert('تم تعديل المنتج بنجاح'); window.location.href = 'product.php'; </script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء تعديل المنتج'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المنتج</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="center">
        <h1>تعديل المنتج</h1>

        <!-- نموذج تعديل المنتج -->
        <form action="edit.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">اسم المنتج</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="price">سعر المنتج</label>
                <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required>
            </div>

            <div class="form-group">
                <label for="image">اختيار صورة للمنتج (اختياري)</label>
                <input type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <button type="submit" name="update">تحديث المنتج</button>
            </div>
        </form>

        <br>
        <a href="product.php" class="back-link">العودة إلى عرض المنتجات</a>
    </div>
</body>
</html>
