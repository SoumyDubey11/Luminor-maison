<?php include 'Auth_check.php'; ?>
<?php include 'db.php'; ?>
<?php include 'config.php'; ?>

<?php
// Saara working page data ek baar fetch
$workingData = [];
$res = mysqli_query($conn, "SELECT * FROM site_images WHERE page='working' ORDER BY sort_order ASC");
while ($row = mysqli_fetch_assoc($res)) {
    $workingData[$row['section']][] = $row;
}

// Hero image
$heroRow   = $workingData['hero'][0]    ?? null;
$heroImg   = $heroRow ? ADMIN_IMG . htmlspecialchars($heroRow['image']) : IMG_URL . 'hero.jpg';

// Style grid images (2 images)
$styleImgs = $workingData['style'] ?? [];
$styleImg1 = isset($styleImgs[0]) ? ADMIN_IMG . htmlspecialchars($styleImgs[0]['image']) : IMG_URL . 'White-popup.png';
$styleImg2 = isset($styleImgs[1]) ? ADMIN_IMG . htmlspecialchars($styleImgs[1]['image']) : IMG_URL . 'balcony.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How It Works | Luminor Maison</title>
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

    /* HERO */
    .hero-design { background-size:cover; background-position:center; height:520px; display:flex; align-items:center; justify-content:center; position:relative; }
    .hero-overlay { background:rgba(0,0,0,0.45); padding:60px; text-align:center; color:white; border-radius:10px; }
    .hero-title { font-size:48px; font-weight:700; margin-bottom:15px; }
    .hero-text { font-size:18px; margin-bottom:25px; }
    .hero-btn { background:#1d99a6; color:white; border:none; padding:12px 28px; border-radius:30px; }
    .hero-btn:hover { background:#177f8a; }
    @media(max-width:768px) { .hero-title { font-size:32px; } .hero-design { height:420px; } }

    /* EXPERIENCE SECTION */
    .design-experience { padding:80px 0; background:linear-gradient(120deg,#ffffff,#f5fbfc); }
    .exp-title { font-size:38px; font-weight:700; margin-bottom:15px; color:#222; }
    .exp-text { max-width:700px; margin:auto; color:#666; line-height:1.7; }
    .exp-box { padding:30px 25px; border-radius:12px; background:white; box-shadow:0 10px 30px rgba(0,0,0,0.06); transition:.4s; }
    .exp-box i { font-size:34px; color:#1d99a6; margin-bottom:15px; }
    .exp-box h5 { font-weight:600; margin-bottom:10px; }
    .exp-box p { font-size:14px; color:#666; }
    .exp-box:hover { transform:translateY(-10px); box-shadow:0 20px 40px rgba(0,0,0,0.12); }
    .explore-btn { background:#1d99a6; color:white; border:none; padding:12px 28px; border-radius:30px; }
    .explore-btn:hover { background:#177f8a; color:white; }

    /* STYLE SECTION */
    .style-title { font-size:38px; font-weight:700; margin-bottom:20px; }
    .style-text { color:#666; line-height:1.7; margin-bottom:18px; }
    .style-btn { background:#1d99a6; color:white; border:none; padding:12px 26px; border-radius:30px; }
    .style-btn:hover { background:#177f8a; }
    .style-img-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
    .style-img { height:320px; width:100%; object-fit:cover; border-radius:12px; }
    @media(max-width:768px) { .style-img-grid { grid-template-columns:1fr; } .style-img { height:250px; } }

    /* FOOTER */
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

    /* BREADCRUMB */
    .breadcrumb-bar { background:#f8f8f8; border-bottom:1px solid #eee; padding:10px 0; font-size:13px; color:#888; }
    .breadcrumb-bar a { color:#1d99a6; text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }
    .breadcrumb-bar span { margin:0 6px; color:#bbb; }

    /* HOW IT WORKS */
    .how-section { background:#f4f8f9; padding:70px 0; }
    .how-section h2 { font-size:36px; font-weight:700; color:#222; margin-bottom:10px; }
    .how-section p.sub { color:#888; font-size:15px; margin-bottom:50px; }
    .step-card { background:white; border-radius:14px; padding:30px 20px; text-align:center; box-shadow:0 6px 20px rgba(0,0,0,0.07); transition:0.3s; position:relative; }
    .step-card:hover { transform:translateY(-8px); box-shadow:0 15px 35px rgba(0,0,0,0.12); }
    .step-num { width:52px; height:52px; background:#1d99a6; color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700; margin:0 auto 18px auto; }
    .step-card i { font-size:30px; color:#1d99a6; margin-bottom:12px; display:block; }
    .step-card h5 { font-weight:700; margin-bottom:8px; }
    .step-card p { font-size:14px; color:#666; }
    .step-arrow { font-size:24px; color:#1d99a6; display:flex; align-items:center; justify-content:center; padding-top:20px; }
    @media (max-width:768px) { .step-arrow { display:none; } }

    /* FAQ */
    .faq-section { padding:70px 0; }
    .faq-section h2 { font-size:34px; font-weight:700; color:#222; margin-bottom:8px; }
    .faq-section p.sub { color:#888; margin-bottom:35px; }
    .faq-item { background:white; border-radius:10px; margin-bottom:12px; box-shadow:0 3px 10px rgba(0,0,0,0.06); overflow:hidden; }
    .faq-question { width:100%; background:white; border:none; padding:18px 22px; text-align:left; font-size:15px; font-weight:600; color:#222; cursor:pointer; display:flex; justify-content:space-between; align-items:center; transition:0.3s; }
    .faq-question:hover { color:#1d99a6; }
    .faq-question .icon { font-size:18px; color:#1d99a6; transition:transform 0.3s; }
    .faq-question.open .icon { transform:rotate(45deg); }
    .faq-answer { display:none; padding:0 22px 18px; font-size:14px; color:#666; line-height:1.7; border-top:1px solid #f0f0f0; }
    .faq-answer.open { display:block; }

    /* SCROLL TOP */
    #scrollTopBtn { position:fixed; bottom:30px; right:25px; width:45px; height:45px; background:#1d99a6; color:white; border:none; border-radius:50%; font-size:18px; cursor:pointer; display:none; align-items:center; justify-content:center; z-index:999; box-shadow:0 4px 15px rgba(29,153,166,0.4); transition:0.3s; }
    #scrollTopBtn:hover { background:black; transform:translateY(-3px); }

    /* TOAST */
    #toast { position:fixed; bottom:85px; right:25px; background:#1a1a1a; color:white; padding:12px 20px; border-radius:8px; font-size:13px; z-index:9999; border-left:3px solid #1d99a6; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
    #toast.show { opacity:1; transform:translateY(0); }
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
    <a href="index.php">Home</a><span>›</span>
    How It Works
  </div>
</div>

<!-- HERO — Dynamic background image -->
<section class="hero-design" style="background-image: url('<?= $heroImg ?>');">
  <div class="hero-overlay">
    <h1 class="hero-title">Find the Interior Style That Fits Your Home</h1>
    <p class="hero-text">Explore creative design ideas that match your personality, space and comfort preferences.</p>
    <a href="Designtips.php">
      <button class="btn hero-btn">Start Exploring Designs</button>
    </a>
  </div>
</section>

<!-- HOW IT WORKS STEPS — same as original -->
<section class="how-section">
  <div class="container text-center">
    <h2>How It Works</h2>
    <p class="sub">Simple 4 steps se apna dream home banao</p>

    <div class="row align-items-center g-3">
      <div class="col-md-2 col-6">
        <div class="step-card">
          <div class="step-num">1</div>
          <i class="fa-solid fa-phone"></i>
          <h5>Book Consultation</h5>
          <p>Free consultation ke liye call ya form fill karo</p>
        </div>
      </div>
      <div class="col-md-1 step-arrow">›</div>
      <div class="col-md-2 col-6">
        <div class="step-card">
          <div class="step-num">2</div>
          <i class="fa-solid fa-compass-drafting"></i>
          <h5>Get Design Plan</h5>
          <p>Expert designer tumhara personalized plan banayega</p>
        </div>
      </div>
      <div class="col-md-1 step-arrow">›</div>
      <div class="col-md-2 col-6">
        <div class="step-card">
          <div class="step-num">3</div>
          <i class="fa-solid fa-check-double"></i>
          <h5>Approve & Start</h5>
          <p>Design approve karo aur kaam shuru ho jaayega</p>
        </div>
      </div>
      <div class="col-md-1 step-arrow">›</div>
      <div class="col-md-2 col-6">
        <div class="step-card">
          <div class="step-num">4</div>
          <i class="fa-solid fa-house-chimney"></i>
          <h5>Move In!</h5>
          <p>50 working days mein apna dream home ready</p>
        </div>
      </div>
    </div>

    <a href="contact.php">
      <button class="btn explore-btn mt-5" onclick="showToast('📞 Redirecting to consultation...')">
        Book Free Consultation
      </button>
    </a>
  </div>
</section>

<!-- EXPERIENCE SECTION — same as original -->
<section class="design-experience">
  <div class="container text-center">
    <h2 class="exp-title">Design a Home That Reflects Your Style</h2>
    <p class="exp-text">Transform ordinary spaces into beautiful interiors with thoughtful design, smart layouts and modern styling ideas.</p>
    <div class="row mt-5 g-4">
      <div class="col-md-4">
        <div class="exp-box">
          <i class="fa-solid fa-compass-drafting"></i>
          <h5>Smart Space Planning</h5>
          <p>Optimize every corner of your home with intelligent layout planning and functional design ideas.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="exp-box">
          <i class="fa-solid fa-palette"></i>
          <h5>Elegant Color Styling</h5>
          <p>Create a balanced and stylish interior atmosphere with modern color combinations.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="exp-box">
          <i class="fa-solid fa-lightbulb"></i>
          <h5>Modern Lighting Ideas</h5>
          <p>Enhance ambience and comfort using layered lighting and contemporary fixtures.</p>
        </div>
      </div>
    </div>
    <a href="furniture.php">
      <button class="btn explore-btn mt-5">Explore More Interior Ideas</button>
    </a>
  </div>
</section>

<!-- STYLE SECTION — Dynamic images -->
<section class="design-style container my-5">
  <div class="row align-items-center g-5">
    <div class="col-lg-5">
      <h2 class="style-title">Not Sure Which Interior Style Fits You?</h2>
      <p class="style-text">Different homes require different design approaches. Understanding your preferred layout, colors and materials helps create a space that truly feels like home.</p>
      <p class="style-text">From modern minimal interiors to cozy contemporary living spaces, the right style brings comfort and functionality together.</p>
      <a href="Mainpg.php">
        <button class="btn style-btn">Discover Your Style</button>
      </a>
    </div>
    <div class="col-lg-7">
      <div class="style-img-grid">
        <img src="<?= $styleImg1 ?>"
             class="img-fluid style-img"
             onerror="this.src='https://placehold.co/400x320?text=No+Image'">
        <img src="<?= $styleImg2 ?>"
             class="img-fluid style-img"
             onerror="this.src='https://placehold.co/400x320?text=No+Image'">
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION — same as original, JS fixed -->
<section class="faq-section">
  <div class="container">
    <h2 class="text-center">Frequently Asked Questions</h2>
    <p class="sub text-center">Common questions jo homeowners poochte hain</p>

    <div style="max-width:750px;margin:0 auto;">

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
          Kitne time mein design complete ho jaata hai?
          <span class="icon">+</span>
        </button>
        <div class="faq-answer">
          Hamare saath 50 working days mein poora interior design complete ho jaata hai. Hum timeline guarantee karte hain.
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
          Kya free consultation available hai?
          <span class="icon">+</span>
        </button>
        <div class="faq-answer">
          Haan! Pehli consultation bilkul free hai. Hamare expert designer aapke ghar visit karenge aur aapki requirements samjhenge.
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
          Warranty kitne saal ki milti hai?
          <span class="icon">+</span>
        </button>
        <div class="faq-answer">
          Hum sabhi interior work pe 5 saal ki comprehensive warranty dete hain. Koi bhi issue ho to hamare team se contact karo.
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
          Kya EMI option available hai?
          <span class="icon">+</span>
        </button>
        <div class="faq-answer">
          Haan! Hum 0% interest EMI options provide karte hain. Aap apne budget ke hisaab se easy monthly installments mein payment kar sakte hain.
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFaq(this)">
          Kaunse cities mein service available hai?
          <span class="icon">+</span>
        </button>
        <div class="faq-answer">
          Abhi hum Bhopal, Delhi, Bangalore, Mumbai, Hyderabad, Pune aur Chennai mein service dete hain. Jald hi aur cities add honge.
        </div>
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
  // ── SCROLL TO TOP ────────────────────────────
  var scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    scrollBtn.style.display = document.documentElement.scrollTop > 300 ? 'flex' : 'none';
  };
  scrollBtn.onclick = function() { window.scrollTo({ top: 0, behavior: 'smooth' }); };

  // ── TOAST ────────────────────────────────────
  function showToast(msg) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(function() { t.classList.remove('show'); }, 2200);
  }

  // ── FAQ TOGGLE — fixed ────────────────────────
  function toggleFaq(btn) {
    var answer = btn.nextElementSibling;
    var icon   = btn.querySelector('.icon');
    var isOpen = answer.classList.contains('open');

    // Pehle sabhi band karo
    document.querySelectorAll('.faq-answer').forEach(function(a) {
      a.classList.remove('open');
    });
    document.querySelectorAll('.faq-question').forEach(function(q) {
      q.classList.remove('open');
      q.querySelector('.icon').textContent = '+';
    });

    // Agar pehle band tha toh open karo
    if (!isOpen) {
      answer.classList.add('open');
      btn.classList.add('open');
      icon.textContent = '×';
    }
  }

  // ── STEP CARDS hover toast ────────────────────
  document.querySelectorAll('.step-card').forEach(function(card) {
    card.addEventListener('mouseenter', function() {
      var step  = this.querySelector('.step-num').textContent;
      var title = this.querySelector('h5').textContent;
      showToast('Step ' + step + ': ' + title);
    });
  });
</script>
</body>
</html>