<?php
include 'admin_header.php';
include 'config.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id    = intval($_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
    $desc  = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $img   = handleUpload('image', $uploadDir, $_POST['current_image']);
    $img   = mysqli_real_escape_string($conn, $img);
    mysqli_query($conn, "UPDATE site_images SET title='$title', description='$desc', image='$img' WHERE id=$id");
    $msg = '✅ Updated successfully!';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Homepage Images</title>
  <?php adminCSS(); ?>
</head>
<body>
<?php adminNav('admin_homepage'); ?>
<div class="wrap">
  <div class="page-head"><h1>🏠 Homepage Image Manager</h1></div>
  <?php if ($msg) echo "<div class='msg'>$msg</div>"; ?>

  <div class="sec-title">📦 4 Design Cards</div>
  <div class="grid">
  <?php
  $rows = mysqli_query($conn, "SELECT * FROM site_images WHERE page='homepage' AND section='card' ORDER BY sort_order");
  while ($r = mysqli_fetch_assoc($rows)):
  ?>
  <div class="icard">
    <img src="<?= ADMIN_IMG . htmlspecialchars($r['image']) ?>"
         onerror="this.src='https://placehold.co/220x140?text=No+Image'">
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $r['id'] ?>">
      <input type="hidden" name="current_image" value="<?= htmlspecialchars($r['image']) ?>">
      <label>Title</label>
      <input type="text" name="title" value="<?= htmlspecialchars($r['title']) ?>">
      <label>Description</label>
      <input type="text" name="description" value="<?= htmlspecialchars($r['description']) ?>">
      <label>New Image</label>
      <input type="file" name="image" accept="image/*">
      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
  <?php endwhile; ?>
  </div>

  <div class="sec-title">🖼️ Last Section Image</div>
  <div class="grid">
  <?php
  $last = mysqli_query($conn, "SELECT * FROM site_images WHERE page='homepage' AND section='last_section' LIMIT 1");
  $r = mysqli_fetch_assoc($last);
  ?>
  <div class="icard">
    <img src="<?= ADMIN_IMG . htmlspecialchars($r['image']) ?>"
         onerror="this.src='https://placehold.co/220x140?text=No+Image'">
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $r['id'] ?>">
      <input type="hidden" name="current_image" value="<?= htmlspecialchars($r['image']) ?>">
      <input type="hidden" name="title" value="">
      <input type="hidden" name="description" value="">
      <label>New Image Upload</label>
      <input type="file" name="image" accept="image/*">
      <button type="submit" class="btn-save">💾 Save</button>
    </form>
  </div>
  </div>
</div>
</body>
</html>