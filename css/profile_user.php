<!DOCTYPE html>
<html>
<head>
    <title>Profile User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
        <?php
        session_start();

        if (!isset($_SESSION['user_name'])) {
            header('Location: login_form.php');
            exit();
        }

        $name = $_SESSION['user_name'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT email FROM user_form WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            echo "<h1>My Profile</h1>";

            echo "<p><strong>Hello,</strong> $name</p>";

            echo "<p><strong>My Name :</strong> $name</p>";
            echo "<p><strong>My Email :</strong> $email</p>";

        } else {
            echo "لا يوجد مستخدم بالمعلومات المسجلة.";
        }

        $stmt->close();
        $conn->close();
        ?>
    </header>
    <div class="user-info">
        <?php
        echo "<a href='user_page.php'>Logout</a><br>";
        ?>
    </div>
    <div>
        <footer>
            <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>
