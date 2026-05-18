<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxury Bedroom Designs | Luminor Maison</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    .lh {
  font-style: italic; color: #9b8241de;}

.lp {
  font-style: italic;color: #9b8241de;}

.top-header {
  min-height: 70px;          /* height ki jagah min-height */
  height: auto;              /* expand ho sake mobile mein */
  display: flex;align-items: center; flex-wrap: wrap;/* content wrap ho sake */position: sticky;top: 0;z-index: 1050;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); background: white; padding: 8px 0;}

.navbar-nav .nav-link { font-weight: 500; color: #1d99a6 !important;}

.dropdown-menu { border-radius: 6px; padding: 10px 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);}

.dropdown-item { padding: 8px 20px;font-size: 14px; color: #1d99a6;}

.dropdown-item:hover { background-color: #f1f1f1;}

/* Mobile toggle button visible karo */
.navbar-toggler {border: 2px solid #1d99a6 !important;border-radius: 6px;box-shadow: none !important; outline: none !important;}
.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231d99a6' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
}

/* Mobile mein collapse menu properly dikhao */
@media (max-width: 991.98px) {
  .navbar-collapse { background: white; border-top: 2px solid #e8f7f9;padding: 10px 0 15px; max-height: 75vh; overflow-y: auto;}
  .navbar-nav { gap: 0 !important;}
  .navbar-nav .nav-item {border-bottom: 1px solid #f0f0f0;}
  .navbar-nav .nav-link {  padding: 12px 20px !important;}
  .navbar-nav .dropdown-menu { position: static !important;box-shadow: none;  border: none;background: #f7fdfe; padding: 0;  margin: 0;}
  .navbar-nav .dropdown-item {   padding: 10px 30px; }}
    body { overflow-x:hidden; }
    .p1 { margin-top:12px; font-size:12px; font-weight:500; }
    hr { color:#1d99a6; }
    .heading { font-size:38px; font-weight:700; color:#222; padding-top:1px; }
    .p { font-size:16px; color:#555; line-height:1.7; }
    .view-btn { color:#1d99a6; }
    .trending-box { background:linear-gradient(120deg,#ffffff 0%,#f7fbfc 40%,#e6f5f7 100%); border-radius:14px; padding:35px; box-shadow:0 10px 25px rgba(0,0,0,0.08); transition:all .3s ease; }
    .trending-box:hover { transform:translateY(-5px); box-shadow:0 18px 40px rgba(0,0,0,0.12); }
    .card { border-radius:12px; overflow:hidden; transition:.3s; }
    .card:hover { transform:translateY(-6px); box-shadow:0 15px 30px rgba(0,0,0,0.12); }
   .trend-card img{ width:100%; height:220px; object-fit:contain;background:#f8f8f8;}
  .bedroom-feature { background:linear-gradient(120deg,#ffffff,#f5f9fa,#e6f5f7); padding:50px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.08); }
    .feature-img { overflow:hidden; border-radius:12px; }
    .feature-img img { transition:0.5s; }
    .feature-img:hover img { transform:scale(1.07); }
    .feature-title { font-size:34px; font-weight:700; margin-bottom:15px; color:#222; }
    .feature-text { color:#555; line-height:1.7; margin-bottom:25px; }
    .feature-points { margin-bottom:25px; }
    .point { display:flex; align-items:center; margin-bottom:12px; }
    .point i { color:#1d99a6; margin-right:10px; }
    .feature-btn { background:#1d99a6; color:white; padding:10px 22px; border-radius:30px; transition:0.3s; }
    .feature-btn:hover { background:#167a85; transform:translateY(-3px); }
    .cards-section { padding:40px 0; }
    .design-card { border:none; border-radius:12px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08); transition:0.3s; }
    .design-card:hover { transform:translateY(-5px); }
    .design-card img { height:220px; width:100%; object-fit:cover; }
    .card-body h6 { font-weight:600; font-size:15px; }
    .size-text { font-size:13px; color:gray; }
    .btn-book { border:1px solid #167a85; color:#167a85; font-size:13px; }
    .btn-quote { background:#167a85; color:white; font-size:13px; }
    .highlight-card { background:#f9f9f9; border-radius:12px; padding:25px; height:100%; box-shadow:0 4px 10px rgba(0,0,0,0.05); }
    .highlight-card h4 { font-weight:700; margin-bottom:15px; }
    .highlight-card ul { padding-left:18px; }
    .highlight-card li { margin-bottom:8px; font-size:14px; }
    .bedroom-card { border:none; border-radius:12px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08); transition:0.3s; }
    .bedroom-card:hover { transform:translateY(-5px); }
    .bedroom-card img { height:220px; width:100%; object-fit:cover; }
    .special-card { background:#f9f9f9; border-radius:12px; padding:25px; height:100%; box-shadow:0 4px 10px rgba(0,0,0,0.05); }
    .special-card h4 { font-weight:700; margin-bottom:15px; }
    .special-card ul { padding-left:18px; }
    .special-card li { margin-bottom:8px; font-size:14px; }
    .breadcrumb-bar { background:#f8f8f8; border-bottom:1px solid #eee; padding:10px 0; font-size:13px; color:#888; }
    .breadcrumb-bar a { color:#1d99a6; text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }
    .breadcrumb-bar span { margin:0 6px; color:#bbb; }
    .bedroom-hero { background:linear-gradient(135deg,#0e0e0e 0%,#1a1a2e 100%); padding:50px 0 40px; }
    .bedroom-hero .p1 { color:#1d99a6; font-size:13px; letter-spacing:2px; text-transform:uppercase; }
    .bedroom-hero .heading { color:white; }
    .bedroom-hero .p { color:#bbb; font-size:15px; }
    .bedroom-hero hr { border-color:#1d99a6; opacity:0.4; }
    .bedroom-hero .read-btn { display:inline-block; padding:10px 25px; border:1px solid #1d99a6; color:#1d99a6; border-radius:22px; font-size:13px; text-decoration:none; transition:0.3s; cursor:pointer; background:transparent; }
    .bedroom-hero .read-btn:hover { background:#1d99a6; color:white; }
    .hero-stats { display:flex; gap:30px; margin-top:25px; flex-wrap:wrap; }
    .hero-stat-item h4 { color:#1d99a6; font-size:24px; font-weight:800; margin:0; }
    .hero-stat-item p { color:#aaa; font-size:11px; margin:0; letter-spacing:1px; }
    .card-img-wrap { position:relative; }
    .wish-btn { position:absolute; top:10px; right:10px; width:34px; height:34px; background:white; border:none; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:10; box-shadow:0 2px 8px rgba(0,0,0,0.15); transition:0.3s; font-size:15px; color:#ccc; }
    .wish-btn:hover { transform:scale(1.1); }
    .wish-btn.wished { color:red; }
    .badge-new { position:absolute; top:10px; left:10px; background:#1d99a6; color:white; font-size:11px; padding:4px 10px; border-radius:20px; z-index:10; font-weight:600; letter-spacing:1px; }
    .badge-popular { position:absolute; top:10px; left:10px; background:#e67e22; color:white; font-size:11px; padding:4px 10px; border-radius:20px; z-index:10; font-weight:600; }
    #toast { position:fixed; bottom:85px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #1d99a6; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }
    #scrollTopBtn { position:fixed; bottom:30px; right:25px; width:45px; height:45px; background:#1d99a6; color:white; border:none; border-radius:50%; font-size:18px; cursor:pointer; display:none; align-items:center; justify-content:center; z-index:999; box-shadow:0 4px 15px rgba(29,153,166,0.4); transition:0.3s; }
    #scrollTopBtn:hover { background:black; transform:translateY(-3px); }
    #lightbox { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.88); z-index:9999; align-items:center; justify-content:center; flex-direction:column; }
    #lightbox.show { display:flex; }
    #lightbox img { max-width:85vw; max-height:80vh; border-radius:10px; box-shadow:0 10px 40px rgba(0,0,0,0.5); }
    #lightbox-close { position:absolute; top:20px; right:30px; color:white; font-size:32px; cursor:pointer; background:none; border:none; line-height:1; }
    #lightbox p { color:#ccc; margin-top:15px; font-size:14px; }
    .design-card img, .bedroom-card img, .card img { cursor:zoom-in; }
    .footer-dark { background:#0e0e0e; color:#ccc; padding:50px 25px 20px; font-family:Arial,sans-serif; margin-top:7%; }
    .footer-wrapper { display:grid; grid-template-columns:repeat(5,1fr); gap:30px; }
    .footer-box { min-width:0; }
    .footer-box h4 { color:#fff; font-size:18px; margin-bottom:15px; }
    .footer-box ul { list-style:none; padding:0; margin:0; }
    .footer-box ul li { margin-bottom:10px; font-size:14px; }
    .footer-box ul li a { color:#aaa; text-decoration:none; transition:0.3s; }
    .footer-box ul li a:hover { color:#1d99a6; }
    .footer-box p { font-size:14px; margin-bottom:10px; }
    .social-icons { margin-top:15px; }
    .social-icons a { display:inline-flex; width:36px; height:36px; background:#1c1c1c; color:#fff; align-items:center; justify-content:center; border-radius:50%; margin-right:8px; transition:0.3s; font-size:14px; }
    .social-icons a:hover { background:#1d99a6; color:#000; transform:translateY(-3px); }
    .footer-bottom { text-align:center; margin-top:35px; font-size:13px; color:#1d99a6; border-top:1px solid #1d99a6; padding-top:15px; }
    @media (max-width:992px) { .footer-wrapper { grid-template-columns:repeat(2,1fr); } }
    @media (max-width:576px)  { .footer-wrapper { grid-template-columns:repeat(2,1fr); } }

   /* WhatsApp Float */
#floatingWhatsapp {
  position:fixed; bottom:80px; right:22px;
  width:54px; height:54px; background:#25d366;
  border-radius:50%; display:flex; align-items:center;
  justify-content:center; z-index:999;
  box-shadow:0 4px 15px rgba(37,211,102,0.5);
  transition:0.3s; text-decoration:none;
}
#floatingWhatsapp:hover { transform:scale(1.12); }
#floatingWhatsapp::before {
  content:''; position:absolute;
  width:54px; height:54px;
  background:rgba(37,211,102,0.35);
  border-radius:50%;
  animation:waRing 2s ease-out infinite;
}
@keyframes waRing {
  0%   { transform:scale(1); opacity:0.8; }
  100% { transform:scale(1.9); opacity:0; }
}

/* Sticky Bottom Bar */
#stickyBar {
  display:none;
  position:fixed; bottom:0; left:0; right:0;
  background:white; border-top:2px solid #1d99a6;
  z-index:998; padding:10px 0;
  justify-content:space-around; align-items:center;
  box-shadow:0 -3px 15px rgba(0,0,0,0.1);
}
#stickyBar a {
  flex:1; text-align:center; font-size:13px;
  font-weight:600; color:#1d99a6;
  text-decoration:none; padding:6px 4px;
  border-right:1px solid #e0e0e0;
}
#stickyBar a:last-child { border-right:none; }
#stickyBar a:hover { background:#f0fafb; }
@media (max-width:768px) { #stickyBar { display:flex; } }

/* Popup overlay */
#bdPopupOverlay {
  display:none; position:fixed; inset:0;
  background:rgba(0,0,0,0.55); z-index:9999;
  align-items:center; justify-content:center;
  backdrop-filter:blur(4px);
}
#bdPopup {
  background:white; border-radius:16px;
  max-width:460px; width:92%; overflow:hidden;
  box-shadow:0 25px 60px rgba(0,0,0,0.3);
  animation:popSlide 0.5s cubic-bezier(0.175,0.885,0.32,1.275);
  position:relative;
}
@keyframes popSlide {
  from { opacity:0; transform:scale(0.85) translateY(25px); }
  to   { opacity:1; transform:scale(1) translateY(0); }
}
#bdClose {
  position:absolute; top:10px; right:12px;
  background:rgba(255,255,255,0.2); border:none;
  color:white; font-size:18px; cursor:pointer;
  width:28px; height:28px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
}
#bdPopupTop {
  background:linear-gradient(135deg,#1d99a6,#0e7a85);
  padding:28px 28px 22px; text-align:center; color:white;
}
#bdPopupTop h3 { margin:8px 0 6px; font-size:20px; font-weight:700; }
#bdPopupTop p  { margin:0; font-size:13px; opacity:0.9; }
#bdPopupBody   { padding:22px 26px 26px; }
.bd-input {
  width:100%; padding:11px 14px; margin-bottom:12px;
  border:1.5px solid #e0e0e0; border-radius:8px;
  font-size:14px; outline:none; box-sizing:border-box;
  transition:0.3s; background:white; color:#333;
}
.bd-input:focus { border-color:#1d99a6; }
#bdPopupBody button {
  width:100%; padding:13px;
  background:linear-gradient(135deg,#1d99a6,#0e7a85);
  color:white; border:none; border-radius:8px;
  font-size:15px; font-weight:600; cursor:pointer;
  transition:0.3s; letter-spacing:0.4px;
}
#bdPopupBody button:hover { opacity:0.88; }
.bd-note { text-align:center; font-size:12px; color:#aaa; margin:10px 0 0; }

/* Success popup */
#bdSuccess {
  display:none; position:fixed; inset:0;
  background:rgba(0,0,0,0.55); z-index:10000;
  align-items:center; justify-content:center;
  backdrop-filter:blur(4px);
}
#bdSuccessBox {
  background:white; border-radius:16px;
  max-width:360px; width:90%; padding:38px 28px;
  text-align:center;
  box-shadow:0 25px 60px rgba(0,0,0,0.3);
  animation:popSlide 0.4s ease;
}
#bdSuccessBox h3 { color:#1d99a6; margin:10px 0 8px; font-size:22px; }
#bdSuccessBox p  { color:#555; font-size:14px; line-height:1.7; }
#bdSuccessBox button {
  margin-top:18px; padding:11px 28px;
  background:#1d99a6; color:white;
  border:none; border-radius:8px;
  font-size:14px; font-weight:600; cursor:pointer;
}

/* Live visitor badge */
#visitorBadge {
  position:fixed; bottom:90px; left:18px;
  background:white; border-radius:25px;
  padding:8px 16px; font-size:13px; color:#333;
  box-shadow:0 4px 20px rgba(0,0,0,0.12);
  z-index:997; display:flex; align-items:center;
  gap:8px; border-left:3px solid #1d99a6;
  animation:badgeFadeIn 0.6s ease 2s both;
}
@keyframes badgeFadeIn {
  from { opacity:0; transform:translateX(-20px); }
  to   { opacity:1; transform:translateX(0); }
}
#visitorDot {
  width:9px; height:9px; background:#25d366;
  border-radius:50%; display:inline-block;
  animation:pulse 1.5s infinite;
}
@keyframes pulse {
  0%,100% { opacity:1; }50%      { opacity:0.3; }
}









  </style>
</head>
<body>

<?php
// ── DB se saara bedroom data ek baar fetch karo ──────────────────────────
$all = [];
$res = mysqli_query($conn, "SELECT * FROM site_images WHERE page='bedroom' ORDER BY sort_order");
while ($row = mysqli_fetch_assoc($res)) {
    $all[$row['section']][] = $row;
}

// Helper: badge HTML
function badgeHtml($badge) {
    if ($badge === 'new')     return '<span class="badge-new">✨ New</span>';
    if ($badge === 'popular') return '<span class="badge-popular">🔥 Popular</span>';
    return '';
}

// Helper function mein ye line badlo
function designCard($r, $cardClass = 'design-card', $sizeClass = 'size-text') {
    $img        = ADMIN_IMG . htmlspecialchars($r['image']);
    $filename   = htmlspecialchars($r['image']);          // ✅ sirf filename DB mein
    $title      = htmlspecialchars($r['title']);
    $size       = htmlspecialchars($r['description']);
    $badge      = badgeHtml($r['badge']);
    $quote      = htmlspecialchars($title . ' – Contact us for pricing');
    return "
    <div class='card {$cardClass}'>
      <div class='card-img-wrap'>
        {$badge}
        <button class='wish-btn'
                data-name='{$title}'
                data-image='{$filename}'
                data-category='bedroom'
                onclick='toggleWish(this)'>
          <i class='fa-solid fa-heart'></i>
        </button>
        <img src='{$img}'
             onclick=\"openLight(this.src, '{$title}')\"
             onerror=\"this.src='https://placehold.co/400x220?text=No+Image'\">
      </div>
      <div class='card-body'>
        <h6>{$title}</h6>
        <p class='{$sizeClass}'>Size: {$size}</p>
        <a href='contact.php'><button class='btn btn-book btn-sm'>Book Consultation</button></a>
        <button class='btn btn-quote btn-sm quote-btn' data-quote='{$quote}'>Get Quote</button>
      </div>
    </div>";
}
?>

<div class="top-line"></div>

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
                  <a class="nav-link dropdown-toggle" href="furniture.php" data-bs-toggle="dropdown">Offering</a>
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
                  <a href="https://wa.me/919800000000" target="_blank" title="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="40px" fill="green" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                    </svg>
                  </a>
                </li>
                <?php if (isset($_SESSION['user_name'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="wishlist.php"><i class="fa-regular fa-heart"></i> Wishlist</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                      <i class="fa-regular fa-user"></i> <?= $_SESSION['user_name'] ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="user_logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
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

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
  <div class="container">
    <a href="Mainpg.php">Home</a><span>›</span>
    <a href="Mainpg.php">Design Gallery</a><span>›</span>
    Bedroom Designs
  </div>
</div>

<!-- HERO -->
<div class="bedroom-hero">
  <div class="container">
    <p class="p1"><i class="fa-solid fa-moon"></i> &nbsp; Premium Collection 2026</p>
    <hr>
    <h2 class="heading">Luxury Bedroom Designs</h2>
    <p class="p">Crafted for comfort and elegance, our bedroom interiors blend soothing aesthetics with smart functionality.<br>
      Modern detailing comes together to create a relaxing space that reflects your unique style.</p>
    <button class="read-btn" onclick="scrollToDesigns()">Explore Designs ↓</button>
    <div class="hero-stats">
      <div class="hero-stat-item"><h4>300+</h4><p>BEDROOM DESIGNS</p></div>
      <div class="hero-stat-item"><h4>5 YRS</h4><p>WARRANTY</p></div>
      <div class="hero-stat-item"><h4>FREE</h4><p>CONSULTATION</p></div>
      <div class="hero-stat-item"><h4>50</h4><p>DAYS DELIVERY</p></div>
    </div>
  </div>
</div>

<!-- TRENDING SECTION -->
<div class="container inner my-5" id="designs-start">
  <div class="trending-box">
    <h3 class="fw-bold mb-1">Top Trending Bedroom Designs</h3>
    <p class="text-muted mb-4">Design ideas chosen by homeowners in 2026</p>
    <div class="row g-4">
      <?php
      $trending = $all['trending'] ?? [];
      if (empty($trending)):
      ?>
        <p class="text-muted">No trending designs added yet.</p>
      <?php else:
        foreach ($trending as $r):
      ?>
        <div class="col-lg-4 col-md-6 col-12">
          <?= designCard($r, 'trend-card border-0 shadow-sm', 'size-text') ?>
        </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</div>


<!-- FEATURE SECTION -->

<?php $feature = $all['feature'][0] ?? null; ?>

<section class="bedroom-feature container my-5">
  <div class="row align-items-center g-5">
    <div class="col-lg-6">
      <div class="feature-img">
        <?php if ($feature): ?>
          <img src="<?= ADMIN_IMG . htmlspecialchars($feature['image']) ?>"
               class="img-fluid"
               onerror="this.src='https://placehold.co/600x400?text=No+Image'">
        <?php else: ?>
          <img src="<?= IMG_URL ?>bedroom.jpg" class="img-fluid">
        <?php endif; ?>
      </div>
    </div>
    <div class="col-lg-6">
      <h2 class="feature-title">Create Your Dream Bedroom</h2>
      <p class="feature-text">A thoughtfully designed bedroom is more than just a place to sleep. It is a personal sanctuary where comfort meets style. Our bedroom designs combine elegant finishes, smart storage solutions and modern aesthetics.</p>
      <div class="feature-points">
        <div class="point"><i class="fa-solid fa-bed"></i><span>Premium Bed & Furniture Layout</span></div>
        <div class="point"><i class="fa-solid fa-lightbulb"></i><span>Modern Lighting & Ceiling Design</span></div>
        <div class="point"><i class="fa-solid fa-warehouse"></i><span>Smart Wardrobe & Storage</span></div>
      </div>
      <a href="Bedroom.php"><button class="btn feature-btn">Explore Bedroom Designs</button></a>
    </div>
  </div>
</section>

<!-- SECTION 1 CARDS -->
<div class="container cards-section">
  <div class="row g-4">
    <?php
    $sec1 = $all['section1'] ?? [];
    $mid  = ceil(count($sec1) / 2); // highlight card beech mein
    $i    = 0;
    foreach ($sec1 as $r):
      if ($i === $mid):
    ?>
      <div class="col-lg-4 col-md-6">
        <div class="highlight-card">
          <h4>Why Choose Our Bedroom Designs</h4>
          <p>We create stylish and comfortable bedroom interiors designed for modern homes.</p>
          <ul>
            <li>Premium quality materials</li>
            <li>Smart storage solutions</li>
            <li>Custom bedroom layouts</li>
            <li>Modern aesthetic finish</li>
          </ul>
          <button class="btn btn-quote w-100">Get Free Quote</button>
        </div>
      </div>
    <?php endif; ?>
      <div class="col-lg-4 col-md-6">
        <?= designCard($r, 'design-card', 'size-text') ?>
      </div>
    <?php $i++; endforeach;
    if (empty($sec1)): ?>
      <p class="text-muted">No section 1 designs added yet.</p>
    <?php endif; ?>
  </div>
</div>

<!-- SECTION 2 CARDS -->
<div class="container my-5">
  <div class="row g-4">
    <?php
    $sec2 = $all['section2'] ?? [];
    $mid2 = ceil(count($sec2) / 2);
    $j    = 0;
    foreach ($sec2 as $r):
      if ($j === $mid2):
    ?>
      <div class="col-lg-4 col-md-6">
        <div class="special-card">
          <h4>Our Design Commitment</h4>
          <p>Every bedroom is designed with attention to comfort, style and smart space planning.</p>
          <ul>
            <li>Premium interior materials</li>
            <li>Modern bedroom concepts</li>
            <li>Space saving storage</li>
            <li>Elegant lighting solutions</li>
          </ul>
          <button class="btn btn-quote w-100">Get Free Design Quote</button>
        </div>
      </div>
    <?php endif; ?>
      <div class="col-lg-4 col-md-6">
        <?= designCard($r, 'bedroom-card', 'size') ?>
      </div>
    <?php $j++; endforeach;
    if (empty($sec2)): ?>
      <p class="text-muted">No section 2 designs added yet.</p>
    <?php endif; ?>
  </div>
</div>

<!-- QUOTE MODAL -->
<div class="modal fade" id="quoteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bedroom Design Quote</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p id="quoteText" style="font-size:18px;font-weight:500;"></p>
        <p class="text-muted">Our designer will contact you for exact quotation.</p>
        <a href="contact.php" class="btn btn-quote w-100">Get Free Consultation</a>
      </div>
    </div>
  </div>
</div>

<!-- LIGHTBOX -->
<div id="lightbox">
  <button id="lightbox-close" onclick="closeLight()">&#x2715;</button>
  <img id="lightbox-img" src="">
  <p id="lightbox-caption"></p>
</div>

<!-- 1. FLOATING WHATSAPP (bottom right) -->
<a id="floatingWhatsapp" href="https://wa.me/919800000000?text=Hi%20I%20am%20interested%20in%20Bedroom%20Design" target="_blank">
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 16 16">
    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
  </svg>
</a>

<!-- 2. STICKY BOTTOM CTA BAR (mobile pe) -->
<div id="stickyBar">
  <a href="tel:+919800000000">📞 Call Now</a>
  <a href="https://wa.me/919800000000?text=Hi%20Bedroom%20Design%20Chahiye" target="_blank">💬 WhatsApp</a>
  <a href="contact.php">🗓️ Book Free Visit</a>
</div>

<!-- 3. DESIGN CONSULTATION POPUP (5 sec baad) -->
<div id="bdPopupOverlay">
  <div id="bdPopup">
    <button id="bdClose" onclick="closeBdPopup()">✕</button>
    <div id="bdPopupTop">
      <div style="font-size:32px;">🛏️</div>
      <h3>Get Your Bedroom Designed FREE!</h3>
      <p>Book a free 30-min consultation with our bedroom design expert today.</p>
    </div>
    <div id="bdPopupBody">
      <input type="text"  id="bd_name"  placeholder="👤 Your Name"   class="bd-input">
      <input type="tel"   id="bd_phone" placeholder="📞 Phone Number" class="bd-input">
      <select id="bd_size" class="bd-input">
        <option value="">🏠 Select Bedroom Size</option>
        <option>Small (10×10)</option>
        <option>Medium (12×12)</option>
        <option>Large (14×14)</option>
        <option>Master Bedroom</option>
        <option>Kids Bedroom</option>
      </select>
      <button onclick="submitBdConsult()">Book Free Consultation →</button>
      <p class="bd-note">🔒 100% Free. No spam. No obligation.</p>
    </div>
  </div>
</div>

<!-- 4. SUCCESS POPUP -->
<div id="bdSuccess">
  <div id="bdSuccessBox">
    <div style="font-size:52px;">🎉</div>
    <h3>Consultation Booked!</h3>
    <p>Our bedroom design expert will call you within <strong>24 hours</strong>.</p>
    <button onclick="closeBdSuccess()">Great, Thanks! 👍</button>
  </div>
</div>

<!-- 5. LIVE VISITOR COUNTER (fake real-time — real sites pe hota hai) -->
<div id="visitorBadge">
  <span id="visitorDot"></span>
  <span id="visitorText">👁️ <strong id="visitorNum">24</strong> people viewing this page</span>
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



<button id="scrollTopBtn"><i class="fa-solid fa-arrow-up"></i></button>
<div id="toast">❤️ Added to Wishlist!</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function bookConsult() { window.location.href = "contact.php"; }

  document.querySelectorAll(".quote-btn").forEach(function(btn) {
    btn.addEventListener("click", function() {
      document.getElementById("quoteText").innerText = this.getAttribute("data-quote");
      new bootstrap.Modal(document.getElementById('quoteModal')).show();
    });
  });

  var scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
  };
  scrollBtn.onclick = function() { window.scrollTo({ top: 0, behavior: 'smooth' }); };

  function scrollToDesigns() {
    document.getElementById('designs-start').scrollIntoView({ behavior: 'smooth' });
  }

  function toggleWish(btn) {
    var name  = btn.getAttribute('data-name');
    var image = btn.getAttribute('data-image');
    var toast = document.getElementById('toast');
    btn.disabled = true;
    var fd = new FormData();
    fd.append('product_name', name);
    fd.append('product_image', image);
    fd.append('category', 'bedroom');
    fetch('wishlist_toggle.php', { method: 'POST', body: fd })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        if (data.status === 'added')          { btn.classList.add('wished');    toast.textContent = '❤️ Added to Wishlist!'; }
        else if (data.status === 'removed')   { btn.classList.remove('wished'); toast.textContent = '🤍 Removed from Wishlist'; }
        else if (data.status === 'login_required') { window.location.href = 'user_login.php'; return; }
        toast.classList.add('show');
        setTimeout(function() { toast.classList.remove('show'); }, 2000);
      })
      .catch(function() {
        btn.disabled = false;
        toast.textContent = '⚠️ Something went wrong!';
        toast.classList.add('show');
        setTimeout(function() { toast.classList.remove('show'); }, 2000);
      });
  }

  function openLight(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    document.getElementById('lightbox').classList.add('show');
    document.body.style.overflow = 'hidden';
  }
  function closeLight() {
    document.getElementById('lightbox').classList.remove('show');
    document.body.style.overflow = '';
  }
  document.getElementById('lightbox').addEventListener('click', function(e) { if (e.target === this) closeLight(); });
  document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeLight(); });

  // --- POPUP auto show ---
var bdShown = sessionStorage.getItem('bdPopupShown');
if (!bdShown) {
  setTimeout(function() {
    document.getElementById('bdPopupOverlay').style.display = 'flex';
    sessionStorage.setItem('bdPopupShown', '1');
  }, 5000);
}

function closeBdPopup() {
  document.getElementById('bdPopupOverlay').style.display = 'none';
}

function submitBdConsult() {
  var name  = document.getElementById('bd_name').value.trim();
  var phone = document.getElementById('bd_phone').value.trim();
  var size  = document.getElementById('bd_size').value;
  if (!name || !phone) { alert('Please enter name and phone.'); return; }

  // Tumhare WhatsApp pe seedha message aayega
  var yourNumber = '917805800367'; // ← APNA NUMBER
  var msg = '🛏️ *New Bedroom Lead — Luminor Maison*\n\n'
          + '👤 Name: ' + name + '\n'
          + '📞 Phone: ' + phone + '\n'
          + '📐 Size: ' + (size || 'Not selected') + '\n'
          + '🕐 Time: ' + new Date().toLocaleString('en-IN');
  window.open('https://wa.me/' + yourNumber + '?text=' + encodeURIComponent(msg), '_blank');

  closeBdPopup();
  document.getElementById('bdSuccess').style.display = 'flex';
}

function closeBdSuccess() {
  document.getElementById('bdSuccess').style.display = 'none';
}

// Overlay click se close
document.getElementById('bdPopupOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeBdPopup();
});
document.getElementById('bdSuccess').addEventListener('click', function(e) {
  if (e.target === this) closeBdSuccess();
});

// --- LIVE VISITOR COUNTER ---
var baseCount = Math.floor(Math.random() * 15) + 18; // 18-32
document.getElementById('visitorNum').textContent = baseCount;
setInterval(function() {
  var change = Math.random() > 0.5 ? 1 : -1;
  baseCount = Math.max(12, Math.min(45, baseCount + change));
  document.getElementById('visitorNum').textContent = baseCount;
}, 4000);








</script>
</body>
</html>