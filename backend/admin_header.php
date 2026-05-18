<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

$uploadDir = '../admin_image/'; // physical write path — sahi hai

function handleUpload($fileKey, $uploadDir, $currentImage) {
    if (!empty($_FILES[$fileKey]['name']) && $_FILES[$fileKey]['error'] === 0) {
        $allowed = ['jpg','jpeg','png','webp','gif'];
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) return $currentImage;
        $newName = 'img_' . time() . '_' . rand(100, 999) . '.' . $ext;
        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $uploadDir . $newName)) {
            return $newName; // ✅ sirf filename DB mein save hoga
        }
    }
    return $currentImage;
}

function adminNav($active = '') {
    $pages = [
        'admin_homepage'   => '🏠 Homepage',
        'admin_bedroom'    => '🛏️ Bedroom',
        'admin_kitchen'    => '🍳 Kitchen',
        'admin_furniture'  => '🪑 Furniture',
        'admin_designtips' => '📝 Design Tips',
        'admin_working'    => '⚙️ Working',
    ];
    echo '<nav class="top-nav">
    <div class="logo-area"><h2>LUMINOR MANSION <span style="font-weight:300;font-size:14px;">ADMIN</span></h2></div>
    <div class="nav-links">
    <a href="dashboard.php">Dashboard</a>';
    foreach ($pages as $file => $label) {
        $cls = ($active === $file) ? 'style="color:#9b8241de;"' : '';
        echo "<a href='{$file}.php' {$cls}>{$label}</a>";
    }
    echo '<a href="logout.php" class="logout-link">Logout</a>
    </div></nav>';
}

function adminCSS() {
    echo '
    <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:Segoe UI,Roboto,sans-serif; }
    body { background:#f4f7f6; }
    .top-nav { background:#1d99a6; padding:0 40px; height:70px; display:flex; justify-content:space-between; align-items:center; color:white; box-shadow:0 2px 10px rgba(0,0,0,0.1); position:sticky; top:0; z-index:1000; }
    .logo-area h2 { font-size:18px; letter-spacing:1px; border-left:4px solid #9b8241de; padding-left:12px; }
    .nav-links { display:flex; gap:20px; align-items:center; flex-wrap:wrap; }
    .nav-links a { color:white; text-decoration:none; font-size:13px; font-weight:500; transition:0.3s; }
    .nav-links a:hover { color:#9b8241de; }
    .logout-link { background:#000; padding:6px 16px; border-radius:4px; border:1px solid #9b8241de; }
    .wrap { max-width:1300px; margin:25px auto; padding:0 20px; }
    .page-head { background:white; padding:20px 25px; border-radius:12px; margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 8px rgba(0,0,0,0.05); }
    .page-head h1 { font-size:20px; color:#222; }
    .msg { background:#d4edda; color:#155724; padding:12px 18px; border-radius:8px; margin-bottom:18px; font-weight:600; border-left:4px solid #28a745; }
    .sec-title { background:#1d99a6; color:white; padding:10px 18px; border-radius:8px; margin:20px 0 14px; font-weight:600; font-size:14px; }
    .grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px; }
    .icard { background:white; border-radius:10px; padding:14px; box-shadow:0 3px 10px rgba(0,0,0,0.07); border-top:3px solid #1d99a6; }
    .icard img { width:100%; height:140px; object-fit:cover; border-radius:7px; margin-bottom:10px; }
    .icard label { font-size:11px; font-weight:600; color:#666; display:block; margin-bottom:2px; }
    .icard input,.icard textarea,.icard select { width:100%; padding:6px 9px; border:1px solid #ddd; border-radius:6px; font-size:12px; margin-bottom:7px; }
    .icard input[type=file] { border:1px dashed #1d99a6; padding:5px; }
    .btn-save { width:100%; padding:8px; background:#1d99a6; color:white; border:none; border-radius:7px; font-weight:600; cursor:pointer; margin-bottom:5px; font-size:13px; }
    .btn-save:hover { background:#167a85; }
    .btn-del { width:100%; padding:6px; background:#e74c3c; color:white; border:none; border-radius:7px; font-weight:600; cursor:pointer; font-size:12px; }
    .btn-del:hover { background:#c0392b; }
    .add-box { background:white; border-radius:10px; padding:20px; border:2px dashed #1d99a6; margin-top:20px; }
    .add-box h3 { color:#1d99a6; font-size:15px; margin-bottom:14px; }
    .add-grid { display:grid; gap:10px; }
    .add-grid input,.add-grid select { padding:8px 10px; border:1px solid #ddd; border-radius:7px; font-size:13px; width:100%; }
    .add-grid input[type=file] { border:1px dashed #1d99a6; }
    .cmeta { font-size:10px; color:#999; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px; }
    </style>';
}
?>