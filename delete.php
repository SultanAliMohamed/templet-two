<?php
include('config.php');  // ربط الاتصال بقاعدة البيانات

// التحقق من وجود معرّف المنتج في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // استعلام لحذف المنتج من قاعدة البيانات
    $delete = "DELETE FROM prod WHERE id = $id";

    if (mysqli_query($con, $delete)) {
        // إذا تم الحذف بنجاح، إعادة توجيه المستخدم إلى صفحة عرض المنتجات
        echo "<script> alert('تم حذف المنتج بنجاح'); window.location.href = 'product.php'; </script>";
    } else {
        // في حال حدوث خطأ أثناء الحذف
        echo "<script> alert('حدث خطأ أثناء الحذف'); </script>";
    }
} else {
    echo "<script> alert('لا يوجد معرّف للمنتج'); window.location.href = 'product.php'; </script>";
}
header('location: index.php');

?>


