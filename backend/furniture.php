<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<?php
// Saara furniture data ek baar fetch
$furnitureData = [];
$res = mysqli_query($conn, "SELECT * FROM site_images WHERE page='furniture' ORDER BY sort_order ASC");
while ($row = mysqli_fetch_assoc($res)) {
    $furnitureData[$row['section']][] = $row;
}

$categories = $furnitureData['category'] ?? [];
$features   = $furnitureData['feature']  ?? [];
$products   = $furnitureData['product']  ?? [];

// Badge helper
function furnitureBadge($badge) {
    $map = [
        'new'     => ['class' => 'badge-new',     'label' => '✨ New'],
        'popular' => ['class' => 'badge-popular', 'label' => '🔥 Popular'],
        'sale'    => ['class' => 'badge-sale',    'label' => '🏷️ Sale'],
    ];
    if (isset($map[$badge])) {
        return '<span class="badge-tag ' . $map[$badge]['class'] . '">' . $map[$badge]['label'] . '</span>';
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Furniture | Luminor Maison</title>
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
    .page-title { font-size:36px; font-weight:700; color:#222; }
    .page-text { color:#555; line-height:1.7; }
    .furniture-cat { background:#fff; border-radius:12px; text-align:center; padding:20px; box-shadow:0 5px 15px rgba(0,0,0,0.08); transition:.3s; cursor:pointer; border:2px solid transparent; }
    .furniture-cat img { height:160px; object-fit:cover; margin-bottom:10px; width:100%; border-radius:8px; }
    .furniture-cat:hover { transform:translateY(-6px); }
    .furniture-cat.selected { border-color:#1d99a6; }
    .furniture-cat h6 { font-weight:600; margin:0; font-size:15px; }
    .furniture-feature { background:linear-gradient(120deg,#ffffff,#f5f9fa,#e6f5f7); padding:50px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.08); }
    .feature-btn { background:#1d99a6; color:white; border-radius:30px; padding:10px 22px; }
    .feature-btn:hover { background:#167a85; color:white; }
    .furniture-card { border:none; border-radius:12px; overflow:hidden; transition:.3s; }
    .furniture-card img { height:220px; object-fit:cover; width:100%; }
    .furniture-card:hover { transform:translateY(-6px); box-shadow:0 12px 25px rgba(0,0,0,0.12); }
    .price { color:#1d99a6; font-weight:600; }
    .cta-section { background:#80808017; padding:60px; border-radius:16px; }
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
    .breadcrumb-bar span { margin:0 6px; color:#bbb; }
    .furniture-hero { background:linear-gradient(135deg,#0e0e0e 0%,#1c2e2e 100%); padding:55px 0 45px; }
    .furniture-hero .page-title { color:white; font-size:40px; }
    .furniture-hero .page-text { color:#bbb; }
    .furniture-hero .teal-tag { display:inline-block; background:#1d99a6; color:white; font-size:12px; padding:4px 14px; border-radius:20px; letter-spacing:1px; margin-bottom:15px; }
    .hero-stats { display:flex; gap:35px; margin-top:25px; flex-wrap:wrap; }
    .hero-stat h4 { color:#1d99a6; font-size:26px; font-weight:800; margin:0; }
    .hero-stat p { color:#aaa; font-size:11px; margin:0; letter-spacing:1px; }
    .hero-scroll-btn { display:inline-block; margin-top:20px; padding:10px 25px; border:1px solid #1d99a6; color:#1d99a6; border-radius:25px; font-size:13px; cursor:pointer; background:transparent; transition:0.3s; }
    .hero-scroll-btn:hover { background:#1d99a6; color:white; }
    .card-img-wrap { position:relative; overflow:hidden; }
    .card-img-wrap img { width:100%; height:220px; object-fit:cover; cursor:zoom-in; transition:0.4s; }
    .card-img-wrap:hover img { transform:scale(1.05); }
    .wish-btn { position:absolute; top:10px; right:10px; width:34px; height:34px; background:white; border:none; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:5; box-shadow:0 2px 8px rgba(0,0,0,0.15); font-size:15px; color:#ccc; transition:0.3s; }
    .wish-btn:hover { transform:scale(1.1); }
    .wish-btn.wished { color:red; }
    .badge-tag { position:absolute; top:10px; left:10px; font-size:11px; padding:4px 10px; border-radius:20px; font-weight:600; z-index:5; color:white; }
    .badge-new     { background:#1d99a6; }
    .badge-popular { background:#e67e22; }
    .badge-sale    { background:#e74c3c; }
    .emi-text { font-size:12px; color:#888; margin:0; }
    #toast { position:fixed; bottom:85px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #1d99a6; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }
    #scrollTopBtn { position:fixed; bottom:30px; right:25px; width:45px; height:45px; background:#1d99a6; color:white; border:none; border-radius:50%; font-size:18px; cursor:pointer; display:none; align-items:center; justify-content:center; z-index:999; box-shadow:0 4px 15px rgba(29,153,166,0.4); transition:0.3s; }
    #scrollTopBtn:hover { background:black; transform:translateY(-3px); }
    /* COMPARE BAR */
    #compareBar { position:fixed; bottom:0; left:0; right:0; background:#0e0e0e; color:white; padding:12px 30px; display:none; align-items:center; justify-content:space-between; z-index:998; border-top:2px solid #1d99a6; font-size:14px; flex-wrap:wrap; gap:10px; }
    #compareBar.show { display:flex; }
    #compareList { display:flex; gap:15px; flex-wrap:wrap; }
    .compare-item { background:#1d99a6; padding:5px 12px; border-radius:20px; font-size:12px; }
    #compareBar button { background:white; color:#0e0e0e; border:none; padding:7px 20px; border-radius:20px; font-size:13px; font-weight:600; cursor:pointer; transition:0.3s; }
    #compareBar button:hover { background:#1d99a6; color:white; }
    .compare-check-btn { background:transparent; border:1px solid #1d99a6; color:#1d99a6; font-size:12px; padding:4px 10px; border-radius:15px; cursor:pointer; transition:0.3s; margin-left:5px; }
    .compare-check-btn.added { background:#1d99a6; color:white; }
    .compare-check-btn:hover { background:#1d99a6; color:white; }
    /* COMPARE MODAL */
    .compare-modal-card { border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.08); }
    .compare-modal-card img { height:160px; object-fit:cover; width:100%; }
    .compare-modal-card h6 { font-weight:600; }
    .compare-feature { font-size:13px; color:#555; padding:4px 0; border-bottom:1px solid #f0f0f0; }
    /* PRODUCT MODAL image fix */
    #productImg { max-height:260px; object-fit:cover; width:100%; border-radius:10px; }
    /* Empty state */
    .empty-section { text-align:center; padding:40px; color:#888; font-size:15px; }
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
    <a href="#">Offering</a><span>›</span>
    Furniture Collection
  </div>
</div>

<!-- HERO -->
<div class="furniture-hero">
  <div class="container">
    <span class="teal-tag"><i class="fa-solid fa-couch"></i> &nbsp; Premium Collection 2026</span>
    <h2 class="page-title">Premium Furniture Collection</h2>
    <p class="page-text">Explore beautifully crafted furniture designed to elevate your living space. Our collections combine modern aesthetics, durable materials and thoughtful craftsmanship.</p>
    <button class="hero-scroll-btn" onclick="document.getElementById('products-start').scrollIntoView({behavior:'smooth'})">Browse Collection ↓</button>
    <div class="hero-stats">
      <div class="hero-stat"><h4>200+</h4><p>FURNITURE PIECES</p></div>
      <div class="hero-stat"><h4>5 YRS</h4><p>WARRANTY</p></div>
      <div class="hero-stat"><h4>FREE</h4><p>DELIVERY</p></div>
      <div class="hero-stat"><h4>EMI</h4><p>0% INTEREST</p></div>
    </div>
  </div>
</div>

<!-- CATEGORY SECTION — Dynamic -->
<div class="container my-5">
  <div class="row g-4">
    <?php if (empty($categories)): ?>
      <div class="empty-section">No categories added yet. Add from admin panel.</div>
    <?php else: ?>
      <?php foreach ($categories as $cat): ?>
      <div class="col-lg-3 col-md-6">
        <div class="furniture-cat" onclick="selectCat(this, '<?= htmlspecialchars($cat['title']) ?>')">
          <img src="<?= ADMIN_IMG . htmlspecialchars($cat['image']) ?>"
               onerror="this.src='https://placehold.co/300x160?text=No+Image'">
          <h6><?= htmlspecialchars($cat['title']) ?></h6>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- FEATURE SECTION — Dynamic -->
<?php
$feat = $features[0] ?? null;
$featImg = $feat ? ADMIN_IMG . htmlspecialchars($feat['image']) : IMG_URL . 'living.jpg';
$featTitle = $feat ? htmlspecialchars($feat['title']) : 'Modern Living Room Furniture';
$featDesc  = $feat ? htmlspecialchars($feat['description']) : 'Our living room furniture blends comfort with contemporary design. From elegant sofas to stylish coffee tables, every piece is crafted to enhance your home\'s aesthetics.';
?>
<section class="container furniture-feature my-5">
  <div class="row align-items-center g-5">
    <div class="col-lg-6">
      <img src="<?= $featImg ?>" class="img-fluid rounded"
           onerror="this.src='https://placehold.co/600x400?text=No+Image'">
    </div>
    <div class="col-lg-6">
      <h3 class="fw-bold"><?= $featTitle ?></h3>
      <p class="text-muted"><?= $featDesc ?></p>
      <a href="Designtips.php" class="btn feature-btn">Explore Collection</a>
    </div>
  </div>
</section>

<!-- PRODUCT CARDS — Dynamic -->
<div class="container my-5" id="products-start">
  <div class="row g-4">
    <?php if (empty($products)): ?>
      <div class="empty-section">No products added yet. Add from admin panel.</div>
    <?php else: ?>
      <?php foreach ($products as $p):
        $pImg   = ADMIN_IMG . htmlspecialchars($p['image']);
        $pFile  = htmlspecialchars($p['image']);   // sirf filename wishlist ke liye
        $pTitle = htmlspecialchars($p['title']);
        $pDesc  = htmlspecialchars($p['description']);
        $pPrice = htmlspecialchars($p['price'] ?? '');
        $pBadge = furnitureBadge($p['badge']);
        // EMI calculate karo (12 mahine)
        $priceNum = (int) preg_replace('/[^0-9]/', '', $pPrice);
        $emi      = $priceNum > 0 ? '₹' . number_format(ceil($priceNum / 12)) . '/month' : '';
      ?>
      <div class="col-lg-3 col-md-6">
        <div class="card furniture-card shadow-sm">
          <div class="card-img-wrap">
            <?= $pBadge ?>
            <button class="wish-btn"
                    data-name="<?= $pTitle ?>"
                    data-image="<?= $pFile ?>"
                    data-category="furniture"
                    onclick="toggleWish(this)">
              <i class="fa-solid fa-heart"></i>
            </button>
            <img src="<?= $pImg ?>"
                 onclick="openProductModal('<?= $pTitle ?>', '<?= $pPrice ?>', '<?= $pImg ?>', '<?= addslashes($pDesc) ?>')"
                 onerror="this.src='https://placehold.co/300x220?text=No+Image'">
          </div>
          <div class="card-body">
            <h6><?= $pTitle ?></h6>
            <p class="price"><?= $pPrice ?></p>
            <?php if ($emi): ?>
              <p class="emi-text">EMI from <?= $emi ?></p>
            <?php endif; ?>
            <div class="d-flex gap-2 mt-2 flex-wrap">
              <button class="btn btn-outline-dark btn-sm"
                      onclick="openProductModal('<?= $pTitle ?>', '<?= $pPrice ?>', '<?= $pImg ?>', '<?= addslashes($pDesc) ?>')">
                View Details
              </button>
              <button class="compare-check-btn"
                      onclick="addCompare(this, '<?= $pTitle ?>', '<?= $pPrice ?>', '<?= $pImg ?>')">
                + Compare
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- CTA SECTION -->
<section class="container cta-section text-center my-5">
  <h3 class="fw-bold">Design Your Perfect Furniture Setup</h3>
  <p class="text-muted">Our design experts will help you choose furniture that matches your space, style and comfort preferences.</p>
  <a href="contact.php" class="btn feature-btn">Book Free Consultation</a>
</section>

<!-- PRODUCT MODAL -->
<div class="modal fade" id="productModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:2px solid #1d99a6;">
        <h5 class="modal-title" id="productName" style="color:#1d99a6;font-weight:700;"></h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center p-4">
        <img id="productImg" class="img-fluid rounded mb-3"
             style="max-height:260px;object-fit:cover;width:100%;">
        <p id="productDesc" class="text-muted" style="font-size:14px;line-height:1.7;"></p>
        <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
          <h4 id="productPrice" style="color:#1d99a6;font-weight:700;margin:0;"></h4>
          <span id="productEmi" style="font-size:13px;color:#888;"></span>
        </div>
        <div class="row g-2">
          <div class="col-6">
            <div style="background:#f8f8f8;border-radius:8px;padding:10px;font-size:13px;">
              <i class="fa-solid fa-shield-halved" style="color:#1d99a6;"></i> 5 Year Warranty
            </div>
          </div>
          <div class="col-6">
            <div style="background:#f8f8f8;border-radius:8px;padding:10px;font-size:13px;">
              <i class="fa-solid fa-truck" style="color:#1d99a6;"></i> Free Delivery
            </div>
          </div>
          <div class="col-6">
            <div style="background:#f8f8f8;border-radius:8px;padding:10px;font-size:13px;">
              <i class="fa-solid fa-credit-card" style="color:#1d99a6;"></i> 0% EMI Available
            </div>
          </div>
          <div class="col-6">
            <div style="background:#f8f8f8;border-radius:8px;padding:10px;font-size:13px;">
              <i class="fa-solid fa-rotate-left" style="color:#1d99a6;"></i> Easy Returns
            </div>
          </div>
        </div>
        <a href="contact.php" class="btn w-100 mt-3"
           style="background:#1d99a6;color:white;border-radius:8px;font-weight:600;">
          <i class="fa-solid fa-phone"></i> Contact for Purchase
        </a>
      </div>
    </div>
  </div>
</div>

<!-- COMPARE MODAL -->
<div class="modal fade" id="compareModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:2px solid #1d99a6;">
        <h5 class="modal-title" style="color:#1d99a6;font-weight:700;">🔍 Compare Furniture</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3" id="compareModalContent"></div>
      </div>
      <div class="modal-footer">
        <a href="contact.php" class="btn" style="background:#1d99a6;color:white;">Get Quote for All</a>
      </div>
    </div>
  </div>
</div>

<!-- COMPARE BAR -->
<div id="compareBar">
  <div style="display:flex;align-items:center;gap:15px;flex-wrap:wrap;">
    <strong>Compare:</strong>
    <div id="compareList"></div>
  </div>
  <div class="d-flex gap-2">
    <button onclick="clearCompare()">Clear All</button>
    <button onclick="showCompareModal()" style="background:#1d99a6;color:white;">Compare Now</button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ── TOAST ──────────────────────────────────────────
  function showToast(msg) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(function() { t.classList.remove('show'); }, 2200);
  }

  // ── SCROLL TO TOP ──────────────────────────────────
  var scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
  };
  scrollBtn.onclick = function() { window.scrollTo({ top: 0, behavior: 'smooth' }); };

  // ── PRODUCT DETAIL MODAL ───────────────────────────
  function openProductModal(name, price, imgSrc, desc) {
    document.getElementById('productName').textContent  = name;
    document.getElementById('productPrice').textContent = price;
    document.getElementById('productDesc').textContent  = desc;
    document.getElementById('productImg').src           = imgSrc;

    // EMI auto calculate
    var num = parseInt(price.replace(/[^0-9]/g, ''));
    document.getElementById('productEmi').textContent =
      num > 0 ? 'EMI from ₹' + Math.ceil(num / 12).toLocaleString('en-IN') + '/month' : '';

    new bootstrap.Modal(document.getElementById('productModal')).show();
  }

  // ── WISHLIST TOGGLE ────────────────────────────────
  function toggleWish(btn) {
    var name     = btn.getAttribute('data-name');
    var image    = btn.getAttribute('data-image');    // sirf filename
    var category = btn.getAttribute('data-category') || 'furniture';

    if (!name || !image) { showToast('⚠️ Data missing!'); return; }

    btn.disabled = true;
    var fd = new FormData();
    fd.append('product_name',  name);
    fd.append('product_image', image);
    fd.append('category',      category);

    fetch('wishlist_toggle.php', { method: 'POST', body: fd })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        if (data.status === 'added') {
          btn.classList.add('wished');
          showToast('❤️ Added to Wishlist!');
        } else if (data.status === 'removed') {
          btn.classList.remove('wished');
          showToast('🤍 Removed from Wishlist');
        } else if (data.status === 'login_required') {
          window.location.href = 'user_login.php';
        } else {
          showToast('⚠️ ' + (data.msg || 'Something went wrong!'));
        }
      })
      .catch(function() {
        btn.disabled = false;
        showToast('⚠️ Something went wrong!');
      });
  }

  // ── CATEGORY SELECT ───
  function selectCat(el, name) {
    document.querySelectorAll('.furniture-cat').forEach(function(c) {
      c.classList.remove('selected');
    });
    el.classList.add('selected');
    showToast('📦 Showing: ' + name);
  }

  // ── COMPARE FEATURE ───
  var compareItems = [];

  function addCompare(btn, name, price, imgSrc) {
    var idx = compareItems.findIndex(function(i) { return i.name === name; });

    if (idx !== -1) {
      // Already hai — remove
      compareItems.splice(idx, 1);
      btn.classList.remove('added');
      btn.textContent = '+ Compare';
      showToast('Removed from compare');
    } else {
      if (compareItems.length >= 3) {
        showToast('⚠️ Max 3 items compare kar sakte ho!');
        return;
      }
      compareItems.push({ name: name, price: price, img: imgSrc });
      btn.classList.add('added');
      btn.textContent = '✓ Added';
      showToast('✅ Added: ' + name);
    }
    updateCompareBar();
  }

  function updateCompareBar() {
    var bar  = document.getElementById('compareBar');
    var list = document.getElementById('compareList');
    if (compareItems.length === 0) {
      bar.classList.remove('show');
      return;
    }
    bar.classList.add('show');
    list.innerHTML = '';
    compareItems.forEach(function(item) {
      list.innerHTML += '<span class="compare-item">' + item.name + '</span>';
    });
  }

  function clearCompare() {
    compareItems = [];
    document.querySelectorAll('.compare-check-btn').forEach(function(b) {
      b.classList.remove('added');
      b.textContent = '+ Compare';
    });
    document.getElementById('compareBar').classList.remove('show');
    showToast('🗑️ Compare list cleared');
  }

  function showCompareModal() {
    if (compareItems.length < 2) {
      showToast('⚠️ Kam se kam 2 items select karo!');
      return;
    }

    var colClass = 'col-md-' + Math.floor(12 / compareItems.length);
    var html = '';

    compareItems.forEach(function(item) {
      var num = parseInt(item.price.replace(/[^0-9]/g, ''));
      var emi = num > 0 ? '₹' + Math.ceil(num / 12).toLocaleString('en-IN') + '/month' : 'N/A';

      html += '<div class="' + colClass + '">';
      html += '<div class="compare-modal-card card border-0 shadow-sm">';
      html += '<img src="' + item.img + '" alt="' + item.name + '">';
      html += '<div class="card-body">';
      html += '<h6>' + item.name + '</h6>';
      html += '<p class="compare-feature"><strong>Price:</strong> ' + item.price + '</p>';
      html += '<p class="compare-feature"><strong>EMI:</strong> from ' + emi + '</p>';
      html += '<p class="compare-feature"><strong>Warranty:</strong> 5 Years</p>';
      html += '<p class="compare-feature"><strong>Delivery:</strong> Free</p>';
      html += '<p class="compare-feature"><strong>Returns:</strong> Easy Returns</p>';
      html += '<a href="contact.php" class="btn btn-sm w-100 mt-2" style="background:#1d99a6;color:white;">Get Quote</a>';
      html += '</div></div></div>';
    });

    document.getElementById('compareModalContent').innerHTML = html;
    new bootstrap.Modal(document.getElementById('compareModal')).show();
  }
</script>
</body>
</html>