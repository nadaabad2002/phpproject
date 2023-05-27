<!DOCTYPE html>
<html>
<head>
    <title>الملف الشخصي</title>
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

        // التحقق مما إذا كان المستخدم مسجل الدخول
        if (!isset($_SESSION['admin_name'])) {
            header('Location: login_form.php');
            exit();
        }

        // احصل على اسم المستخدم المسجل
        $name = $_SESSION['admin_name'];

        // معلومات اتصال قاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_db";

        // إنشاء اتصال بقاعدة البيانات
        $conn = new mysqli($servername, $username, $password, $dbname);

        // التحقق من نجاح الاتصال
        if ($conn->connect_error) {
            die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        // استعلام SQL لاسترداد معلومات المستخدم
        $stmt = $conn->prepare("SELECT email FROM user_form WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // عرض بيانات المستخدم
            $row = $result->fetch_assoc();
            $email = $row['email'];
            

            echo "<h1>My Profile</h1>";

            echo "<p><strong>Hello,</strong> $name</p>";

            echo "<p><strong>My Name :</strong> $name</p>";
            echo "<p><strong>My Email :</strong> $email</p>";


        } else {
            echo "لا يوجد مستخدم بالمعلومات المسجلة.";
        }

        // إغلاق اتصال قاعدة البيانات
        $stmt->close();
        $conn->close();
        ?>
    </header>
    <div class="user-info">
        <?php
        echo "<a href='admin_page.php'>Logout</a><br>";
        ?>
    </div>
    <div>
        <footer>
            <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>
