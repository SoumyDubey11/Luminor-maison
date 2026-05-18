<?php
include 'admin_header.php';
include 'config.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'update';

    if ($action === 'update') {
        $id    = intval($_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
        $desc  = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
        $img   = handleUpload('image', $uploadDir, $_POST['current_image']);
        $img   = mysqli_real_escape_string($conn, $img);
        mysqli_query($conn, "UPDATE site_images SET title='$title', description='$desc', image='$img' WHERE id=$id");
        $msg = '✅ Updated!';
    }
}

$sections = [
    'hero'  => '🖼️ Hero Background Image',
    'style' => '🎨 Style Grid Images (2 images)',
];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Working Page Images</title>
  <?php adminCSS(); ?>
</head>
<body>
<?php adminNav('admin_working'); ?>
<div class="wrap">
  <div class="page-head"><h1>⚙️ Working Page Image Manager</h1></div>
  <?php if ($msg) echo "<div class='msg'>$msg</div>"; ?>

  <?php foreach ($sections as $sec => $secTitle): ?>
  <div class="sec-title"><?= $secTitle ?></div>
  <div class="grid">
  <?php
  $rows = mysqli_query($conn, "SELECT * FROM site_images WHERE page='working' AND section='$sec' ORDER BY sort_order");
  while ($r = mysqli_fetch_assoc($rows)):
  ?>
  <div class="icard">
    <div class="cmeta"><?= htmlspecialchars($r['section']) ?> — sort: <?= $r['sort_order'] ?></div>
    <img src="<?= ADMIN_IMG . htmlspecialchars($r['image']) ?>"
         onerror="this.src='https://placehold.co/220x140?text=No+Image'">
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="id" value="<?= $r['id'] ?>">
      <input type="hidden" name="current_image" value="<?= htmlspecialchars($r['image']) ?>">
      <label>Title (optional)</label>
      <input type="text" name="title" value="<?= htmlspecialchars($r['title'] ?? '') ?>">
      <label>Description (optional)</label>
      <input type="text" name="description" value="<?= htmlspecialchars($r['description'] ?? '') ?>">
      <label>New Image</label>
      <input type="file" name="image" accept="image/*">
      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
  <?php endwhile; ?>
  </div>
  <?php endforeach; ?>

  <div style="background:#fff3cd;border-left:4px solid #ffc107;padding:14px 18px;border-radius:8px;margin-top:20px;font-size:13px;color:#856404;">
    ℹ️ <strong>Note:</strong> Hero section mein 1 image chahiye, Style Grid mein 2 images chahiye (sort_order 1 aur 2). Images admin_image/ folder mein save hongi.
  </div>
</div>
</body>
</html>