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
    } elseif ($action === 'delete') {
        mysqli_query($conn, "DELETE FROM site_images WHERE id=" . intval($_POST['id']));
        $msg = '🗑️ Deleted!';
    } elseif ($action === 'add') {
        $title   = mysqli_real_escape_string($conn, $_POST['title']);
        $desc    = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
        $section = mysqli_real_escape_string($conn, $_POST['section']);
        $img     = mysqli_real_escape_string($conn, handleUpload('image', $uploadDir, ''));
        mysqli_query($conn, "INSERT INTO site_images (page, section, title, description, image) VALUES ('designtips', '$section', '$title', '$desc', '$img')");
        $msg = '✅ Added!';
    }
}

$sections = [
    'tip'     => '💡 Tips (3 main tips)',
    'feature' => '✨ Feature Image',
    'card'    => '📋 Design Cards'
];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Design Tips Images</title>
  <?php adminCSS(); ?>
</head>
<body>
<?php adminNav('admin_designtips'); ?>
<div class="wrap">
  <div class="page-head"><h1>📝 Design Tips Image Manager</h1></div>
  <?php if ($msg) echo "<div class='msg'>$msg</div>"; ?>

  <?php foreach ($sections as $sec => $secTitle): ?>
  <div class="sec-title"><?= $secTitle ?></div>
  <div class="grid">
  <?php
  $rows = mysqli_query($conn, "SELECT * FROM site_images WHERE page='designtips' AND section='$sec' ORDER BY sort_order");
  while ($r = mysqli_fetch_assoc($rows)):
  ?>
  <div class="icard">
    <img src="<?= ADMIN_IMG . htmlspecialchars($r['image']) ?>"
         onerror="this.src='https://placehold.co/220x140?text=No+Image'">
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="update">
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
    <?php if ($sec !== 'feature'): ?>
    <form method="POST">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" value="<?= $r['id'] ?>">
      <button class="btn-del" onclick="return confirm('Delete?')">🗑️ Delete</button>
    </form>
    <?php endif; ?>
  </div>
  <?php endwhile; ?>
  </div>
  <?php endforeach; ?>

  <!-- ADD NEW -->
  <div class="add-box">
    <h3>➕ New Tip / Card</h3>
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="add">
      <div class="add-grid" style="grid-template-columns:1fr 1fr 1fr;">
        <div>
          <label style="font-size:12px;font-weight:600;">Title *</label>
          <input type="text" name="title" required>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Description</label>
          <input type="text" name="description" placeholder="Short tip description">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Section</label>
          <select name="section">
            <option value="tip">Tip (main tips)</option>
            <option value="card">Card</option>
          </select>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Image *</label>
          <input type="file" name="image" accept="image/*" required>
        </div>
        <div style="display:flex;align-items:flex-end;">
          <button type="submit" class="btn-save">➕ Add</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>