<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<!-- // if (isset($_POST['name'])) {
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $phone = $_POST['phone'];
//   $appointment_date = $_POST['appointment_date'];
//   $message = $_POST['message'];

//   $sql = "INSERT INTO contact_messages (name, email, phone, appointment_date, message)
//             VALUES ('$name', '$email', '$phone', '$appointment_date', '$message')";

//   if (mysqli_query($conn, $sql)) {
//     echo "<script>alert('Message sent successfully');</script>";
//   } else {
//     echo "<script>alert('Data not inserted');</script>";
//   }
// } -->
<!-- ?> -->

<?php
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $appointment_date = $_POST['appointment_date'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contact_messages (name, email, phone, appointment_date, message)
          VALUES ('$name', '$email', '$phone', '$appointment_date', '$message')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Message sent successfully');</script>";
  } else {
    echo "<script>alert('Data not inserted');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Luminor Maison</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    .lh {
  font-style: italic;
  color: #9b8241de;
}

.lp {
  font-style: italic;
  color: #9b8241de;
}

.top-header {
  min-height: 70px;          /* height ki jagah min-height */
  height: auto;              /* expand ho sake mobile mein */
  display: flex;
  align-items: center;
  flex-wrap: wrap;           /* content wrap ho sake */
  position: sticky;
  top: 0;
  z-index: 1050;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background: white;
  padding: 8px 0;
}

.navbar-nav .nav-link {
  font-weight: 500;
  color: #1d99a6 !important;
}

.dropdown-menu {
  border-radius: 6px;
  padding: 10px 0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
  padding: 8px 20px;
  font-size: 14px;
  color: #1d99a6;
}

.dropdown-item:hover {
  background-color: #f1f1f1;
}

/* Mobile toggle button visible karo */
.navbar-toggler {
  border: 2px solid #1d99a6 !important;
  border-radius: 6px;
  box-shadow: none !important;
  outline: none !important;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231d99a6' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
}

