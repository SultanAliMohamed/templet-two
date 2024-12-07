  <?php
  /*
include('config.php');


if(isset($_POST['upload'])){

$NAME = $_POST['name'];
$PRICE= $_POST['price'];
$IMAGE= $_FILES['image'];
$image_location = $_FILES['image']['tmp_name'];
$image_name = $_FILES['image']['name'];
$image_up = "images/".$image_name; 

$insert = "INSERT INTO prod (name , price , image) VALUES('$NAME' , '$PRICE' , '$image_up')";
mysqli_query ($con , $insert);

if(move_uploaded_file($image_location, 'images/'.$image_name))
{



    echo "<script> alert('تم رفع المنتج بنجاح'),</script>";

    else
    {

        echo "<script> alert('لم يتم رفع الصورة')</script>";
   }

    header('location: index.php');
}



}*/




include('config.php');  // ربط ملف الاتصال بقاعدة البيانات

// التحقق من أن المستخدم قد أرسل النموذج
if(isset($_POST['upload'])){
    $NAME = $_POST['name'];  // الحصول على اسم المنتج من النموذج
    $PRICE = $_POST['price'];  // الحصول على سعر المنتج من النموذج
    $IMAGE = $_FILES['image'];  // الحصول على الملف المرفوع (الصورة)

    // التحقق من أن الصورة تم رفعها بنجاح (الخطأ يكون 0 إذا تم التحميل بشكل صحيح)
    if($IMAGE['error'] == 0){
        $image_location = $IMAGE['tmp_name'];  // موقع الصورة المؤقت
        $image_name = $IMAGE['name'];  // اسم الصورة
        $image_up = "images/".$image_name;  // المسار النهائي للصورة التي سيتم رفعها

        // التأكد من أن نوع الصورة مدعوم
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];  // الأنواع المسموح بها
        if (!in_array($IMAGE['type'], $allowed_types)) {
            echo "<script> alert('الملف غير مدعوم. يرجى رفع صورة بصيغة jpg أو png أو gif.'); </script>";
        } else {
            // استعلام لإدخال البيانات إلى قاعدة البيانات
            $insert = "INSERT INTO prod (name, price, image) VALUES ('$NAME', '$PRICE', '$image_up')";
            if(mysqli_query($con, $insert)){  // إذا تم إدخال البيانات بنجاح في قاعدة البيانات
                // رفع الصورة إلى المجلد المناسب
                if(move_uploaded_file($image_location, $image_up)){
                    // إظهار رسالة تأكيد بعد رفع الصورة
                    echo "<script> alert('تم رفع المنتج بنجاح'); </script>";
                    header('Location: index.php');  // إعادة توجيه المستخدم إلى الصفحة الرئيسية
                    exit(); // التأكد من إنهاء السكربت بعد إعادة التوجيه
                } else {
                    // في حال فشل رفع الصورة
                    echo "<script> alert('لم يتم رفع الصورة.'); </script>";
                }
            } else {
                // في حال فشل إدخال البيانات
                echo "<script> alert('حدث خطأ في إدخال البيانات'); </script>";
            }
        }
    } else {
        // في حال كان هناك خطأ في رفع الصورة
        echo "<script> alert('لم يتم رفع الصورة. رمز الخطأ: " . $IMAGE['error'] . "'); </script>";
    }
}


?>