 
<?php include 'db.php'; ?>
<?php include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = $conn->query("SELECT id FROM users WHERE email='$email'") ;
   if ($check->num_rows > 0){
    $error = "Email already registered!";
   } else {
    $conn->query("INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')");
    // Register success ke baad
header("Location: user_login.php");
      exit();
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register | Luminor Maison</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f5f5f5, #e0f2f1);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }
    .brand-name {
      color: #008080;
      font-size: 22px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 4px;
    }
    .form-control:focus {
      border-color: #008080;
      box-shadow: 0 0 0 0.2rem rgba(0,128,128,0.15);
    }
    .btn-main {
      background: #008080;
      color: white;
      border-radius: 8px;
      padding: 10px;
      font-size: 16px;
      border: none;
    }
    .btn-main:hover {
      background: #006666;
      color: white;
    }
    label {
      font-weight: 500;
      color: #333;
    }
    .login-link {
      color: #008080;
      font-weight: 600;
      text-decoration: none;
    }
    .login-link:hover {
      color: #006666;
    }
  </style>
</head>
<body>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-5">
      <div class="card p-4">

        <!-- Logo + Brand -->
        <div class="text-center mb-3">
          <img src="<?= IMG_URL ?>Modern Interior Design Logo.png"> width="60" alt="Logo">
          <div class="brand-name mt-2">Luminor Maison</div>
          <p class="text-muted" style="font-size:14px;">Save your favourite designs ❤️</p>
        </div>

        <?php if(isset($error)) echo "<div class='alert alert-danger py-2'>$error</div>"; ?>

        <form method="POST">
          <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Create password" required>
          </div>
          <button type="submit" class="btn btn-main w-100">Create Account</button>
        </form>

        <p class="text-center mt-3 mb-0" style="font-size:14px;">
          Already have account? 
          <a href="user_login.php">Login here</a>
        </p>

      </div>
    </div>
  </div>
</div>

</body>
</html>


