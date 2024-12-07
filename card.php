
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200..1000&family=Edu+AU+VIC+WA+NT+Arrows:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> عربتي | منتجاتي</title>
     <style>
h3{

    font-family: "Cairo", sans-serif;
    font-width: bold;
}
main{

width: 40%;
margin-top: 30px;

}
table{
    box-shadow: 1px 1px 10px silver;
}
thead{
color: white;
    background-color:blue;
    text-align: center;
}
tbody{
    text-align: center;
}
tr{
    text-align: center;

}
     </style>
</head>

<body>
<center><h3>منتجاتك المحجوزة</h3></center>
<?php  
include('config.php');
$result = mysqli_query($con, "select *from addcard");
while($row = mysqli_fetch_array($result)){
echo "   <center>
     <main>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>product name </th>
                    <th scope='col'>product price</th>
                    <th scope='col'>delete product</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td>$row[name]</td>
                <td>$row[price]</td>
                <td><a href='dell-card.php? id=$row[id]' class='btn btn-danger'>ازالة</a></td>
            </tr>
        </tbody>
     </main>

   </center> ";}

?>

<center>
    <div> <a href="shope.php">الرجوع لصفحة المنتجات</a></div>
</center>


</body>
</html>