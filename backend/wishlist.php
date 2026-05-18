<?php
session_start();
include 'db.php';
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$items   = mysqli_query($conn,
    "SELECT * FROM wishlist WHERE user_id='$user_id' ORDER BY created_at DESC"
);
$total = mysqli_num_rows($items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wishlist — Luminor Maison</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:#f4f7f6; font-family:'Segoe UI',Roboto,sans-serif; overflow-x:hidden; }

    /* ── TOP BAR ── */
    .top-line { width:100%; height:4px; background:linear-gradient(90deg,#1d99a6,#9b8241de); }

    /* ── HEADER ── */
    .top-header { height:80px; display:flex; align-items:center; background:white; box-shadow:0 2px 12px rgba(0,0,0,0.08); position:sticky; top:0; z-index:1000; padding:0 40px; justify-content:space-between; }
    .brand { display:flex; align-items:center; gap:12px; text-decoration:none; }
    .brand-text h4 { font-style:italic; color:#9b8241de; margin:0; font-size:18px; }
    .brand-text p  { font-style:italic; color:#9b8241de; margin:0; font-size:12px; }
    .header-right { display:flex; align-items:center; gap:20px; }
    .header-right a { color:#1d99a6; text-decoration:none; font-size:14px; font-weight:500; transition:0.3s; }
    .header-right a:hover { color:#9b8241de; }
    .back-btn { background:#1d99a6; color:white !important; padding:8px 18px; border-radius:20px; font-size:13px; }
    .back-btn:hover { background:#167a85 !important; }

    /* ── HERO STRIP ── */
    .wish-hero {
      background:linear-gradient(135deg,#0e0e0e 0%,#1a1a2e 100%);
      padding:50px 40px 40px;
      position:relative;
      overflow:hidden;
    }
    .wish-hero::before {
      content:'';
      position:absolute;
      top:-60px; right:-60px;
      width:300px; height:300px;
      border-radius:50%;
      background:rgba(29,153,166,0.08);
    }
    .wish-hero::after {
      content:'';
      position:absolute;
      bottom:-80px; left:10%;
      width:200px; height:200px;
      border-radius:50%;
      background:rgba(155,130,65,0.06);
    }
    .wish-hero h1 { color:white; font-size:36px; font-weight:700; margin-bottom:8px; }
    .wish-hero h1 span { color:#1d99a6; }
    .wish-hero p { color:#aaa; font-size:15px; margin:0; }
    .wish-hero .count-pill {
      display:inline-block;
      background:rgba(29,153,166,0.15);
      border:1px solid rgba(29,153,166,0.4);
      color:#1d99a6;
      padding:4px 16px;
      border-radius:20px;
      font-size:13px;
      font-weight:600;
      margin-top:15px;
    }

    /* ── MAIN WRAP ── */
    .main-wrap { max-width:1300px; margin:0 auto; padding:35px 20px 60px; }

    /* ── FILTER BAR ── */
    .filter-bar {
      background:white;
      border-radius:12px;
      padding:16px 24px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      flex-wrap:wrap;
      gap:12px;
      box-shadow:0 2px 10px rgba(0,0,0,0.05);
      margin-bottom:28px;
    }
    .filter-bar .left { display:flex; align-items:center; gap:12px; flex-wrap:wrap; }
    .filter-chip {
      padding:6px 16px;
      border-radius:20px;
      border:1px solid #ddd;
      background:white;
      font-size:13px;
      cursor:pointer;
      transition:0.3s;
      color:#555;
    }
    .filter-chip.active, .filter-chip:hover { background:#1d99a6; color:white; border-color:#1d99a6; }
    .clear-all-btn {
      background:transparent;
      border:1px solid #e74c3c;
      color:#e74c3c;
      padding:6px 16px;
      border-radius:20px;
      font-size:13px;
      cursor:pointer;
      transition:0.3s;
    }
    .clear-all-btn:hover { background:#e74c3c; color:white; }

    /* ── WISH CARD ── */
    .wish-card {
      background:white;
      border-radius:14px;
      overflow:hidden;
      box-shadow:0 4px 16px rgba(0,0,0,0.07);
      transition:all 0.3s ease;
      border:none;
      height:100%;
    }
    .wish-card:hover {
      transform:translateY(-6px);
      box-shadow:0 12px 30px rgba(0,0,0,0.12);
    }
    .wish-card .img-wrap { position:relative; overflow:hidden; }
    .wish-card .img-wrap img {
      width:100%;
      height:220px;
      object-fit:cover;
      transition:transform 0.5s ease;
      cursor:zoom-in;
    }
    .wish-card:hover .img-wrap img { transform:scale(1.06); }

    .category-badge {
      position:absolute;
      top:12px; left:12px;
      background:rgba(29,153,166,0.9);
      color:white;
      font-size:11px;
      padding:4px 12px;
      border-radius:20px;
      font-weight:600;
      letter-spacing:0.5px;
      text-transform:capitalize;
      backdrop-filter:blur(4px);
    }
    .remove-overlay {
      position:absolute;
      top:10px; right:10px;
      width:34px; height:34px;
      background:white;
      border:none;
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      cursor:pointer;
      box-shadow:0 2px 8px rgba(0,0,0,0.15);
      transition:0.3s;
      color:#e74c3c;
      font-size:14px;
      text-decoration:none;
    }
    .remove-overlay:hover { background:#e74c3c; color:white; transform:scale(1.1); }

    .wish-card .card-body { padding:18px; }
    .wish-card .card-body h6 {
      font-size:15px;
      font-weight:600;
      color:#222;
      margin-bottom:6px;
      line-height:1.4;
    }
    .wish-card .cat-label {
      font-size:12px;
      color:#1d99a6;
      font-weight:500;
      text-transform:capitalize;
      margin-bottom:14px;
    }
    .wish-card .card-actions { display:flex; gap:8px; }
    .btn-consult {
      flex:1;
      padding:8px 0;
      border:1px solid #1d99a6;
      color:#1d99a6;
      background:transparent;
      border-radius:8px;
      font-size:12px;
      font-weight:500;
      transition:0.3s;
      text-decoration:none;
      text-align:center;
    }
    .btn-consult:hover { background:#1d99a6; color:white; }
    .btn-remove {
      flex:1;
      padding:8px 0;
      border:1px solid #e74c3c;
      color:#e74c3c;
      background:transparent;
      border-radius:8px;
      font-size:12px;
      font-weight:500;
      transition:0.3s;
      text-decoration:none;
      text-align:center;
    }
    .btn-remove:hover { background:#e74c3c; color:white; }

    /* ── EMPTY STATE ── */
    .empty-state {
      text-align:center;
      padding:100px 20px;
      background:white;
      border-radius:16px;
      box-shadow:0 4px 16px rgba(0,0,0,0.05);
    }
    .empty-state .heart-icon {
      width:90px; height:90px;
      background:linear-gradient(135deg,#f8f8f8,#e8f7f8);
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      margin:0 auto 25px;
      border:2px dashed #1d99a6;
    }
    .empty-state .heart-icon i { font-size:36px; color:#1d99a6; }
    .empty-state h4 { font-size:22px; font-weight:700; color:#222; margin-bottom:10px; }
    .empty-state p { color:#888; font-size:15px; margin-bottom:30px; }
    .explore-btn {
      background:#1d99a6;
      color:white;
      padding:12px 32px;
      border-radius:30px;
      text-decoration:none;
      font-size:14px;
      font-weight:500;
      transition:0.3s;
      display:inline-block;
    }
    .explore-btn:hover { background:#167a85; color:white; transform:translateY(-2px); }

    /* ── LIGHTBOX ── */
    #lightbox { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.9); z-index:9999; align-items:center; justify-content:center; flex-direction:column; }
    #lightbox.show { display:flex; }
    #lightbox img { max-width:85vw; max-height:80vh; border-radius:12px; }
    #lightbox-close { position:absolute; top:20px; right:30px; color:white; font-size:32px; cursor:pointer; background:none; border:none; }
    #lightbox p { color:#ccc; margin-top:15px; font-size:14px; }

    /* ── TOAST ── */
    #toast { position:fixed; bottom:30px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #1d99a6; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }

    /* ── FOOTER ── */
    .footer-dark { background:#0e0e0e; color:#ccc; padding:50px 25px 20px; margin-top:0; }
    .footer-wrapper { display:grid; grid-template-columns:repeat(5,1fr); gap:30px; }
    .footer-box h4 { color:#fff; font-size:16px; margin-bottom:15px; }
    .footer-box ul { list-style:none; padding:0; margin:0; }
    .footer-box ul li { margin-bottom:8px; font-size:13px; }
    .footer-box ul li a { color:#aaa; text-decoration:none; transition:0.3s; }
    .footer-box ul li a:hover { color:#1d99a6; }
    .footer-box p { font-size:13px; margin-bottom:8px; }
    .social-icons a { display:inline-flex; width:34px; height:34px; background:#1c1c1c; color:#fff; align-items:center; justify-content:center; border-radius:50%; margin-right:6px; transition:0.3s; font-size:13px; margin-top:10px; }
    .social-icons a:hover { background:#1d99a6; color:#000; transform:translateY(-3px); }
    .footer-bottom { text-align:center; margin-top:30px; font-size:12px; color:#1d99a6; border-top:1px solid #1d99a6; padding-top:15px; }
    @media (max-width:992px) { .footer-wrapper { grid-template-columns:repeat(2,1fr); } }
    @media (max-width:576px) {
      .footer-wrapper { grid-template-columns:repeat(2,1fr); }
      .wish-hero h1 { font-size:26px; }
      .top-header { padding:0 16px; }
      .filter-bar { padding:12px 16px; }
    }
  </style>
</head>
<body>

<div class="top-line"></div>

<!-- HEADER -->
<header class="top-header">
  <a href="index.php" class="brand">
    <img src="<?= IMG_URL ?>Modern Interior Design Logo.png" width="55" alt="Logo">
    <div class="brand-text">
      <h4>Luminor Maison</h4>
      <p>Interior Design</p>
    </div>
  </a>
  <div class="header-right">
    <a href="Mainpg.php"><i class="fa-solid fa-compass"></i> Explore</a>
    <a href="Bedroom.php"><i class="fa-solid fa-bed"></i> Bedroom</a>
    <a href="kitchen.php"><i class="fa-solid fa-kitchen-set"></i> Kitchen</a>
    <a href="user_logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    <a href="Mainpg.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Home</a>
  </div>
</header>

<!-- HERO STRIP -->
<div class="wish-hero">
  <h1>My <span>Wishlist</span></h1>
  <p>Your saved interior design inspirations — all in one place</p>
  <div class="count-pill">
    <i class="fa-solid fa-heart"></i>
    <?= $total ?> <?= $total === 1 ? 'Design Saved' : 'Designs Saved' ?>
  </div>
</div>

<!-- MAIN -->
<div class="main-wrap">

  <?php if ($total === 0): ?>
  <!-- EMPTY STATE -->
  <div class="empty-state">
    <div class="heart-icon"><i class="fa-regular fa-heart"></i></div>
    <h4>Your wishlist is empty</h4>
    <p>Browse our premium interior designs and save the ones you love</p>
    <a href="Mainpg.php" class="explore-btn"><i class="fa-solid fa-compass"></i> &nbsp; Explore Designs</a>
  </div>

  <?php else: ?>

  <!-- FILTER BAR -->
  <div class="filter-bar">
    <div class="left">
      <span style="font-size:14px;font-weight:600;color:#222;">Filter by:</span>
      <button class="filter-chip active" onclick="filterCategory('all', this)">All</button>
      <?php
        // Dynamic category chips
        $catRes = mysqli_query($conn, "SELECT DISTINCT category FROM wishlist WHERE user_id='$user_id'");
        while ($cat = mysqli_fetch_assoc($catRes)):
          if ($cat['category']):
      ?>
        <button class="filter-chip" onclick="filterCategory('<?= htmlspecialchars($cat['category']) ?>', this)">
          <?= ucfirst(htmlspecialchars($cat['category'])) ?>
        </button>
      <?php endif; endwhile; ?>
    </div>
    <a href="wishlist_toggle.php?clear_all=1&uid=<?= $user_id ?>"
       class="clear-all-btn"
       onclick="return confirm('Saari wishlist clear karein?')">
      <i class="fa-solid fa-trash"></i> Clear All
    </a>
  </div>

  <!-- GRID -->
  <div class="row g-4" id="wishGrid">
    <?php
    // Reset pointer
    mysqli_data_seek($items, 0);
    while ($item = mysqli_fetch_assoc($items)):
      $cat   = htmlspecialchars($item['category'] ?? 'general');
      $name  = htmlspecialchars($item['product_name']);
      $img   = ADMIN_IMG . htmlspecialchars($item['product_image']);
    ?>
    <div class="col-6 col-md-4 col-lg-3 wish-item" data-category="<?= $cat ?>">
      <div class="wish-card">
        <div class="img-wrap">
          <span class="category-badge"><?= $cat ?></span>
          <a href="wishlist_toggle.php?remove=<?= $item['id'] ?>"
             class="remove-overlay"
             title="Remove from wishlist"
             onclick="return confirm('Remove this design?')">
            <i class="fa-solid fa-trash"></i>
          </a>
          <img src="<?= $img ?>"
               alt="<?= $name ?>"
               onclick="openLight('<?= $img ?>', '<?= $name ?>')"
               onerror="this.src='https://placehold.co/400x220?text=No+Image'">
        </div>
        <div class="card-body">
          <h6><?= $name ?></h6>
          <p class="cat-label"><i class="fa-solid fa-tag"></i> <?= $cat ?></p>
          <div class="card-actions">
            <a href="contact.php" class="btn-consult">
              <i class="fa-solid fa-phone"></i> Consult
            </a>
            <a href="wishlist_toggle.php?remove=<?= $item['id'] ?>"
               class="btn-remove"
               onclick="return confirm('Remove?')">
              <i class="fa-solid fa-heart-crack"></i> Remove
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

  <?php endif; ?>
</div>

<!-- LIGHTBOX -->
<div id="lightbox">
  <button id="lightbox-close" onclick="closeLight()">&#x2715;</button>
  <img id="lightbox-img" src="">
  <p id="lightbox-caption"></p>
</div>

<!-- TOAST -->
<div id="toast"></div>

<!-- FOOTER -->
<footer class="footer-dark">
  <div class="footer-wrapper">
    <div class="footer-box">
      <h4>Company</h4>
      <ul>
        <li><a href="contact.php">About Us</a></li>
        <li><a href="furniture.php">Design Experts</a></li>
        <li><a href="Designtips.php">Blog</a></li>
      </ul>
    </div>
    <div class="footer-box">
      <h4>Explore</h4>
      <ul>
        <li><a href="contact.php">Free Consultation</a></li>
        <li><a href="working.php">Offers</a></li>
        <li><a href="contact.php">Help Center</a></li>
      </ul>
    </div>
    <div class="footer-box">
      <h4>Locations</h4>
      <ul>
        <li><a href="#">Bhopal</a></li>
        <li><a href="#">Mumbai</a></li>
        <li><a href="#">Bengaluru</a></li>
        <li><a href="#">Pune</a></li>
      </ul>
    </div>
    <div class="footer-box">
      <h4>Services</h4>
      <ul>
        <li><a href="Mainpg.php">Home Interiors</a></li>
        <li><a href="kitchen.php">Modular Kitchen</a></li>
        <li><a href="Bedroom.php">Bedroom Design</a></li>
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
    <p>© 2026 Luminor Maison | All Rights Reserved</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter by category
  function filterCategory(cat, btn) {
    document.querySelectorAll('.filter-chip').forEach(function(c) { c.classList.remove('active'); });
    btn.classList.add('active');
    document.querySelectorAll('.wish-item').forEach(function(item) {
      if (cat === 'all' || item.getAttribute('data-category') === cat) {
        item.style.display = '';
      } else {
        item.style.display = 'none';
      }
    });
  }

  // Lightbox
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
  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLight();
  });
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLight();
  });
</script>
</body>
</html>