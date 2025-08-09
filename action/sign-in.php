 <?php
    require_once('../config/loader.php');

    if (isset($_POST['signin'])) {
        try {
            // parametrs
            $key = $_POST['key'];
            $password = $_POST['password'];

            // sql
            $query = "SELECT * FROM `users` WHERE (username = :key OR mobile = :key OR email = :key) AND (password = :password) LIMIT 1";
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // stmt
            $stmt = $conn->prepare($query);

            // bind
            $stmt->bindValue(":key", $key);
            $stmt->bindValue(":password", $password);

            // exe
            $stmt->execute();

            $hasUser = $stmt->rowCount();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($hasUser) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['mobile'] = $user['mobile'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['login'] = true;

                header('Location: ../index.php?loginned=ok');
                exit;
            } else {
                header('Location: ../login.php?notuser=ok');
                exit;
            }

            // echo "Created Account";
            // header('Location: ../index.php');
        } catch (PDOException $e) {
            //echo "Your error message is : " . $e->getMessage();
            error_log("Database error: " . $e->getMessage());
            header('Location: ../index.php?error=database');
        }
    } else {
        header('Location: ../index.php?error=notset');
        exit;
    }
