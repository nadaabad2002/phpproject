<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
      <h1>Delete Page</h1>
   </header>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = 'user_db';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM user_form WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "تم حذف المستخدم بنجاح.";
    } else {
        echo "حدث خطأ أثناء حذف المستخدم.";
    }

    $stmt->close();
} else {
    echo "معرف المستخدم غير موجود.";
}

$conn->close();
?>
<div>
    <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</div>
</body>
</html>
