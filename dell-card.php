 <?php
// include('config.php');
// $ID = $_GET['id'];

// mysqli_query($con,"DELETE FROM addcard WHERE id = $ID");

// header('location : card.php');


include('config.php');

// تأكيد أن الـ ID يتم الحصول عليه بشكل صحيح
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ID = $_GET['id'];

    // تنفيذ الاستعلام بأمان (استخدام Prepared Statements لتجنب SQL Injection)
    $stmt = $con->prepare("DELETE FROM addcard WHERE id = ?");
    $stmt->bind_param("i", $ID);
    $stmt->execute();

    // إعادة التوجيه
    header('Location: card.php');
    exit();
} else {
    // إذا لم يكن الـ ID صالحًا
    echo "Error: Invalid ID.";
}
?>
