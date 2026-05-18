<?php
session_start();

if (isset($_SESSION['admin_email'])) {
    header("Location: dashboard.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal | Interior Studio</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

   
    body {
      height: 100vh;
      display: flex;
      background-color: #f5fbfc;
    }

  
    .main-container {
      display: flex;
      width: 100%;
      height: 100%;
    }

    
    .left-side {
      flex: 1.2; 
      background: linear-gradient(rgba(29, 153, 166, 0.2), rgba(29, 153, 166, 0.2)), 
                  url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&q=80&w=1000');
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px;
      color: white;
    }

    .left-side h1 {
      font-size: 3rem;
      color: #fff;
      text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    }

    /* 3. Right Side: Aapka Login Form */
    .right-side {
      flex: 0.8; /* Ye thodi kam jagah lega */
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ffffff;
    }

    .login-box {
      width: 80%;
      max-width: 400px;
      padding: 20px;
    }

    .login-box h2 {
      color: #1d99a6; /* Teal Color */
      font-size: 28px;
      margin-bottom: 10px;
    }

    .gold-line {
      width: 60px;
      height: 4px;
      background-color: #9b8241de; /* Gold Accent */
      margin-bottom: 30px;
    }

    /* Input Styling */
    .login-box input {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      background-color: #f8fbfb;
      border-radius: 4px;
      outline: none;
    }

    .login-box input:focus {
      border-color: #1d99a6;
    }

    /* Button Styling */
    .login-box button {
      width: 100%;
      padding: 15px;
      background-color: #1d99a6;
      color: white;
      border: none;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background-color: #167a85;
    }

    .error {
      color: #d9534f;
      margin-bottom: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="main-container">
    <div class="left-side">
      <h1>Modern<br>Interiors</h1>
      <p style="margin-top: 20px; font-size: 18px; color: #f1f1f1;">Designing dreams into reality.</p>
    </div>

    <div class="right-side">
      <div class="login-box">
        <h2>Welcome Back</h2>
        <div class="gold-line"></div>
        
        <p style="color: #777; margin-bottom: 20px;">Admin Login Portal</p>

        <?php if (isset($_GET['error'])): ?>
          <p class="error">Invalid Credentials!</p>
        <?php endif; ?>

        <form action="login_process.php" method="post">
          <input type="email" name="email" placeholder="Email Address" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">LOGIN TO DASHBOARD</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>