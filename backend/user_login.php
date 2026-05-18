<?php
session_start();
include 'db.php';
include 'config.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die(mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location:Mainpg.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Luminor Maison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f5f0;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .brand-name {
            font-weight: 700;
            font-size: 20px;
            color: #2c2c2c;
        }

        .btn-main {
            background: #2c2c2c;
            color: white;
            border-radius: 8px;
            padding: 10px;
        }

        .btn-main:hover {
            background: #444;
            color: white;
        }

        .login-link {
            color: #2c2c2c;
            font-weight: 600;
        }

        /* Eye icon wrapper */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 42px;
        }

        .toggle-eye {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 16px;
            user-select: none;
            z-index: 10;
        }

        .toggle-eye:hover {
            color: #1d99a6;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-5">
                <div class="card p-4">

                    <!-- Logo -->
                    <div class="text-center mb-3">
                        <img src="<?= IMG_URL ?>Modern Interior Design Logo.png" width="60" alt="Logo">
                        <div class="brand-name mt-2">Luminor Maison</div>
                        <p class="text-muted" style="font-size:14px;">Welcome back! 👋</p>
                    </div>

                    <?php if ($error) echo "<div class='alert alert-danger py-2'>$error</div>"; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <div class="password-wrapper">
                                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter password" required>
                                <span class="toggle-eye" onclick="togglePassword()">
                                    <i class="fa-regular fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-main w-100">Login</button>
                    </form>

                    <p class="text-center mt-3 mb-0" style="font-size:14px;">
                        Don't have account?
                        <a href="user_register.php" class="login-link">Register here</a>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            var input   = document.getElementById('passwordInput');
            var icon    = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>