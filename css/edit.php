



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Edit</title>
    <style> 
        header {
            padding: 10px;
            display: flex;
            align-items: left;
        }
        
        form {
            
            align-items: left;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            margin: 0px;
            padding: 5px;
        }
        
        footer {
            color: #333;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Page</h1>
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

    $sql = "SELECT * FROM user_form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
   
        echo " name: " . $name . "<br>";
        echo "email : " . $email . "<br>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
       
     

        echo "</form>";

    } else {
        echo "لا يوجد مستخدم بالمعرف المحدد.";
    }

    $stmt->close();
} else {
    echo "معرف المستخدم غير موجود.";
}

$conn->close();
?> 
    <div class="form-container">
        <?php
        // كود PHP لا يتغير
        ?>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="new_name" placeholder="Enter new name">
               <br>
            <input type="email" name="new_email" placeholder="Enter new email">
            <br>

            <input type="submit" value="Update">
        </form>

        <?php
        // كود PHP لا يتغير
        ?>
    </div>

    <footer>
        <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</body>
</html>
