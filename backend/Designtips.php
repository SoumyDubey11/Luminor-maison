<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<?php
// Saara designtips data ek baar fetch
$tipsData = [];
$res = mysqli_query($conn, "SELECT * FROM site_images WHERE page='designtips' ORDER BY sort_order ASC");
while ($row = mysqli_fetch_assoc($res)) {
    $tipsData[$row['section']][] = $row;
}

$tips     = $tipsData['tip']     ?? [];
$features = $tipsData['feature'] ?? [];
$cards    = $tipsData['card']    ?? [];

// Feature fallback
$feat      = $features[0] ?? null;
$featImg   = $feat ? ADMIN_IMG . htmlspecialchars($feat['image'])       : IMG_URL . 'living.jpg';
$featTitle = $feat ? htmlspecialchars($feat['title'])                   : 'Create a Cozy Living Room';
$featDesc  = $feat ? htmlspecialchars($feat['description'])             : 'A well-designed living room should feel welcoming and comfortable.';

// Read time labels — cycle karo agar zyada tips hain
$readTimes  = ['2 min read', '3 min read', '2 min read', '4 min read', '2 min read'];
$categories = ['Color Tips', 'Lighting', 'Storage', 'Color Tips', 'Lighting'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interior Design Tips | Luminor Maison</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .heading { font-size:38px; font-weight:700; margin-bottom:10px; }
    .p1 { color:#1d99a6; font-weight:600; margin-bottom:5px; }
    .view-btn { color:#1d99a6; font-weight:600; cursor:pointer; }
    .tip-row { padding:20px; border-radius:10px; background:#fff; box-shadow:0 6px 18px rgba(0,0,0,0.08); transition:.3s; margin-bottom:20px; }
    .tip-row:hover { transform:translateY(-5px); box-shadow:0 10px 25px rgba(0,0,0,0.12); }
    .tip-img { height:200px; width:100%; object-fit:cover; border-radius:8px; }
    .btn-tip { background:#1d99a6; color:white; border:none; padding:6px 16px; border-radius:5px; }
    .btn-tip:hover { background:#177f8a; color:white; }
    .design-card { border:none; border-radius:10px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.08); transition:.3s; }
    .design-card img { width:100%; height:220px; object-fit:cover; }
    .design-card:hover { transform:translateY(-6px); box-shadow:0 15px 30px rgba(0,0,0,0.15); }
    .design-card h6 { font-weight:600; margin-bottom:5px; }
    .size-text { font-size:13px; color:#777; margin-bottom:10px; }
    .btn-book { background:#1d99a6; color:white; border:none; }
    .btn-book:hover { background:#177f8a; color:white; }
    .btn-quote { border:1px solid #1d99a6; color:#1d99a6; }
    .btn-quote:hover { background:#1d99a6; color:white; }
    .bedroom-feature { background:linear-gradient(120deg,#ffffff,#f5fbfc); padding:50px; border-radius:14px; }
    .feature-img img { border-radius:12px; }
    .feature-title { font-size:32px; font-weight:700; margin-bottom:15px; }
    .feature-text { color:#555; line-height:1.7; margin-bottom:20px; }
    .feature-points { margin-bottom:20px; }
    .point { display:flex; align-items:center; margin-bottom:10px; }
    .point i { color:#1d99a6; margin-right:10px; font-size:18px; }
    .feature-btn { background:#1d99a6; color:white; border:none; padding:10px 20px; border-radius:30px; }
    .feature-btn:hover { background:#177f8a; }
    .highlight-card { background:linear-gradient(120deg,#1d99a6,#2fb6c2); color:white; padding:30px; border-radius:12px; height:100%; display:flex; flex-direction:column; justify-content:center; }
    .highlight-card h4 { font-weight:700; margin-bottom:15px; }
    .highlight-card ul { padding-left:18px; margin-bottom:20px; }
    .highlight-card li { margin-bottom:6px; }
    @media(max-width:768px) { .heading { font-size:28px; } .feature-title { font-size:24px; } .bedroom-feature { padding:30px; } .design-card img { height:200px; } }
    .tip-box { background:#f8fbfb; padding:20px; border-radius:10px; box-shadow:0 6px 15px rgba(0,0,0,0.08); text-align:center; }
    .tip-box i { font-size:26px; color:#1d99a6; margin-bottom:10px; }
    .tip-box h6 { font-weight:600; margin-bottom:6px; }
    .tip-box p { font-size:14px; color:#666; }
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
    .breadcrumb-bar { background:#f8f8f8; border-bottom:1px solid #eee; padding:10px 0; font-size:13px; color:#888; }
    .breadcrumb-bar a { color:#1d99a6; text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }
    .breadcrumb-bar span { margin:0 6px; color:#bbb; }
    .tips-hero { background:linear-gradient(135deg,#0e0e0e 0%,#1a2e2e 100%); padding:55px 0 45px; }
    .tips-hero .p1 { color:#1d99a6; font-size:13px; letter-spacing:2px; text-transform:uppercase; }
    .tips-hero .heading { color:white; font-size:40px; }
    .tips-hero p.desc { color:#bbb; font-size:15px; line-height:1.7; }
    .tips-hero hr { border-color:#1d99a6; opacity:0.4; }
    .tips-hero .more-text { color:#999; font-size:14px; display:none; margin-top:10px; }
    .hero-read-btn { display:inline-block; margin-top:15px; padding:10px 25px; border:1px solid #1d99a6; color:#1d99a6; border-radius:25px; font-size:13px; cursor:pointer; background:transparent; transition:0.3s; }
    .hero-read-btn:hover { background:#1d99a6; color:white; }
    .hero-tags { display:flex; gap:10px; flex-wrap:wrap; margin-top:20px; }
    .hero-tag { background:rgba(255,255,255,0.1); color:#ccc; border:1px solid rgba(255,255,255,0.2); padding:5px 14px; border-radius:20px; font-size:12px; }
    .read-time { display:inline-block; background:#e6f5f7; color:#1d99a6; font-size:12px; padding:3px 10px; border-radius:15px; margin-bottom:8px; font-weight:500; }
    .like-btn { background:transparent; border:1px solid #ddd; border-radius:20px; padding:5px 14px; font-size:13px; color:#888; cursor:pointer; transition:0.3s; margin-left:8px; }
    .like-btn:hover { border-color:#e74c3c; color:#e74c3c; }
    .like-btn.liked { background:#fff0f0; border-color:#e74c3c; color:#e74c3c; }
    #readProgress { position:fixed; top:0; left:0; height:3px; background:#1d99a6; width:0%; z-index:9999; transition:width 0.1s; }
    #scrollTopBtn { position:fixed; bottom:30px; right:25px; width:45px; height:45px; background:#1d99a6; color:white; border:none; border-radius:50%; font-size:18px; cursor:pointer; display:none; align-items:center; justify-content:center; z-index:999; box-shadow:0 4px 15px rgba(29,153,166,0.4); transition:0.3s; }
    #scrollTopBtn:hover { background:black; transform:translateY(-3px); }
    #toast { position:fixed; bottom:85px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #1d99a6; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }
    .filter-tabs { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:25px; }
    .filter-tab { padding:7px 18px; border:1px solid #1d99a6; color:#1d99a6; background:transparent; border-radius:25px; font-size:13px; cursor:pointer; transition:0.3s; }
    .filter-tab:hover, .filter-tab.active { background:#1d99a6; color:white; }
    .save-btn { background:transparent; border:1px solid #1d99a6; color:#1d99a6; font-size:12px; padding:4px 12px; border-radius:15px; cursor:pointer; transition:0.3s; margin-left:5px; }
    .save-btn:hover { background:#1d99a6; color:white; }
    .save-btn.saved { background:#1d99a6; color:white; }
    .more-text { display:none; }
    .empty-tip { text-align:center; padding:30px; color:#888; font-size:14px; background:#f8f8f8; border-radius:10px; }
  </style>
</head>
<body>

<div id="readProgress"></div>
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
    <a href="index.php">Home</a><span>›</span>
    <a href="#">Blogs</a><span>›</span>
    Design Tips
  </div>
</div>

<!-- HERO -->
<div class="tips-hero">
  <div class="container">
    <p class="p1"><i class="fa-solid fa-pen-nib"></i> &nbsp; Expert Blogs 2026</p>
    <hr>
    <h2 class="heading">Interior Design Tips</h2>
    <p class="desc">Explore simple and effective ideas to improve your home interiors. From smart furniture placement to color combinations, these tips help you create stylish, comfortable and functional living spaces.</p>
    <p class="more-text" id="heroMore">Interior design is about balancing style and practicality. Choosing the right furniture, lighting and colors can completely transform your living space and make it more comfortable and visually appealing.</p>
    <button class="hero-read-btn" onclick="toggleHeroText(this)">Read More ↓</button>
    <div class="hero-tags">
      <span class="hero-tag">🎨 Color Tips</span>
      <span class="hero-tag">💡 Lighting</span>
      <span class="hero-tag">📦 Storage</span>
      <span class="hero-tag">🛋️ Living Room</span>
      <span class="hero-tag">🛏️ Bedroom</span>
      <span class="hero-tag">🍳 Kitchen</span>
    </div>
  </div>
</div>

<!-- TIPS SECTION — Dynamic -->
<div class="container my-5">
  <h3 class="fw-bold mb-1">Top Interior Design Tips</h3>
  <p class="text-muted mb-3">Popular home styling ideas loved by homeowners</p>

  <!-- FILTER TABS -->
  <div class="filter-tabs">
    <button class="filter-tab active" onclick="filterTip(this,'All')">All Tips</button>
    <button class="filter-tab" onclick="filterTip(this,'Color')">Color</button>
    <button class="filter-tab" onclick="filterTip(this,'Lighting')">Lighting</button>
    <button class="filter-tab" onclick="filterTip(this,'Storage')">Storage</button>
  </div>

  <?php if (empty($tips)): ?>
    <div class="empty-tip">No tips added yet. Add from admin panel.</div>
  <?php else: ?>
    <?php foreach ($tips as $i => $tip):
      $rt  = $readTimes[$i % count($readTimes)];
      $cat = $categories[$i % count($categories)];
      $tipTitle = htmlspecialchars($tip['title']);
      $tipDesc  = htmlspecialchars($tip['description']);
      $tipImg   = ADMIN_IMG . htmlspecialchars($tip['image']);
    ?>
    <div class="tip-row">
      <div class="row align-items-center">
        <div class="col-lg-4">
          <img src="<?= $tipImg ?>"
               class="img-fluid tip-img"
               onerror="this.src='https://placehold.co/400x200?text=No+Image'">
        </div>
        <div class="col-lg-8">
          <span class="read-time">🕐 <?= $rt ?> &nbsp;|&nbsp; <?= $cat ?></span>
          <h5><?= $tipTitle ?></h5>
          <p class="text-muted"><?= $tipDesc ?></p>
          <p class="more-text text-muted">
            This tip helps you achieve a better interior design outcome by focusing on key elements that make your space more functional and visually appealing.
          </p>
          <div class="d-flex flex-wrap gap-2 align-items-center mt-2">
            <button class="btn btn-tip read-btn">Read Tip</button>
            <button class="like-btn"
                    data-tip="<?= $tipTitle ?>"
                    onclick="toggleLike(this)">♡ Like</button>
            <button class="save-btn"
                    data-tip="<?= $tipTitle ?>"
                    onclick="toggleSave(this)">🔖 Save</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<!-- FEATURE SECTION — Dynamic -->
<section class="bedroom-feature container my-5">
  <div class="row align-items-center g-5">
    <div class="col-lg-6">
      <div class="feature-img">
        <img src="<?= $featImg ?>"
             class="img-fluid"
             onerror="this.src='https://placehold.co/600x400?text=No+Image'">
      </div>
    </div>
    <div class="col-lg-6">
      <h2 class="feature-title"><?= $featTitle ?></h2>
      <p class="feature-text"><?= $featDesc ?></p>
      <div class="feature-points">
        <div class="point"><i class="fa-solid fa-couch"></i><span>Comfortable Furniture Layout</span></div>
        <div class="point"><i class="fa-solid fa-lightbulb"></i><span>Warm Ambient Lighting</span></div>
        <div class="point"><i class="fa-solid fa-palette"></i><span>Balanced Color Scheme</span></div>
      </div>
      <p class="more-text text-muted">Add soft rugs, indoor plants and layered lighting to make your living room feel warm and inviting.</p>
      <button class="btn feature-btn read-btn">Explore More Tips</button>
    </div>
  </div>
</section>

<!-- CARDS SECTION — Dynamic -->
<div class="container cards-section">
  <div class="row g-4">
    <?php if (empty($cards)): ?>
      <div class="empty-tip">No design cards added yet. Add from admin panel.</div>
    <?php else:
      $totalCards = count($cards);
      // highlight card beech mein insert karo
      $highlightAt = (int)floor($totalCards / 2);
      foreach ($cards as $ci => $card):
        // Highlight card insert
        if ($ci === $highlightAt):
    ?>
        <div class="col-lg-4 col-md-6">
          <div class="highlight-card">
            <h4>Why Interior Tips Matter</h4>
            <p>Small design changes can dramatically improve your home's look and functionality.</p>
            <ul>
              <li>Better space utilization</li>
              <li>Improved comfort</li>
              <li>Stylish interior aesthetics</li>
              <li>Smart storage solutions</li>
            </ul>
            <button class="btn btn-quote w-100"
                    style="background-color:white;color:#2fb6c2;"
                    data-bs-toggle="modal"
                    data-bs-target="#tipsModal">
              Explore More Tips
            </button>
          </div>
        </div>
    <?php endif;
        $cTitle = htmlspecialchars($card['title']);
        $cDesc  = htmlspecialchars($card['description']);
        $cImg   = ADMIN_IMG . htmlspecialchars($card['image']);
    ?>
        <div class="col-lg-4 col-md-6">
          <div class="card design-card">
            <img src="<?= $cImg ?>"
                 onerror="this.src='https://placehold.co/400x220?text=No+Image'">
            <div class="card-body">
              <span class="read-time">🕐 2 min read</span>
              <h6><?= $cTitle ?></h6>
              <p class="size-text"><?= $cDesc ?></p>
              <p class="more-text text-muted">
                Apply this tip to improve your home's interior design and create a more comfortable living space.
              </p>
              <div class="d-flex gap-2">
                <button class="btn btn-book btn-sm read-btn">Read Tip</button>
                <button class="save-btn"
                        data-tip="<?= $cTitle ?>"
                        onclick="toggleSave(this)">🔖 Save</button>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- TIPS MODAL — same as original -->
<div class="modal fade" id="tipsModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Interior Design Expert Tips</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-palette"></i>
              <h6>Use Neutral Base Colors</h6>
              <p>Neutral shades create a calm background and allow accent pieces to stand out.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-lightbulb"></i>
              <h6>Layer Your Lighting</h6>
              <p>Combine ceiling lights, lamps and accent lighting to create depth.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-couch"></i>
              <h6>Choose Functional Furniture</h6>
              <p>Furniture should match room size while providing comfort and usability.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-box"></i>
              <h6>Maximize Storage</h6>
              <p>Use hidden storage furniture like beds with drawers and wall cabinets.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-tree"></i>
              <h6>Add Indoor Plants</h6>
              <p>Plants improve air quality and make interiors look fresh and vibrant.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tip-box"><i class="fa-solid fa-rug"></i>
              <h6>Use Textures</h6>
              <p>Rugs, cushions and curtains add warmth and depth to interiors.</p>
            </div>
          </div>
        </div>
      </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ── TOAST ──────────────────────────────────
  function showToast(msg) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(function() { t.classList.remove('show'); }, 2200);
  }

  // ── READ TIP TOGGLE ─────────────────────────
  // Event delegation — sabhi .read-btn par ek baar listener
  document.addEventListener('click', function(e) {
    if (!e.target.classList.contains('read-btn')) return;
    var btn = e.target;

    // Sabse kareeb wale container mein .more-text dhundho
    var parent = btn.closest('.tip-row, .card-body, .col-lg-6, .bedroom-feature');
    var moreText = parent ? parent.querySelector('.more-text') : null;
    if (!moreText) return;

    if (moreText.style.display === 'none' || moreText.style.display === '') {
      moreText.style.display = 'block';
      btn.textContent = btn.textContent.includes('Explore') ? 'Hide Tips' : 'Hide Tip';
    } else {
      moreText.style.display = 'none';
      btn.textContent = btn.textContent.includes('Hide Tips') ? 'Explore More Tips' : 'Read Tip';
    }
  });

  // ── HERO READ MORE ───────────────────────────
  function toggleHeroText(btn) {
    var text = document.getElementById('heroMore');
    if (text.style.display === 'none' || text.style.display === '') {
      text.style.display = 'block';
      btn.textContent = 'Read Less ↑';
    } else {
      text.style.display = 'none';
      btn.textContent = 'Read More ↓';
    }
  }

  // ── LIKE BUTTON ──────────────────────────────
  function toggleLike(btn) {
    var tipName = btn.getAttribute('data-tip');
    if (!tipName) { showToast('⚠️ Error!'); return; }

    btn.disabled = true;
    var fd = new FormData();
    fd.append('tip_name', tipName);

    fetch('tip_like_toggle.php', { method: 'POST', body: fd })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        if (data.status === 'liked') {
          btn.classList.add('liked');
          btn.textContent = '♥ Liked';
          showToast('❤️ Tip liked!');
        } else if (data.status === 'removed') {
          btn.classList.remove('liked');
          btn.textContent = '♡ Like';
          showToast('Like removed');
        } else if (data.status === 'login_required') {
          window.location.href = 'user_login.php';
        }
      })
      .catch(function() {
        btn.disabled = false;
        showToast('⚠️ Something went wrong!');
      });
  }

  // ── SAVE TIP ─────────────────────────────────
  function toggleSave(btn) {
    var tipName = btn.getAttribute('data-tip');
    if (!tipName) { showToast('⚠️ Error!'); return; }

    btn.disabled = true;
    var fd = new FormData();
    fd.append('tip_name', tipName);

    fetch('tip_save_toggle.php', { method: 'POST', body: fd })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        if (data.status === 'saved') {
          btn.classList.add('saved');
          btn.textContent = '✅ Saved';
          showToast('🔖 Tip saved!');
        } else if (data.status === 'removed') {
          btn.classList.remove('saved');
          btn.textContent = '🔖 Save';
          showToast('Removed from saved');
        } else if (data.status === 'login_required') {
          window.location.href = 'user_login.php';
        }
      })
      .catch(function() {
        btn.disabled = false;
        showToast('⚠️ Something went wrong!');
      });
  }

  // ── FILTER TABS ───────────────────────────────
  function filterTip(clickedBtn, category) {
    document.querySelectorAll('.filter-tab').forEach(function(t) {
      t.classList.remove('active');
    });
    clickedBtn.classList.add('active');
    showToast('📂 Showing: ' + category + ' tips');
  }

  // ── SCROLL TO TOP + PROGRESS BAR ─────────────
  var scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
    var scrolled  = document.documentElement.scrollTop;
    var total     = document.documentElement.scrollHeight - window.innerHeight;
    var percent   = total > 0 ? (scrolled / total) * 100 : 0;
    document.getElementById('readProgress').style.width = percent + '%';
  };
  scrollBtn.onclick = function() { window.scrollTo({ top: 0, behavior: 'smooth' }); };
</script>
</body>
</html>