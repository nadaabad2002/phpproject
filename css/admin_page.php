<!DOCTYPE html>
<html>
<head>
    <title>عنوان الصفحة</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
      
        header {
            padding: 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        header a {
            text-decoration: none;
            margin-left: 50px;
        }

        header a:hover {
            text-decoration: underline;
        }

        .user-table {
            min-height: 30vh;
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 20px;
            padding-bottom: 60px;
            background-color: #f5f5f5;
        }

        table {
            width: 70%;
            border-collapse: collapse;
        }

        th {
            background-color: #f5f5f5;
            color: #333;
            font-weight: bold;
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

د        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

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

        if (isset($_SESSION['admin_name'])) {
            $name = $_SESSION['admin_name'];
            echo "<span>Welcome, $name</span> </br>";

            echo "<a href='profile.php'>profile</a>";

            echo "<a href='logout.php'>logout</a>";
        } else {
            echo "<a href='login_from.php'>login </a>";
        }
        ?>

    </header>
    <div class="user-table">
        <?php
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        $dbname = 'user_db'; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user_form";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Name</th> <th>Email</th> <th>Password</th> <th>User-type</th> <th>Created-at</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["password"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["user_type"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["created-at"]) . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Update</a></td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";

                if (isset($_SESSION['admin_name']) || ($_SESSION['user_id'] == $row["id"])) {
                    echo "<td><a href='change_password.php?id=" . $row["id"] . "'><img class='change-password-icon' src='change_password_icon.png' alt='Change Password'></a></td>";
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "لا يوجد مستخدمين موجودين في قاعدة البيانات.";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
    <div>
        <footer>
            <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
        </footer>
    </div>
</body>
</html>
