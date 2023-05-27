<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style> 
        footer {
            color: #333;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <h1>Update Page</h1>
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

if (isset($_POST['id']) && isset($_POST['new_name']) && isset($_POST['new_email'])) {
    $id = $_POST['id'];
    $newName = mysqli_real_escape_string($conn, $_POST['new_name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);

    $sql = "UPDATE user_form SET name = ?, email = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $newName, $newEmail, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "تم تحديث بيانات المستخدم بنجاح.";
    } else {
        echo "حدث خطأ أثناء تحديث بيانات المستخدم: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "بيانات المستخدم الجديدة غير مكتملة.";
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
