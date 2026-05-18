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
        $badge = mysqli_real_escape_string($conn, $_POST['badge'] ?? '');
        $price = mysqli_real_escape_string($conn, $_POST['price'] ?? '');
        $img   = handleUpload('image', $uploadDir, $_POST['current_image']);
        $img   = mysqli_real_escape_string($conn, $img);
        mysqli_query($conn, "UPDATE site_images SET title='$title', description='$desc', badge='$badge', price='$price', image='$img' WHERE id=$id");
        $msg = '✅ Updated!';
    } elseif ($action === 'delete') {
        mysqli_query($conn, "DELETE FROM site_images WHERE id=" . intval($_POST['id']));
        $msg = '🗑️ Deleted!';
    } elseif ($action === 'add') {
        $title   = mysqli_real_escape_string($conn, $_POST['title']);
        $desc    = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
        $badge   = mysqli_real_escape_string($conn, $_POST['badge'] ?? '');
        $price   = mysqli_real_escape_string($conn, $_POST['price'] ?? '');
        $section = mysqli_real_escape_string($conn, $_POST['section']);
        $img     = mysqli_real_escape_string($conn, handleUpload('image', $uploadDir, ''));
        mysqli_query($conn, "INSERT INTO site_images (page, section, title, description, image, badge, price) VALUES ('furniture', '$section', '$title', '$desc', '$img', '$badge', '$price')");
        $msg = '✅ Added!';
    }
}

$sections = [
    'category' => '📦 Categories',
    'feature'  => '✨ Feature Section',
    'product'  => '🛒 Products'
];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Furniture Images</title>
  <?php adminCSS(); ?>
</head>
<body>
<?php adminNav('admin_furniture'); ?>
<div class="wrap">
  <div class="page-head"><h1>🪑 Furniture Image Manager</h1></div>
  <?php if ($msg) echo "<div class='msg'>$msg</div>"; ?>

  <?php foreach ($sections as $sec => $secTitle): ?>
  <div class="sec-title"><?= $secTitle ?></div>
  <div class="grid">
  <?php
  $rows = mysqli_query($conn, "SELECT * FROM site_images WHERE page='furniture' AND section='$sec' ORDER BY sort_order");
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
      <?php if ($sec === 'product'): ?>
        <label>Price</label>
        <input type="text" name="price" value="<?= htmlspecialchars($r['price'] ?? '') ?>">
        <label>Badge</label>
        <select name="badge">
          <option value=""        <?= ($r['badge'] === '')        ? 'selected' : '' ?>>None</option>
          <option value="new"     <?= ($r['badge'] === 'new')     ? 'selected' : '' ?>>✨ New</option>
          <option value="popular" <?= ($r['badge'] === 'popular') ? 'selected' : '' ?>>🔥 Popular</option>
          <option value="sale"    <?= ($r['badge'] === 'sale')    ? 'selected' : '' ?>>🏷️ Sale</option>
        </select>
      <?php else: ?>
        <input type="hidden" name="price" value="">
        <input type="hidden" name="badge" value="">
      <?php endif; ?>
      <label>New Image</label>
      <input type="file" name="image" accept="image/*">
      <button type="submit" class="btn-save">💾 Save</button>
    </form>
    <?php if ($sec === 'product'): ?>
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
    <h3>➕ New Furniture Product</h3>
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="add">
      <div class="add-grid" style="grid-template-columns:1fr 1fr 1fr;">
        <div>
          <label style="font-size:12px;font-weight:600;">Title *</label>
          <input type="text" name="title" required>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Description</label>
          <input type="text" name="description" placeholder="e.g. Premium fabric sofa">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Price</label>
          <input type="text" name="price" placeholder="₹45,000">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Section</label>
          <select name="section">
            <option value="product">Product</option>
            <option value="category">Category</option>
          </select>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;">Badge</label>
          <select name="badge">
            <option value="">None</option>
            <option value="new">✨ New</option>
            <option value="popular">🔥 Popular</option>
            <option value="sale">🏷️ Sale</option>
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