/* Mobile mein collapse menu properly dikhao */
@media (max-width: 991.98px) {
  .navbar-collapse {
    background: white;
    border-top: 2px solid #e8f7f9;
    padding: 10px 0 15px;
    max-height: 75vh;
    overflow-y: auto;
  }

  .navbar-nav {
    gap: 0 !important;
  }

  .navbar-nav .nav-item {
    border-bottom: 1px solid #f0f0f0;
  }

  .navbar-nav .nav-link {
    padding: 12px 20px !important;
  }

  .navbar-nav .dropdown-menu {
    position: static !important;
    box-shadow: none;
    border: none;
    background: #f7fdfe;
    padding: 0;
    margin: 0;
  }

  .navbar-nav .dropdown-item {
    padding: 10px 30px;
  }
}

    .container-fluid {
      padding: 0;
      margin: 0;
    }

    body {
      overflow-x: hidden;
    }

    .contact-title {
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .contact-subtext {
      color: #666;
      max-width: 600px;
      margin: auto;
    }

    .premium-features {
      margin-top: 30px;
      border-top: 1px solid #ddd;
      padding-top: 25px;
    }

    .feature-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .feature-icon {
      background: #1d99a6;
      color: white;
      width: 35px;
      height: 35px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      flex-shrink: 0;
    }

    .feature-text {
      font-size: 14px;
      color: #555;
      margin: 0;
    }

    .quote-box {
      margin-top: 25px;
      padding: 15px;
      background: #9b82411a;
      border-radius: 8px;
      border-left: 4px solid #9b8241de;
    }

    .quote-text {
      font-size: 13px;
      font-style: italic;
      color: #7a6633;
      margin: 0;
    }

    .contact-form-box {
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      border-top: 4px solid #1d99a6;
    }

    .contact-form-box h4 {
      margin-bottom: 25px;
      font-weight: 600;
      color: #222;
      font-size: 22px;
      letter-spacing: 0.5px;
    }

    .contact-form-box input,
    .contact-form-box textarea,
    .contact-form-box input[type="date"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      outline: none;
      background-color: #f8fbfb;
      color: #555;
      font-size: 14px;
      transition: all 0.3s ease;
      margin-bottom: 5px;
    }

    .contact-form-box input[type="date"] {
      color: #999;
      cursor: pointer;
    }

    .contact-form-box input:focus,
    .contact-form-box textarea:focus,
    .contact-form-box input[type="date"]:focus {
      border-color: #1d99a6;
      background-color: #fff;
      box-shadow: 0 0 8px rgba(29, 153, 166, 0.2);
    }

    .contact-form-box textarea {
      resize: none;
    }

    .submit-btn {
      background: #1d99a6;
      color: white;
      border: none;
      padding: 14px 35px;
      border-radius: 30px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: 0.4s;
      margin-top: 10px;
    }

    .submit-btn:hover {
      background: #177f8a;
      box-shadow: 0 5px 15px rgba(29, 153, 166, 0.3);
      transform: translateY(-2px);
    }

    .mb-3 {
      margin-bottom: 1rem !important;
    }

    ::-webkit-calendar-picker-indicator {
      cursor: pointer;
      filter: invert(48%) sepia(13%) saturate(1700%) hue-rotate(140deg) brightness(95%) contrast(90%);
    }

    @media (max-width: 768px) {
      .contact-form-box { padding: 25px; }
      .contact-title { font-size: 28px; }
    }

    .visit-title {
      font-size: 30px;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .visit-text {
      color: #666;
      line-height: 1.7;
      margin-bottom: 20px;
    }

    .visit-info p {
      margin-bottom: 8px;
      color: #444;
    }

    .visit-info i {
      color: #1d99a6;
      margin-right: 8px;
    }

    .map-box {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .faq-title {
      font-size: 32px;
      font-weight: 700;
    }

    .faq-sub {
      color: #666;
    }

    .accordion-button {
      font-weight: 500;
    }

    .accordion-button:not(.collapsed) {
      background: #1d99a6;
      color: white;
    }

    .accordion-body {
      color: #555;
    }

    .footer-dark {
      background: #0e0e0e;
      color: #ccc;
      padding: 50px 25px 20px;
      font-family: Arial, sans-serif;
      margin-top: 7%;
    }

    .footer-wrapper {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 30px;
    }

    .footer-box { min-width: 0; }

    .footer-box h4 {
      color: #fff;
      font-size: 18px;
      margin-bottom: 15px;
    }

    .footer-box ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-box ul li {
      margin-bottom: 10px;
      font-size: 14px;
    }

    .footer-box ul li a {
      color: #aaa;
      text-decoration: none;
      transition: 0.3s;
    }

    .footer-box ul li a:hover { color: #1d99a6; }

    .footer-box p {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .social-icons { margin-top: 15px; }

    .social-icons a {
      display: inline-flex;
      width: 36px;
      height: 36px;
      background: #1c1c1c;
      color: #fff;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      margin-right: 8px;
      transition: 0.3s;
      font-size: 14px;
    }

    .social-icons a:hover {
      background: #1d99a6;
      color: #000;
      transform: translateY(-3px);
    }

    .footer-bottom {
      text-align: center;
      margin-top: 35px;
      font-size: 13px;
      color: #1d99a6;
      border-top: 1px solid #1d99a6;
      padding-top: 15px;
    }

    @media (max-width: 992px) { .footer-wrapper { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 576px)  { .footer-wrapper { grid-template-columns: repeat(2, 1fr); } }

    .breadcrumb-bar {
      background: #f8f8f8;
      border-bottom: 1px solid #eee;
      padding: 10px 0;
      font-size: 13px;
      color: #888;
    }

    .breadcrumb-bar a {
      color: #1d99a6;
      text-decoration: none;
    }

    .breadcrumb-bar a:hover { text-decoration: underline; }

    .breadcrumb-bar span {
      margin: 0 6px;
      color: #bbb;
    }

    .contact-hero {
      background: linear-gradient(135deg, #0e0e0e 0%, #1a2e2e 100%);
      padding: 50px 0 40px;
      text-align: center;
      margin-bottom: 40px;
    }

    .contact-hero .contact-title { color: white; }
    .contact-hero .contact-subtext { color: #bbb; }

    .contact-hero .teal-tag {
      display: inline-block;
      background: #1d99a6;
      color: white;
      font-size: 12px;
      padding: 4px 14px;
      border-radius: 20px;
      letter-spacing: 1px;
      margin-bottom: 15px;
    }

    .hero-stats {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 25px;
      flex-wrap: wrap;
    }

    .hero-stat h4 {
      color: #1d99a6;
      font-size: 24px;
      font-weight: 800;
      margin: 0;
    }

    .hero-stat p {
      color: #aaa;
      font-size: 11px;
      margin: 0;
      letter-spacing: 1px;
    }

    .info-box {
      display: flex;
      align-items: center;
      gap: 12px;
      background: #f4f8f9;
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 12px;
      font-size: 14px;
      color: #333;
      cursor: pointer;
      transition: 0.3s;
      border: 1px solid #eee;
    }

    .info-box:hover {
      background: #e6f5f7;
      border-color: #1d99a6;
    }

    .info-box i {
      color: #1d99a6;
      font-size: 16px;
      width: 20px;
      text-align: center;
    }

    .field-error {
      font-size: 12px;
      color: #e74c3c;
      margin-top: -3px;
      margin-bottom: 8px;
      display: none;
    }

    .field-error.show { display: block; }

    input.error { border-color: #e74c3c !important; }

    .char-count {
      font-size: 12px;
      color: #aaa;
      text-align: right;
      margin-top: -2px;
      margin-bottom: 8px;
    }

    #scrollTopBtn {
      position: fixed;
      bottom: 30px;
      right: 25px;
      width: 45px;
      height: 45px;
      background: #1d99a6;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 18px;
      cursor: pointer;
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 999;
      box-shadow: 0 4px 15px rgba(29, 153, 166, 0.4);
      transition: 0.3s;
    }

    #scrollTopBtn:hover {
      background: black;
      transform: translateY(-3px);
    }

    #toast {
      position: fixed;
      bottom: 85px;
      right: 25px;
      background: #1a1a1a;
      color: white;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 13px;
      z-index: 9999;
      border-left: 3px solid #1d99a6;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.4s ease;
      pointer-events: none;
    }

    #toast.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <div class="top-line"></div>

  <header class="top-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-3 d-flex align-items-center">
          <img src="<?= IMG_URL ?>Modern Interior Design Logo.png" class="img-fluid me-2" width="70">
          <div>
            <h4 class="lh mb-0">Luminor Maison</h4>
            <p class="lp mb-0">Interior Design</p>
          </div>
        </div>
        <div class="col-md-9">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                <ul class="navbar-nav mx-auto gap-4">

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Mainpg.php" data-bs-toggle="dropdown">Design Gallery</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="Mainpg.php">All Designs</a></li>
                      <li><a class="dropdown-item" href="kitchen.php">Modular Kitchen</a></li>
                      <li><a class="dropdown-item" href="Bedroom.php">Bedroom Design</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="furniture.php" data-bs-toggle="dropdown">Offering</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="furniture.php">Furniture</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blogs</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="Designtips.php">Design Tips</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Cities</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Bhopal</a></li>
                      <li><a class="dropdown-item" href="#">Delhi</a></li>
                      <li><a class="dropdown-item" href="#">Bangalore</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">More</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="working.php">How it works</a></li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>

                  <li class="nav-item d-flex align-items-center">
                    <a href="https://wa.me/919800000000?text=Hello%20Luminor%20Maison%20Team%2C%20I%20am%20interested%20in%20your%20interior%20design%20services." target="_blank" title="WhatsApp">
                      <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="40px" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                      </svg>
                    </a>
                  </li>

                  <?php if (isset($_SESSION['user_name'])): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="wishlist.php">
                        <i class="fa-regular fa-heart"></i> Wishlist
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-regular fa-user"></i> <?= $_SESSION['user_name'] ?>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="user_logout.php">
                          <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a></li>
                      </ul>
                    </li>
                  <?php else: ?>
                    <li class="nav-item d-flex align-items-center">
                      <a href="user_login.php" class="btn btn-sm" style="background:#1d99a6;color:white;border-radius:8px;">
                        <i class="fa-regular fa-user"></i> Login
                      </a>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="breadcrumb-bar">
    <div class="container">
      <a href="Mainpg.php">Home</a>
      <span>›</span>
      Contact Us
    </div>
  </div>

  <div class="contact-hero">
    <div class="container">
      <span class="teal-tag"><i class="fa-solid fa-headset"></i> &nbsp; We're Here to Help</span>
      <h2 class="contact-title">Get In Touch With Us</h2>
      <p class="contact-subtext">Have questions about your interior project? Connect with us and we'll help you design a space that feels perfect for you.</p>
      <div class="hero-stats">
        <div class="hero-stat"><h4>Free</h4><p>CONSULTATION</p></div>
        <div class="hero-stat"><h4>24H</h4><p>RESPONSE TIME</p></div>
        <div class="hero-stat"><h4>5 YRS</h4><p>WARRANTY</p></div>
        <div class="hero-stat"><h4>50</h4><p>DAYS DELIVERY</p></div>
      </div>
    </div>
  </div>

  <section class="contact-page container my-5">
    <div class="row g-5">

      <div class="col-lg-5">
        <div class="contact-info h-100">
          <h4>Contact Information</h4>
          <p class="mb-4">Reach out to us for a personalized design experience.</p>

          <div class="info-box" onclick="copyText('+91 98765 43210', 'Phone number copied!')">
            <i class="fa-solid fa-phone"></i>
            <span>+91 98765 43210 &nbsp; <small style="color:#aaa;">(click to copy)</small></span>
          </div>

          <div class="info-box" onclick="copyText('design@luminor.com', 'Email copied!')">
            <i class="fa-solid fa-envelope"></i>
            <span>design@luminor.com &nbsp; <small style="color:#aaa;">(click to copy)</small></span>
          </div>

          <div class="premium-features">
            <div class="feature-item">
              <div class="feature-icon"><i class="fa-solid fa-check"></i></div>
              <p class="feature-text">Free Initial Consultation</p>
            </div>
            <div class="feature-item">
              <div class="feature-icon"><i class="fa-solid fa-star"></i></div>
              <p class="feature-text">Certified Interior Experts</p>
            </div>
            <div class="feature-item">
              <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
              <p class="feature-text">10-Year Material Warranty</p>
            </div>
            <div class="quote-box">
              <p class="quote-text">"Your home should tell the story of who you are, and be a collection of what you love."</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="contact-form-box">
          <h4>Send a Message</h4>

         <form action="contact.php" method="POST" id="contactForm">

            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" name="name" id="nameInput" placeholder="Your Name" required>
                <p class="field-error" id="nameError">Please enter your name</p>
              </div>
              <div class="col-md-6 mb-3">
                <input type="email" name="email" id="emailInput" placeholder="Your Email" required>
                <p class="field-error" id="emailError">Please enter a valid email</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" name="phone" id="phoneInput" placeholder="Phone Number">
                <p class="field-error" id="phoneError">Enter valid 10-digit number</p>
              </div>
              <div class="col-md-6 mb-3">
                <input type="date" name="appointment_date" id="dateInput" required>
                <p class="field-error" id="dateError">Please select a date</p>
              </div>
            </div>
            <div class="mb-3">
              <textarea name="message" id="msgInput" rows="4" placeholder="Your Message" maxlength="300"></textarea>
              <p class="char-count"><span id="charCount">0</span> / 300</p>
            </div>
            <button type="submit" class="btn submit-btn">
              Send Message &nbsp; <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>

    </div>
  </section>

  <section class="visit-section container my-5">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <h3 class="visit-title">Visit Our Studio</h3>
        <p class="visit-text">Experience our design ideas in person. Visit our studio to explore materials, layouts and expert guidance for your dream home.</p>
        <div class="visit-info">
          <p><i class="fa-solid fa-location-dot"></i> Bhopal, Madhya Pradesh</p>
          <p><i class="fa-solid fa-phone"></i> +91 98765 43210</p>
          <p><i class="fa-solid fa-clock"></i> Mon - Sat: 10AM - 7PM</p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="map-box">
          <iframe src="https://www.google.com/maps?q=Bhopal&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </section>

  <section class="faq-section container my-5">
    <div class="text-center mb-4">
      <h3 class="faq-title">Your Queries Answered</h3>
      <p class="faq-sub">Find answers to common questions about our interior design services.</p>
    </div>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#q1">
            How does the design process work?
          </button>
        </h2>
        <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">We start with understanding your requirements, followed by layout planning, design suggestions and final execution guidance.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q2">
            Do you provide customized interior solutions?
          </button>
        </h2>
        <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Yes, all designs are tailored based on your space, lifestyle and budget preferences.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q3">
            What is the estimated timeline?
          </button>
        </h2>
        <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Project timelines vary depending on size and complexity, typically ranging from a few weeks to a couple of months.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q4">
            Can I consult before finalizing?
          </button>
        </h2>
        <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Yes, we offer consultation sessions to help you understand design possibilities before making decisions.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer-dark">
    <div class="footer-wrapper">
      <div class="footer-box">
        <h4>Company</h4>
        <ul>
          <li><a href="contact.php">About Us</a></li>
          <li><a href="#">Careers (Coming Soon)</a></li>
          <li><a href="furniture.php">Design Experts</a></li>
          <li><a href="#">Reviews</a></li>
          <li><a href="Designtips.php">Blog</a></li>
        </ul>
      </div>
      <div class="footer-box">
        <h4>Explore</h4>
        <ul>
          <li><a href="contact.php">Free Consultation</a></li>
          <li><a href="#">Cost Calculator</a></li>
          <li><a href="#">EMI Options</a></li>
          <li><a href="working.php">Offers</a></li>
          <li><a href="contact.php">Help Center</a></li>
        </ul>
      </div>
      <div class="footer-box">
        <h4>Our Locations</h4>
        <ul>
          <li><a href="#">Bhopal</a></li>
          <li><a href="#">Mumbai</a></li>
          <li><a href="#">Bengaluru</a></li>
          <li><a href="#">Hyderabad</a></li>
          <li><a href="#">Pune</a></li>
          <li><a href="#">Chennai</a></li>
        </ul>
      </div>
      <div class="footer-box">
        <h4>Our Services</h4>
        <ul>
          <li><a href="Mainpg.php">Home Interiors</a></li>
          <li><a href="kitchen.php">Modular Kitchen</a></li>
          <li><a href="Bedroom.php">Bedroom Design</a></li>
          <li><a href="working.php">Living Room</a></li>
          <li><a href="#">3D Visualization</a></li>
        </ul>
      </div>
      <div class="footer-box">
        <h4>Contact</h4>
        <p>Email: <a href="mailto:interiordesign@.in">interiordesign@.in</a></p>
        <p>Phone: <a href="tel:+919800000000">+91 98000 00000</a></p>
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 Interior Design Project | All Rights Reserved</p>
    </div>
  </footer>

  <button id="scrollTopBtn"><i class="fa-solid fa-arrow-up"></i></button>
  <div id="toast"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    function showToast(msg) {
      var t = document.getElementById('toast');
      t.textContent = msg;
      t.classList.add('show');
      setTimeout(function() { t.classList.remove('show'); }, 2500);
    }

    function copyText(text, msg) {
      navigator.clipboard.writeText(text).then(function() {
        showToast('📋 ' + msg);
      }).catch(function() {
        showToast('📋 ' + msg);
      });
    }

    var msgInput = document.getElementById('msgInput');
    var charCount = document.getElementById('charCount');
    msgInput.addEventListener('input', function() {
      charCount.textContent = this.value.length;
      charCount.style.color = this.value.length >= 280 ? '#e74c3c' : '#aaa';
    });

    document.getElementById('contactForm').addEventListener('submit', function(e) {
      var valid = true;

      var name = document.getElementById('nameInput').value.trim();
      if (name.length < 2) {
        document.getElementById('nameError').classList.add('show');
        document.getElementById('nameInput').classList.add('error');
        valid = false;
      } else {
        document.getElementById('nameError').classList.remove('show');
        document.getElementById('nameInput').classList.remove('error');
      }

      var email = document.getElementById('emailInput').value.trim();
      if (!email.includes('@') || !email.includes('.')) {
        document.getElementById('emailError').classList.add('show');
        document.getElementById('emailInput').classList.add('error');
        valid = false;
      } else {
        document.getElementById('emailError').classList.remove('show');
        document.getElementById('emailInput').classList.remove('error');
      }

      var phone = document.getElementById('phoneInput').value.trim();
      if (phone.length > 0 && phone.length !== 10) {
        document.getElementById('phoneError').classList.add('show');
        document.getElementById('phoneInput').classList.add('error');
        valid = false;
      } else {
        document.getElementById('phoneError').classList.remove('show');
        document.getElementById('phoneInput').classList.remove('error');
      }

      if (!valid) {
        e.preventDefault();
        showToast('⚠️ Please fill all fields correctly!');
      }
    });

    var scrollBtn = document.getElementById('scrollTopBtn');
    window.onscroll = function() {
      scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
    };
    scrollBtn.onclick = function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    };
  </script>

</body>
</html>