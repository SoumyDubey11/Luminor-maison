<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interior Designs</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- font awesome -->
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
      min-height: 70px;
      /* height ki jagah min-height */
      height: auto;
      /* expand ho sake mobile mein */
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      /* content wrap ho sake */
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

    .hero-video-only {
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .hero-video-only video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* 2nd section */
    .container-fluid-inner {
      height: 220px;
      background-color: #209ba8;
      margin-top: 69px;
    }

    .h {
      margin-top: 10%;
      margin-left: 40px;
      font-weight: 800;
      font-size: 26px;
      color: white;
    }

    .p {
      margin-left: 40px;
      color: white;
    }

    .box {
      background: rgba(255, 255, 255, 1);
      height: 52px;
      border-radius: 6px;
      display: flex;
      justify-content: center;
      margin-left: 0;
      align-items: center;
      color: rgba(34, 34, 34, 1);
      font-size: 20px;
      width: 85%;
      white-space: nowrap;
      margin-top: 20px;
    }

    .box:hover {
      background-color: #e4df91cf;
      color: white;
    }

    @media (max-width: 768px) {
      .container-fluid-inner {
        height: auto;
        padding: 20px 10px;
      }

      .h {
        margin: 0;
        text-align: center;
        font-size: 22px;
      }

      .p {
        margin: 10px auto;
        text-align: center;
        width: 95%;
        font-size: 15px;
      }

      .box {
        width: 100% !important;
        margin: 10px auto !important;
        font-size: 16px !important;
      }

      .hero-video-only {
        height: 60vh;
      }
    }

    /* Cards section */
    .one {
      text-align: center;
      margin-top: 54px;
      font-size: 35px;
      color: #29253c;
      font-weight: 600;
      font-family: sans-serif;
      line-height: 42px;
    }

    .from {
      text-align: center;
      font-size: 19px;
    }

    .card-title {
      text-align: center;
      font-weight: 600;
    }

    .card-text {
      text-align: center;
    }

    .card {
      border-radius: 6px;
      height: 364px;
      overflow: hidden;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
      transition: all 0.4s ease;
    }

    .card:hover {
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.35);
    }

    @media (max-width: 768px) {
      .one {
        font-size: 26px;
        line-height: 32px;
        margin-top: 30px;
      }

      .from {
        font-size: 16px;
        width: 90%;
        margin: 10px auto 20px auto;
      }

      .card {
        width: 100% !important;
        height: auto;
        margin-bottom: 20px;
      }

      .card-img-top {
        width: 100% !important;
        height: auto !important;
        object-fit: cover;
      }

      .card-title,
      .card-text {
        font-size: 16px;
      }

      .row {
        gap: 15px;
      }
    }

    /* Why Choose Us */
    .why {
      text-align: center;
      padding-top: 5%;
      font-size: 34px;
      font-weight: 700;
    }

    .circle {
      width: 160px;
      height: 160px;
      border: 2px solid rgb(226, 221, 221);
      border-radius: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #000;
      color: #fff;
      position: relative;
      transition: all 0.4s ease;
    }

    .circle h3 {
      font-size: 18px;
    }

    .circle h3,
    .circle small {
      color: #fff;
      transition: 0.3s;
    }

    .circle:hover {
      transform: translateY(-10px);
      box-shadow: 0 18px 40px rgba(32, 155, 168, 0.35);
      border-color: #209ba8;
    }

    .circle::after {
      content: "";
      position: absolute;
      inset: 10px;
      border-radius: 50%;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: 0.4s;
    }

    .circle:hover::after {
      inset: 6px;
      border-color: #209ba8;
    }

    .circle:hover h3 {
      color: #209ba8;
      letter-spacing: 1px;
    }

    .circle .count-num {
      font-size: 18px;
      font-weight: 700;
      color: white;
      transition: color 0.3s;
    }

    .circle:hover .count-num {
      color: #209ba8;
    }

    @media (max-width: 768px) {
      .why {
        font-size: 24px;
        padding-top: 20px;
      }

      .circle {
        width: 120px !important;
        height: 120px !important;
        margin: 10px auto;
      }

      .circle h3 {
        font-size: 14px;
      }

      .circle p {
        font-size: 12px;
      }

      .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
      }

      .col-md-2 {
        flex: 0 0 auto;
      }
    }

    /* Last section */
    .last-section {
      background: #f7f5f2;
      margin-top: 7%;
    }

    .last-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .last-content {
      padding: 60px;
    }

    .last-content h6 {
      font-size: 13px;
      letter-spacing: 2px;
      color: #209ba8;
      margin-bottom: 15px;
    }

    .last-content h2 {
      font-size: 32px;
      font-weight: 500;
      color: #222;
      margin-bottom: 20px;
    }

    .last-content p {
      font-size: 16px;
      color: #555;
      line-height: 1.7;
    }

    .view-btn {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 30px;
      border: 1px solid #209ba8;
      color: white;
      background-color: #209ba8;
      text-decoration: none;
      font-size: 14px;
      letter-spacing: 1px;
      transition: 0.4s;
    }

    .view-btn:hover {
      background-color: black;
      color: white;
    }

    /* Footer */
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

    .footer-box {
      min-width: 0;
    }

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

    .footer-box ul li a:hover {
      color: #1d99a6;
    }

    .footer-box p {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .social-icons {
      margin-top: 15px;
    }

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

    @media (max-width: 992px) {
      .footer-wrapper {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 576px) {
      .footer-wrapper {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    /* Announcement Bar */
    .announcement-bar {
      width: 100%;
      height: 40px;
      background-color: #1d99a6;
      display: flex;
      align-items: center;
      overflow: hidden;
    }

    .announcement-bar .ticker {
      display: flex;
      white-space: nowrap;
      animation: ticker-scroll 18s linear infinite;
      color: white;
      font-size: 14px;
    }

    .announcement-bar .ticker span {
      margin: 0 40px;
    }

    @keyframes ticker-scroll {
      0% {
        transform: translateX(100vw);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    /* Welcome Screen */
    #welcome-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #0e0e0e;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      transition: opacity 0.8s ease, visibility 0.8s ease;
    }

    #welcome-screen.hide {
      opacity: 0;
      visibility: hidden;
    }

    .welcome-content h1 {
      color: #209ba8;
      font-size: 48px;
      font-weight: 700;
      letter-spacing: 3px;
      animation: fadeUp 1s ease forwards;
    }

    .welcome-content p {
      color: #ccc;
      text-align: center;
      font-size: 18px;
      animation: fadeUp 1.3s ease forwards;
    }

    .welcome-content p::after {
      content: '';
      animation: dots 1.5s steps(3, end) infinite;
    }

    @keyframes dots {
      0% {
        content: '';
      }

      33% {
        content: '.';
      }

      66% {
        content: '..';
      }

      100% {
        content: '...';
      }
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Scroll to top */
    #scrollTopBtn {
      position: fixed;
      bottom: 100px;
      right: 25px;
      width: 45px;
      height: 45px;
      background: #209ba8;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 999;
      box-shadow: 0 4px 15px rgba(32, 155, 168, 0.4);
      transition: all 0.3s ease;
    }

    #scrollTopBtn:hover {
      background: black;
      transform: translateY(-3px);
    }

    /* Floating WhatsApp */
    #floatingWhatsapp {
      position: fixed;
      bottom: 30px;
      right: 25px;
      width: 55px;
      height: 55px;
      background: #25d366;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
      box-shadow: 0 4px 15px rgba(37, 211, 102, 0.5);
      transition: all 0.3s ease;
      text-decoration: none;
    }

    #floatingWhatsapp:hover {
      transform: scale(1.15);
    }

    #floatingWhatsapp svg {
      fill: white;
    }

    #floatingWhatsapp::before {
      content: '';
      position: absolute;
      width: 55px;
      height: 55px;
      background: rgba(37, 211, 102, 0.4);
      border-radius: 50%;
      animation: pulse-ring 2s ease-out infinite;
    }

    @keyframes pulse-ring {
      0% {
        transform: scale(1);
        opacity: 0.8;
      }

      100% {
        transform: scale(1.8);
        opacity: 0;
      }
    }

    /* Cookie Popup */
    #cookiePopup {
      position: fixed;
      bottom: 20px;
      left: 20px;
      max-width: 360px;
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px 25px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
      z-index: 9998;
      display: none;
    }

    #cookiePopup p {
      font-size: 13px;
      color: #444;
      margin-bottom: 15px;
      line-height: 1.5;
    }

    #cookiePopup .cookie-btns {
      display: flex;
      gap: 10px;
    }

    #cookiePopup .accept-btn {
      padding: 8px 20px;
      background: #209ba8;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 13px;
      cursor: pointer;
      transition: 0.3s;
    }

    #cookiePopup .accept-btn:hover {
      background: #0e0e0e;
    }

    #cookiePopup .decline-btn {
      padding: 8px 20px;
      background: transparent;
      color: #888;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 13px;
      cursor: pointer;
      transition: 0.3s;
    }

    #cookiePopup .decline-btn:hover {
      border-color: #888;
      color: #333;
    }

    /* TESTIMONIALS */
    .testi-section {
      background: #f4f8f9;
      padding: 60px 20px 50px;
      text-align: center;
    }

    .testi-heading {
      font-size: 34px;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 8px;
    }

    .testi-sub {
      font-size: 16px;
      color: #777;
      margin-bottom: 35px;
    }

    .testi-outer {
      display: flex;
      align-items: center;
      gap: 15px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .testi-arrow {
      background: #209ba8;
      color: white;
      border: none;
      border-radius: 50%;
      width: 44px;
      height: 44px;
      min-width: 44px;
      font-size: 20px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 12px rgba(32, 155, 168, 0.3);
      flex-shrink: 0;
    }

    .testi-arrow:hover {
      background: #000;
    }

    .testi-viewport {
      flex: 1;
      overflow: hidden;
    }

    .testi-track {
      display: flex;
      gap: 20px;
    }

    .testi-card {
      background: white;
      border-radius: 14px;
      padding: 28px 24px;
      flex: 0 0 calc((100% - 40px) / 3);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
      text-align: left;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-top: 3px solid #209ba8;
      box-sizing: border-box;
    }

    .testi-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(32, 155, 168, 0.2);
    }

    .testi-stars {
      color: #f0a500;
      font-size: 20px;
      margin-bottom: 12px;
      letter-spacing: 2px;
    }

    .testi-text {
      font-size: 14px;
      color: #444;
      line-height: 1.7;
      margin-bottom: 20px;
      font-style: italic;
    }

    .testi-author {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .testi-avatar {
      width: 44px;
      height: 44px;
      min-width: 44px;
      border-radius: 50%;
      background: #209ba8;
      color: white;
      font-size: 18px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .testi-author strong {
      display: block;
      font-size: 14px;
      color: #222;
    }

    .testi-author span {
      font-size: 12px;
      color: #999;
    }

    .testi-dots {
      margin-top: 25px;
      display: flex;
      justify-content: center;
      gap: 8px;
    }

    .dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #ccc;
      cursor: pointer;
      transition: 0.3s;
      border: none;
      padding: 0;
    }

    .dot.active {
      background: #209ba8;
      transform: scale(1.3);
    }

    @media (min-width: 769px) and (max-width: 1024px) {
      .testi-card {
        flex: 0 0 calc((100% - 20px) / 2);
      }
    }

    @media (max-width: 768px) {
      .testi-heading {
        font-size: 24px;
      }

      .testi-sub {
        font-size: 14px;
      }

      .testi-card {
        flex: 0 0 100%;
      }

      .testi-arrow {
        width: 36px;
        height: 36px;
        min-width: 36px;
        font-size: 16px;
      }
    }

    /* <!-- CSS Animations --> */

    @keyframes popIn {
      from {
        opacity: 0;
        transform: scale(0.85) translateY(20px);
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }
  </style>
</head>

<body>

  <!-- WELCOME SCREEN -->
  <div id="welcome-screen">
    <div class="welcome-content">
      <h1>Luminor Maison</h1>
      <p>Crafting Your Dream Space</p>
    </div>
  </div>

  <!-- ANNOUNCEMENT BAR -->
  <div class="announcement-bar">
    <div class="ticker">
      <span>🏠 Free Consultation Available — Book Now!</span>
      <span>✨ New Modular Kitchen Designs Launched</span>
      <span>🎉 5 Years Warranty on All Interiors</span>
      <span>📞 Call Us: +91 98000 00000</span>
      <span>🚀 50 Working Days Project Completion Guarantee</span>
    </div>
  </div>

  <!-- HEADER -->
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
                    <a class="nav-link dropdown-toggle" href="frontend/furniture.php" data-bs-toggle="dropdown">Offering</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="furniture.php">Furniture</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Designtips.php" data-bs-toggle="dropdown">Blogs</a>
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
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
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
                      <a href="user_login.php" class="btn btn-sm" style="background:#209ba8; color:white; border-radius:8px;">
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

  <!-- HERO VIDEO -->
  <section class="hero-video-only">
    <video autoplay muted loop playsinline>
      <source src="<?= IMG_URL ?>hero.mp4" type="video/mp4">
    </video>
  </section>

  <!-- INNER CONTAINER -->
  <div class="container-fluid-inner">
    <div class="row">
      <div class="col-md-4">
        <h3 class="h">Modern Interior Design</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <p class="p">Redefine your living spaces with exclusive interior designs that combine luxury, functionality, and seamless storage. Designed to elevate it.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <p class="box" style="margin-left: 57px; width: 136px;">Balcony</p>
      </div>
      <div class="col-md-2">
        <p class="box" style="margin-left: -9;">Dinning Room</p>
      </div>
      <div class="col-md-2">
        <p class="box" style="margin-left: -65;">kids Room</p>
      </div>
      <div class="col-md-2">
        <p class="box">Bathroom</p>
      </div>
      <div class="col-md-2">
        <p class="box">Living space</p>
      </div>
      <div class="col-md-1">
        <p class="box">1 BHK</p>
      </div>
      <div class="col-md-1">
        <p class="box">2 BHK</p>
      </div>
    </div>
  </div>

  <!-- ONE DESTINATION SECTION -->
  <h2 class="one">One Destination for All Interior Needs</h2>
  <p class="from">From planning and design to execution and décor, we provide some elegant touch complete <br> interior solutions for homes and offices—making every space functional, stylish, and timeless</p>

  <div class="container">
    <div class="row">
      <!-- CARDS — ye poora while loop replace karo -->
      <?php
      $cards = mysqli_query($conn, "SELECT * FROM site_images WHERE page='homepage' AND section='card' ORDER BY sort_order");
      while ($c = mysqli_fetch_assoc($cards)):
      ?>
        <div class="col-md-3">
          <div class="card" style="width:18rem;">
            <img src="<?= ADMIN_IMG . htmlspecialchars($c['image']) ?>"
              class="card-img-top"
              style="height:217px; object-fit:cover;"
              onerror="this.src='https://placehold.co/350x217?text=No+Image'">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($c['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($c['description']) ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!-- WHY CHOOSE US -->
  <div class="container">
    <h3 class="why">Why Choose Us</h3>
    <div class="row" style="margin-top: 25px;">
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="0" data-suffix="PREMIUM">PREMIUM</h3>
          <p>Materials</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="5" data-suffix=" YEARS">0</h3>
          <p>Warranty</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="50" data-suffix=" DAYS">0</h3>
          <p>Completion</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="0" data-suffix="LIFELONG">LIFELONG</h3>
          <p>Service Support</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="20" data-suffix=" Lakh+">0</h3>
          <p>Catalogue</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="circle">
          <h3 class="count-num" data-target="2000" data-suffix="+">0</h3>
          <p>Designers</p>
        </div>
      </div>
    </div>
  </div>

  <!-- TESTIMONIALS SLIDER -->
  <section class="testi-section">
    <h2 class="testi-heading">What Our Clients Say</h2>
    <p class="testi-sub">Real stories from real homeowners ❤️</p>

    <div class="testi-outer">
      <button class="testi-arrow" id="prevBtn">&#8592;</button>
      <div class="testi-viewport">
        <div class="testi-track" id="testiTrack">

          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"Luminor Maison ne hamare ghar ko sapno ka ghar bana diya! Design bohot elegant hai aur team ne 45 din mein kaam complete kiya."</p>
            <div class="testi-author">
              <div class="testi-avatar">R</div>
              <div><strong>Rahul Sharma</strong><span>Bhopal — 3BHK Home</span></div>
            </div>
          </div>

          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"Modular kitchen amazing bana hai! Storage bahut zyada hai aur quality premium hai. 5 saal ki warranty bhi mili. Highly recommended!"</p>
            <div class="testi-author">
              <div class="testi-avatar">P</div>
              <div><strong>Priya Verma</strong><span>Delhi — Modular Kitchen</span></div>
            </div>
          </div>

          <div class="testi-card">
            <div class="testi-stars">★★★★☆</div>
            <p class="testi-text">"Bedroom design ekdum minimalist aur modern hai. Team ka response time bahut achha tha. Paise wasool experience raha!"</p>
            <div class="testi-author">
              <div class="testi-avatar">A</div>
              <div><strong>Amit Joshi</strong><span>Bangalore — Bedroom</span></div>
            </div>
          </div>

          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"Living room ka design dekh ke guests bhi impressed ho jaate hain! Colors aur furniture combination superb hai. Thank you team!"</p>
            <div class="testi-author">
              <div class="testi-avatar">S</div>
              <div><strong>Sneha Patel</strong><span>Mumbai — Living Room</span></div>
            </div>
          </div>

          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"2BHK ka poora interior karwaya. Budget mein kaam hua aur quality mein koi compromise nahi. Definitely 5 star service!"</p>
            <div class="testi-author">
              <div class="testi-avatar">V</div>
              <div><strong>Vivek Gupta</strong><span>Pune — 2BHK Full Home</span></div>
            </div>
          </div>

        </div>
      </div>
      <button class="testi-arrow" id="nextBtn">&#8594;</button>
    </div>

    <div class="testi-dots" id="testiDots"></div>
  </section>

  <!-- LAST SECTION -->
  <div class="container-fluid last-section">
    <div class="row align-items-center">
      <div class="col-md-7 p-0">
        <!-- LAST SECTION — ye replace karo -->
        <?php
        $last = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM site_images WHERE page='homepage' AND section='last_section' LIMIT 1"));
        ?>
        <img src="<?= ADMIN_IMG . htmlspecialchars($last['image']) ?>"
          alt="Interior Design"
          class="last-img"
          onerror="this.src='https://placehold.co/800x500?text=No+Image'">

      </div>
      <div class="col-md-5 last-content">
        <h6>OUR DESIGN PHILOSOPHY</h6>
        <h2>Designs That Reflect Your Lifestyle</h2>
        <p>Every home tells a story. We craft thoughtfully designed interiors that balance aesthetics, comfort, and functionality — tailored to your taste, space, and everyday living.</p>
        <a href="Designtips.php" class="view-btn">View More Designs</a>
      </div>
    </div>
  </div>

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

  <!-- SCROLL TO TOP -->
  <button id="scrollTopBtn" title="Upar jao">
    <i class="fa-solid fa-arrow-up"></i>
  </button>

  <!-- FLOATING WHATSAPP -->
  <a id="floatingWhatsapp" href="https://wa.me/919800000000" target="_blank" title="WhatsApp pe baat karo">
    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 16 16">
      <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
    </svg>
  </a>

  <!-- COOKIE POPUP -->
  <div id="cookiePopup">
    <p>🍪 Hum cookies use karte hain taaki aapka experience better ho. Kya aap agree karte hain?</p>
    <div class="cookie-btns">
      <button class="accept-btn" onclick="acceptCookie()">Accept</button>
      <button class="decline-btn" onclick="declineCookie()">Decline</button>
    </div>
  </div>


  <!-- 1. CONSULTATION POPUP (4 sec baad auto show) -->
  <div id="consultPopup" style="
  display:none;
  position:fixed; top:0; left:0; width:100%; height:100%;
  background:rgba(0,0,0,0.55); z-index:99999;
  align-items:center; justify-content:center;
  backdrop-filter: blur(4px);
">
    <div style="
    background:white; border-radius:16px; max-width:480px; width:92%;
    overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.3);
    animation: popIn 0.5s cubic-bezier(0.175,0.885,0.32,1.275) forwards;
    position:relative;
  ">
      <!-- Top banner -->
      <div style="background:linear-gradient(135deg,#209ba8,#0e7a85); padding:28px 30px 22px; color:white; text-align:center;">
        <div style="font-size:36px; margin-bottom:8px;">🏠</div>
        <h3 style="margin:0 0 6px; font-size:22px; font-weight:700; letter-spacing:0.5px;">Free Design Consultation</h3>
        <p style="margin:0; font-size:13px; opacity:0.9;">Limited slots available — Book yours today!</p>
      </div>

      <!-- Body -->
      <div style="padding:26px 30px 28px;">
        <p style="font-size:14px; color:#555; margin:0 0 18px; text-align:center; line-height:1.6;">
          Transform your space with a <strong>FREE 30-minute</strong> consultation with our expert designers. No obligation!
        </p>

        <div style="display:flex; flex-direction:column; gap:12px;">
          <input type="text" id="cp_name" placeholder="👤  Your Name" style="
          width:100%; padding:12px 15px; border:1.5px solid #e0e0e0;
          border-radius:8px; font-size:14px; outline:none; transition:0.3s;
          box-sizing:border-box;
        " onfocus="this.style.borderColor='#209ba8'" onblur="this.style.borderColor='#e0e0e0'">

          <input type="tel" id="cp_phone" placeholder="📞  Phone Number" style="
          width:100%; padding:12px 15px; border:1.5px solid #e0e0e0;
          border-radius:8px; font-size:14px; outline:none; transition:0.3s;
          box-sizing:border-box;
        " onfocus="this.style.borderColor='#209ba8'" onblur="this.style.borderColor='#e0e0e0'">

          <select id="cp_type" style="
          width:100%; padding:12px 15px; border:1.5px solid #e0e0e0;
          border-radius:8px; font-size:14px; outline:none; color:#555;
          box-sizing:border-box; background:white;
        ">
            <option value="">🏡 Select Room Type</option>
            <option>Full Home Interior</option>
            <option>Modular Kitchen</option>
            <option>Bedroom Design</option>
            <option>Living Room</option>
            <option>Bathroom</option>
          </select>
        </div>

        <button onclick="submitConsult()" style="
        width:100%; margin-top:16px; padding:13px;
        background:linear-gradient(135deg,#209ba8,#0e7a85);
        color:white; border:none; border-radius:8px;
        font-size:15px; font-weight:600; cursor:pointer;
        letter-spacing:0.5px; transition:0.3s;
      " onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
          Book Free Consultation →
        </button>

        <p style="text-align:center; margin:12px 0 0; font-size:12px; color:#999;">
          🔒 We never share your info. No spam, ever.
        </p>
      </div>

      <!-- Close btn -->
      <button onclick="closeConsult()" style="
      position:absolute; top:12px; right:14px;
      background:rgba(255,255,255,0.2); border:none;
      color:white; font-size:20px; cursor:pointer;
      width:30px; height:30px; border-radius:50%;
      display:flex; align-items:center; justify-content:center;
      line-height:1;
    ">&times;</button>
    </div>
  </div>

  <!-- 2. SUCCESS MESSAGE (consultation submit ke baad) -->
  <div id="successMsg" style="
  display:none; position:fixed; top:0; left:0; width:100%; height:100%;
  background:rgba(0,0,0,0.55); z-index:100000;
  align-items:center; justify-content:center;
  backdrop-filter:blur(4px);
">
    <div style="
    background:white; border-radius:16px; max-width:380px; width:90%;
    padding:40px 30px; text-align:center;
    box-shadow:0 25px 60px rgba(0,0,0,0.3);
    animation: popIn 0.4s cubic-bezier(0.175,0.885,0.32,1.275) forwards;
  ">
      <div style="font-size:56px; margin-bottom:12px;">🎉</div>
      <h3 style="color:#209ba8; margin:0 0 10px; font-size:22px;">Booking Confirmed!</h3>
      <p style="color:#555; font-size:14px; line-height:1.7; margin:0 0 22px;">
        Thank you! Our design expert will call you within <strong>24 hours</strong> to schedule your free consultation.
      </p>
      <button onclick="closeSuccess()" style="
      padding:11px 30px; background:#209ba8; color:white;
      border:none; border-radius:8px; font-size:14px;
      font-weight:600; cursor:pointer;
    ">Sounds Great! 👍</button>
    </div>
  </div>

  <!-- 3. EXIT INTENT POPUP -->
  <div id="exitPopup" style="
  display:none; position:fixed; top:0; left:0; width:100%; height:100%;
  background:rgba(0,0,0,0.6); z-index:99998;
  align-items:center; justify-content:center;
  backdrop-filter:blur(3px);
">
    <div style="
    background:white; border-radius:16px; max-width:460px; width:92%;
    overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.35);
    animation: popIn 0.4s cubic-bezier(0.175,0.885,0.32,1.275) forwards;
    position:relative;
  ">
      <div style="background:#1a1a1a; padding:22px 28px; text-align:center;">
        <p style="color:#209ba8; font-size:12px; letter-spacing:3px; margin:0 0 6px; text-transform:uppercase;">Wait! Don't leave yet</p>
        <h3 style="color:white; margin:0; font-size:21px; font-weight:700;">Get ₹10,000 OFF Your<br>First Interior Project 🎁</h3>
      </div>
      <div style="padding:24px 28px 28px; text-align:center;">
        <p style="color:#555; font-size:14px; line-height:1.7; margin:0 0 20px;">
          Share your email and get an exclusive discount coupon + free design lookbook worth ₹5,000!
        </p>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <input type="email" id="exit_email" placeholder="Enter your email" style="
          flex:1; min-width:180px; padding:11px 15px;
          border:1.5px solid #e0e0e0; border-radius:8px;
          font-size:14px; outline:none; box-sizing:border-box;
        " onfocus="this.style.borderColor='#209ba8'" onblur="this.style.borderColor='#e0e0e0'">
          <button onclick="claimOffer()" style="
          padding:11px 20px; background:#209ba8; color:white;
          border:none; border-radius:8px; font-size:14px;
          font-weight:600; cursor:pointer; white-space:nowrap;
        ">Claim Offer</button>
        </div>
        <button onclick="closeExit()" style="
        margin-top:14px; background:none; border:none;
        color:#aaa; font-size:13px; cursor:pointer;
        text-decoration:underline;
      ">No thanks, I don't want savings</button>
      </div>
      <button onclick="closeExit()" style="
      position:absolute; top:10px; right:12px;
      background:rgba(255,255,255,0.15); border:none;
      color:white; font-size:20px; cursor:pointer;
      width:28px; height:28px; border-radius:50%;
      display:flex; align-items:center; justify-content:center;
    ">&times;</button>
    </div>
  </div>

  <!-- 4. LIVE CHAT BUBBLE -->
  <div id="chatBubble" style="
  position:fixed; bottom:100px; left:22px; z-index:9997;
">
    <!-- Chat button -->
    <div onclick="toggleChat()" style="
    width:54px; height:54px; background:#209ba8; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; box-shadow:0 6px 20px rgba(32,155,168,0.45);
    transition:all 0.3s; position:relative;
  " onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
      <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
        <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" />
      </svg>
      <!-- Notification dot -->
      <span style="
      position:absolute; top:0; right:0;
      width:14px; height:14px; background:#ff4757;
      border-radius:50%; border:2px solid white;
      font-size:8px; color:white; display:flex;
      align-items:center; justify-content:center; font-weight:700;
    ">1</span>
    </div>

    <!-- Chat panel -->
    <div id="chatPanel" style="
    display:none; position:absolute; bottom:65px; left:0;
    width:280px; background:white; border-radius:14px;
    box-shadow:0 10px 40px rgba(0,0,0,0.15);
    overflow:hidden; animation: popIn 0.3s ease;
  ">
      <!-- Header -->
      <div style="background:linear-gradient(135deg,#209ba8,#0e7a85); padding:14px 16px; display:flex; align-items:center; gap:10px;">
        <div style="width:38px; height:38px; border-radius:50%; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; font-size:18px;">👩‍💼</div>
        <div>
          <div style="color:white; font-weight:600; font-size:13px;">Luminor Support</div>
          <div style="color:rgba(255,255,255,0.8); font-size:11px;">● Online — typically replies instantly</div>
        </div>
      </div>
      <!-- Message -->
      <div style="padding:16px;">
        <div style="background:#f0fafb; border-radius:10px 10px 10px 0; padding:12px 14px; font-size:13px; color:#333; line-height:1.6; border-left:3px solid #209ba8;">
          👋 Hi there! Looking for interior design ideas? I can help you get started with a <strong>free consultation!</strong>
        </div>
        <div style="margin-top:12px; display:flex; flex-direction:column; gap:8px;">
          <a href="https://wa.me/919800000000?text=Hi%20I%20need%20design%20help" target="_blank" style="
          display:flex; align-items:center; gap:8px;
          padding:10px 14px; background:#25d366; color:white;
          border-radius:8px; text-decoration:none; font-size:13px; font-weight:600;
          transition:0.3s;
        ">
            <svg width="16" height="16" fill="white" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326z" />
            </svg>
            Chat on WhatsApp
          </a>
          <a href="contact.php" style="
          display:flex; align-items:center; gap:8px;
          padding:10px 14px; background:#f5f5f5; color:#333;
          border-radius:8px; text-decoration:none; font-size:13px; font-weight:600;
        ">
            📋 Book a Consultation
          </a>
        </div>
      </div>
    </div>
  </div>
















































  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    // WELCOME SCREEN
    window.addEventListener('load', function() {
      setTimeout(function() {
        document.getElementById('welcome-screen').classList.add('hide');
      }, 2500);
    });

    // SCROLL TO TOP
    var scrollBtn = document.getElementById('scrollTopBtn');
    window.onscroll = function() {
      if (document.documentElement.scrollTop > 300) {
        scrollBtn.style.display = 'flex';
      } else {
        scrollBtn.style.display = 'none';
      }
    };
    scrollBtn.onclick = function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    };

    // COOKIE POPUP
    window.addEventListener('load', function() {
      if (!localStorage.getItem('cookieAccepted')) {
        setTimeout(function() {
          document.getElementById('cookiePopup').style.display = 'block';
        }, 3500);
      }
    });

    function acceptCookie() {
      localStorage.setItem('cookieAccepted', 'yes');
      document.getElementById('cookiePopup').style.display = 'none';
    }

    function declineCookie() {
      document.getElementById('cookiePopup').style.display = 'none';
    }

    // COUNTER ANIMATION
    function animateCounter(element) {
      var target = parseInt(element.getAttribute('data-target'));
      var suffix = element.getAttribute('data-suffix');
      if (target === 0) return;
      var current = 0;
      var steps = 60;
      var increment = target / steps;
      var timer = setInterval(function() {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        element.textContent = Math.round(current) + suffix;
      }, 33);
    }

    var counters = document.querySelectorAll('.count-num[data-target]');
    var counterObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.5
    });
    counters.forEach(function(c) {
      counterObserver.observe(c);
    });

    // TESTIMONIAL SLIDER
    var curIdx = 0;
    var autoTimer = null;
    var allCards = document.querySelectorAll('.testi-card');
    var totalC = allCards.length;
    var trackEl = document.getElementById('testiTrack');
    var dotsEl = document.getElementById('testiDots');
    var GAP = 20;

    function visibleCards() {
      if (window.innerWidth <= 768) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    }

    function maxIdx() {
      return totalC - visibleCards();
    }

    function goTo(index) {
      if (index < 0) index = 0;
      if (index > maxIdx()) index = maxIdx();
      curIdx = index;
      var vis = visibleCards();
      var trackW = trackEl.offsetWidth;
      var totalGaps = GAP * (vis - 1);
      var oneCard = (trackW - totalGaps) / vis;
      var moveBy = curIdx * (oneCard + GAP);
      trackEl.style.transition = 'transform 0.4s ease';
      trackEl.style.transform = 'translateX(-' + moveBy + 'px)';
      updateDots();
    }

    function updateDots() {
      var dots = dotsEl.querySelectorAll('.dot');
      dots.forEach(function(d, i) {
        d.classList.toggle('active', i === curIdx);
      });
    }

    function makeDots() {
      dotsEl.innerHTML = '';
      var count = maxIdx() + 1;
      for (var i = 0; i < count; i++) {
        var d = document.createElement('button');
        d.className = 'dot';
        d.setAttribute('data-i', i);
        d.addEventListener('click', function() {
          goTo(parseInt(this.getAttribute('data-i')));
          resetTimer();
        });
        dotsEl.appendChild(d);
      }
      updateDots();
    }

    document.getElementById('prevBtn').addEventListener('click', function() {
      goTo(curIdx - 1);
      resetTimer();
    });
    document.getElementById('nextBtn').addEventListener('click', function() {
      goTo(curIdx + 1);
      resetTimer();
    });

    function startTimer() {
      autoTimer = setInterval(function() {
        var next = curIdx + 1;
        if (next > maxIdx()) next = 0;
        goTo(next);
      }, 4000);
    }

    function stopTimer() {
      clearInterval(autoTimer);
    }

    function resetTimer() {
      stopTimer();
      startTimer();
    }

    var viewport = document.querySelector('.testi-viewport');
    viewport.addEventListener('mouseenter', stopTimer);
    viewport.addEventListener('mouseleave', startTimer);

    var txStart = 0;
    viewport.addEventListener('touchstart', function(e) {
      txStart = e.changedTouches[0].clientX;
    });
    viewport.addEventListener('touchend', function(e) {
      var diff = txStart - e.changedTouches[0].clientX;
      if (diff > 50) goTo(curIdx + 1);
      else if (diff < -50) goTo(curIdx - 1);
      resetTimer();
    });

    window.addEventListener('load', function() {
      makeDots();
      goTo(0);
      startTimer();
    });
    window.addEventListener('resize', function() {
      curIdx = 0;
      makeDots();
      goTo(0);
    });

    // ---- CONSULTATION POPUP ----
    var consultShown = sessionStorage.getItem('consultShown');
    if (!consultShown) {
      setTimeout(function() {
        document.getElementById('consultPopup').style.display = 'flex';
        sessionStorage.setItem('consultShown', '1');
      }, 4000);
    }

    function closeConsult() {
      document.getElementById('consultPopup').style.display = 'none';
    }

  function submitConsult() {
  var name  = document.getElementById('cp_name').value.trim();
  var phone = document.getElementById('cp_phone').value.trim();
  var type  = document.getElementById('cp_type').value;

  if (!name || !phone) {
    alert('Please enter your name and phone number.');
    return;
  }

  // Tumhare WhatsApp pe message jayega — apna number daalo
  var yourNumber = '919800000000'; // ← APNA NUMBER DAALO (91 + number)
  var message = '🔔 *NEW LEAD — Luminor Maison*\n\n'
              + '👤 Name: ' + name + '\n'
              + '📞 Phone: ' + phone + '\n'
              + '🏠 Room: ' + (type || 'Not selected') + '\n'
              + '🕐 Time: ' + new Date().toLocaleString('en-IN');

  var waURL = 'https://wa.me/' + yourNumber + '?text=' + encodeURIComponent(message);
  window.open(waURL, '_blank');

  document.getElementById('consultPopup').style.display = 'none';
  document.getElementById('successMsg').style.display = 'flex';
}
    // ---- EXIT INTENT POPUP ----
    var exitShown = sessionStorage.getItem('exitShown');
    document.addEventListener('mouseleave', function(e) {
      if (e.clientY < 10 && !exitShown) {
        document.getElementById('exitPopup').style.display = 'flex';
        sessionStorage.setItem('exitShown', '1');
        exitShown = true;
      }
    });

    function closeExit() {
      document.getElementById('exitPopup').style.display = 'none';
    }

    function claimOffer() {
      var email = document.getElementById('exit_email').value.trim();
      if (!email || !email.includes('@')) {
        alert('Please enter a valid email address.');
        return;
      }
      document.getElementById('exitPopup').style.display = 'none';
      // Yahan aap email database mein save kar sakte ho via AJAX
      alert('🎉 Coupon code LUMINOR10K copied! Use at checkout.');
    }

    // ---- LIVE CHAT BUBBLE ----
    function toggleChat() {
      var panel = document.getElementById('chatPanel');
      var dot = document.querySelector('#chatBubble span');
      if (panel.style.display === 'none') {
        panel.style.display = 'block';
        if (dot) dot.style.display = 'none';
      } else {
        panel.style.display = 'none';
      }
    }

    // Close popups on overlay click
    document.getElementById('consultPopup').addEventListener('click', function(e) {
      if (e.target === this) closeConsult();
    });
    document.getElementById('exitPopup').addEventListener('click', function(e) {
      if (e.target === this) closeExit();
    });
    document.getElementById('successMsg').addEventListener('click', function(e) {
      if (e.target === this) closeSuccess();
    });
  </script>

</body>

</html>