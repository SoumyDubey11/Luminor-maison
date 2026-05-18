<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<?php
// Saara kitchen data ek baar fetch karo
$kitchenData = [];
$res = mysqli_query($conn, "SELECT * FROM site_images WHERE page='kitchen' ORDER BY sort_order ASC");
while ($row = mysqli_fetch_assoc($res)) {
    $kitchenData[$row['section']][] = $row;
}

// Badge HTML helper
function kitchenBadge($badge) {
    if ($badge === 'new')     return '<span class="badge-new">✨ New</span>';
    if ($badge === 'popular') return '<span class="badge-popular">🔥 Popular</span>';
    return '';
}

// Single slider card HTML
function kitchenCard($r) {
    $img      = ADMIN_IMG . htmlspecialchars($r['image']);
    $filename = htmlspecialchars($r['image']);
    $title    = htmlspecialchars($r['title']);
    $subtitle = htmlspecialchars($r['description']);
    $badge    = kitchenBadge($r['badge']);
    return "
    <div class='card'>
      <div class='img-box'>
        {$badge}
        <button class='wish-btn'
                data-name='{$title}'
                data-image='{$filename}'
                data-category='kitchen'
                onclick='toggleWish(this)'>
          <i class='fa-solid fa-heart'></i>
        </button>
        <img src='{$img}'
             class='img-normal'
             onerror=\"this.src='https://placehold.co/280x190?text=No+Image'\">
      </div>
      <div class='card-body'>
        <h3 class='price'>{$title}</h3>
        <h4>{$subtitle}</h4>
        <p class='location'><i class='fa-solid fa-kitchen-set'></i> Modular Kitchen</p>
        <div class='info'>
          <span><i class='fa-solid fa-box-open'></i> Smart Storage</span>
          <span><i class='fa-solid fa-lightbulb'></i> LED Lighting</span>
        </div>
      </div>
    </div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modular Kitchen Designs | Luminor Maison</title>
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
    .p1 { margin-top:12px; font-size:12px; font-weight:500; color:#209ba8; }
    hr { color:#1d99a6; }
    .heading { font-size:38px; font-weight:700; color:#222; }
    .p { font-size:16px; color:#555; line-height:1.7; }
    .view-btn { display:inline-block; margin-top:3px; padding:9px 20px; border:1px solid #209ba8; color:white; background-color:#209ba8; text-decoration:none; font-size:11px; letter-spacing:1px; border-radius:22px; transition:0.3s; }
    .view-btn:hover { background-color:#000; color:white; }

    /* CARD */
    .card { width:280px; min-width:280px; background:#fff; border-radius:15px; overflow:hidden; box-shadow:0 8px 20px rgba(0,0,0,0.15); transition:0.3s; flex-shrink:0; border:none; }
    .card:hover { transform:translateY(-5px); }
    .img-box { position:relative; width:100%; height:190px; overflow:hidden; }
    .img-box img { width:100%; height:100%; object-fit:cover; transition:0.4s; }
    .card-body { padding:15px; }
    .price { color:#209ba8; margin:0; font-size:16px; font-weight:600; }
    .location { color:#666; font-size:14px; margin:4px 0; }
    .info { display:flex; justify-content:space-between; font-size:13px; margin-top:10px; color:#444; }

    /* SECTION */
    .section-header { margin:40px 0 25px; }
    .section-header h2 { font-size:28px; font-weight:600; text-align:center; }
    .underline { width:60px; height:4px; background:#209ba8; margin:8px auto 0; border-radius:5px; }

    /* SLIDER */
    .slider-wrapper { width:100%; max-width:1300px; margin:auto; overflow:hidden; }
    .slider-track { display:flex; gap:20px; overflow-x:auto; scroll-behavior:smooth; cursor:grab; padding-bottom:8px; }
    .slider-track::-webkit-scrollbar { display:none; }
    .slider-track:active { cursor:grabbing; }

    /* BADGE */
    .badge-new { position:absolute; top:10px; left:10px; background:#209ba8; color:white; font-size:11px; padding:4px 10px; border-radius:20px; z-index:10; font-weight:600; }
    .badge-popular { position:absolute; top:10px; left:10px; background:#e67e22; color:white; font-size:11px; padding:4px 10px; border-radius:20px; z-index:10; font-weight:600; }

    /* WISHLIST BTN */
    .wish-btn { position:absolute; top:10px; right:10px; width:34px; height:34px; background:white; border:none; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:10; box-shadow:0 2px 8px rgba(0,0,0,0.15); transition:0.3s; font-size:16px; color:#ccc; }
    .wish-btn:hover { transform:scale(1.1); }
    .wish-btn.wished { color:red; }

    /* BREADCRUMB */
    .breadcrumb-bar { background:#f8f8f8; border-bottom:1px solid #eee; padding:10px 0; font-size:13px; color:#888; }
    .breadcrumb-bar a { color:#209ba8; text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }
    .breadcrumb-bar span { margin:0 6px; color:#bbb; }

    /* HERO */
    .kitchen-hero { background:linear-gradient(135deg,#0e0e0e 0%,#1a3a3c 100%); padding:50px 0 40px; }
    .kitchen-hero .p1 { color:#209ba8; font-size:13px; letter-spacing:2px; text-transform:uppercase; }
    .kitchen-hero .heading { color:white; font-size:40px; }
    .kitchen-hero .p { color:#ccc; font-size:15px; }
    .kitchen-hero hr { border-color:#209ba8; opacity:0.4; }
    .hero-stats { display:flex; gap:30px; margin-top:30px; flex-wrap:wrap; }
    .hero-stat-item h4 { color:#209ba8; font-size:26px; font-weight:800; margin:0; }
    .hero-stat-item p { color:#aaa; font-size:12px; margin:0; letter-spacing:1px; }

    /* FILTER TABS */
    .filter-tabs { display:flex; gap:10px; flex-wrap:wrap; margin:20px 0 5px; }
    .filter-tab { padding:7px 18px; border:1px solid #209ba8; color:#209ba8; background:transparent; border-radius:25px; font-size:13px; cursor:pointer; transition:0.3s; }
    .filter-tab:hover, .filter-tab.active { background:#209ba8; color:white; }

    /* EMPTY STATE */
    .empty-slider { text-align:center; padding:40px 20px; color:#888; font-size:14px; width:100%; }

    /* TOAST */
    #toast { position:fixed; bottom:90px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #209ba8; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }

    /* SCROLL TOP */
    #scrollTopBtn { position:fixed; bottom:30px; right:25px; width:45px; height:45px; background:#209ba8; color:white; border:none; border-radius:50%; font-size:18px; cursor:pointer; display:none; align-items:center; justify-content:center; z-index:999; box-shadow:0 4px 15px rgba(32,155,168,0.4); transition:0.3s; }
    #scrollTopBtn:hover { background:black; transform:translateY(-3px); }

    /* FOOTER */
    .footer-dark { background:#0e0e0e; color:#ccc; padding:50px 25px 20px; margin-top:7%; }
    .footer-wrapper { display:grid; grid-template-columns:repeat(5,1fr); gap:30px; }
    .footer-box h4 { color:#fff; font-size:18px; margin-bottom:15px; }
    .footer-box ul { list-style:none; padding:0; margin:0; }
    .footer-box ul li { margin-bottom:10px; font-size:14px; }
    .footer-box ul li a { color:#aaa; text-decoration:none; transition:0.3s; }
    .footer-box ul li a:hover { color:#1d99a6; }
    .footer-box p { font-size:14px; margin-bottom:10px; }
    .social-icons a { display:inline-flex; width:36px; height:36px; background:#1c1c1c; color:#fff; align-items:center; justify-content:center; border-radius:50%; margin-right:8px; transition:0.3s; font-size:14px; margin-top:10px; }
    .social-icons a:hover { background:#1d99a6; color:#000; transform:translateY(-3px); }
    .footer-bottom { text-align:center; margin-top:35px; font-size:13px; color:#1d99a6; border-top:1px solid #1d99a6; padding-top:15px; }

    @media (max-width:768px) {
      .slider-track { scroll-snap-type:x mandatory; padding-left:16px; padding-right:40px; }
      .card { min-width:82vw; max-width:82vw; scroll-snap-align:start; }
      .img-box { height:220px; }
      .section-header h2 { font-size:22px; }
      .kitchen-hero .heading { font-size:28px; }
    }
    @media (max-width:992px) { .footer-wrapper { grid-template-columns:repeat(2,1fr); } }
    @media (max-width:576px)  { .footer-wrapper { grid-template-columns:repeat(2,1fr); } }
  </style>
</head>
<body>

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
                    <a href="user_login.php" class="btn btn-sm" style="background:#209ba8;color:white;border-radius:8px;">
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
    <a href="index.php">Home</a><span>›</span>
    <a href="Mainpg.php">Design Gallery</a><span>›</span>
    Modular Kitchen
  </div>
</div>

<!-- HERO -->
<div class="kitchen-hero">
  <div class="container">
    <p class="p1"><i class="fa-solid fa-star"></i> &nbsp; Premium Collection</p>
    <hr>
    <h2 class="heading">Modular Kitchen Designs</h2>
    <p class="p">Combining premium finishes with seamless efficiency. Thoughtfully curated layouts, superior materials<br>
      and modern detailing come together to create a kitchen that is as beautiful as it is practical.</p>
    <a href="Designtips.php" class="view-btn">View More Designs</a>
    <div class="hero-stats">
      <div class="hero-stat-item"><h4>500+</h4><p>KITCHEN DESIGNS</p></div>
      <div class="hero-stat-item"><h4>5 YRS</h4><p>WARRANTY</p></div>
      <div class="hero-stat-item"><h4>50</h4><p>DAYS COMPLETION</p></div>
      <div class="hero-stat-item"><h4>FREE</h4><p>CONSULTATION</p></div>
    </div>
  </div>
</div>

<!-- FILTER TABS -->
<div class="container" style="margin-top:30px;">
  <div class="filter-tabs">
    <button class="filter-tab active" onclick="filterTab(this,'all')">All Styles</button>
    <button class="filter-tab" onclick="filterTab(this,'l-shape')">L-Shape</button>
    <button class="filter-tab" onclick="filterTab(this,'parallel')">Parallel</button>
    <button class="filter-tab" onclick="filterTab(this,'island')">Island</button>
    <button class="filter-tab" onclick="filterTab(this,'straight')">Straight</button>
    <button class="filter-tab" onclick="filterTab(this,'u-shape')">U-Shape</button>
  </div>
</div>

<?php
// 4 slider rows define karo — title aur section key
$sliderRows = [
    'slider1' => 'Modern Modular Kitchen Designs',
    'slider2' => 'Luxury Kitchen Interior Walls',
    'slider3' => 'Smart Space Saving Kitchens',
    'slider4' => 'Premium Contemporary Kitchen Styles',
];

foreach ($sliderRows as $sec => $heading):
  $cards = $kitchenData[$sec] ?? [];
?>
<div class="mobile-section">
  <div class="section-header">
    <h2 class="head"><?= $heading ?></h2>
    <div class="underline"></div>
  </div>
  <div class="container">
    <div class="slider-wrapper">
      <div class="slider-track auto-slider" id="track-<?= $sec ?>">
        <?php if (empty($cards)): ?>
          <div class="empty-slider">No designs added yet. Add from admin panel.</div>
        <?php else: ?>
          <?php foreach ($cards as $r): ?>
            <?= kitchenCard($r) ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

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
      <p>Email: <a href="mailto:interiordesign@.in" style="color:#aaa;">interiordesign@.in</a></p>
      <p>Phone: <a href="tel:+919800000000" style="color:#aaa;">+91 98000 00000</a></p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // DRAG TO SCROLL — sabhi sliders par
  document.querySelectorAll('.slider-track').forEach(function(track) {
    var isDown = false, startX, scrollLeft;
    track.addEventListener('mousedown', function(e) {
      isDown = true;
      startX = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });
    track.addEventListener('mouseleave', function() { isDown = false; });
    track.addEventListener('mouseup',    function() { isDown = false; });
    track.addEventListener('mousemove', function(e) {
      if (!isDown) return;
      e.preventDefault();
      var x    = e.pageX - track.offsetLeft;
      var walk = (x - startX) * 1.5;
      track.scrollLeft = scrollLeft - walk;
    });
    // Touch support
    track.addEventListener('touchstart', function(e) {
      startX     = e.touches[0].pageX;
      scrollLeft = track.scrollLeft;
    });
    track.addEventListener('touchmove', function(e) {
      var x    = e.touches[0].pageX;
      var walk = (x - startX) * 1.5;
      track.scrollLeft = scrollLeft - walk;
    });
  });

  // AUTO SCROLL — har slider automatically scroll karta rahe
  document.querySelectorAll('.auto-slider').forEach(function(track) {
    var speed    = 0.5;   // px per frame — speed badhaani ho toh increase karo
    var paused   = false;
    var animId;

    function autoScroll() {
      if (!paused) {
        track.scrollLeft += speed;
        // End pe pahunche toh start pe wapas
        if (track.scrollLeft >= track.scrollWidth - track.offsetWidth - 1) {
          track.scrollLeft = 0;
        }
      }
      animId = requestAnimationFrame(autoScroll);
    }

    animId = requestAnimationFrame(autoScroll);

    // Hover / touch pe pause
    track.addEventListener('mouseenter',  function() { paused = true;  });
    track.addEventListener('mouseleave',  function() { paused = false; });
    track.addEventListener('touchstart',  function() { paused = true;  });
    track.addEventListener('touchend',    function() {
      setTimeout(function() { paused = false; }, 1500);
    });
  });

  // SCROLL TO TOP
  var scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
  };
  scrollBtn.onclick = function() { window.scrollTo({ top:0, behavior:'smooth' }); };

  // WISHLIST TOGGLE
  function toggleWish(btn) {
    var name     = btn.getAttribute('data-name');
    var image    = btn.getAttribute('data-image');   // sirf filename
    var category = btn.getAttribute('data-category') || 'kitchen';
    var toast    = document.getElementById('toast');

    if (!name || !image) {
      toast.textContent = '⚠️ Data missing!';
      toast.classList.add('show');
      setTimeout(function() { toast.classList.remove('show'); }, 2000);
      return;
    }

    btn.disabled = true;
    var fd = new FormData();
    fd.append('product_name',  name);
    fd.append('product_image', image);
    fd.append('category',      category);

    fetch('wishlist_toggle.php', { method:'POST', body:fd })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        if (data.status === 'added') {
          btn.classList.add('wished');
          toast.textContent = '❤️ Added to Wishlist!';
        } else if (data.status === 'removed') {
          btn.classList.remove('wished');
          toast.textContent = '🤍 Removed from Wishlist';
        } else if (data.status === 'login_required') {
          window.location.href = 'user_login.php';
          return;
        } else {
          toast.textContent = '⚠️ ' + (data.msg || 'Error!');
        }
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

  // FILTER TABS — toast dikhao
  function filterTab(clickedBtn, style) {
    document.querySelectorAll('.filter-tab').forEach(function(t) {
      t.classList.remove('active');
    });
    clickedBtn.classList.add('active');
    var toast = document.getElementById('toast');
    toast.textContent = style === 'all'
      ? '✅ Showing all kitchen styles'
      : '🔍 Filtering: ' + style.toUpperCase() + ' kitchens';
    toast.classList.add('show');
    setTimeout(function() { toast.classList.remove('show'); }, 2000);
  }
</script>
</body>
</html>