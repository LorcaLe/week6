<form action="" method="post" enctype="multipart/form-data">
  <label for="text">Question text:</label><br>
  <textarea name="text" rows="5" cols="40"></textarea><br>

  <label for="image">Select image:</label><br>
  <input type="file" name="image" accept="image/*"><br><br>

  <select name="moduleid">
    <option value="">Select a Module</option>
    <?php foreach ($modules as $module): ?>
      <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8') ?>
      </option>
    <?php endforeach; ?>
  </select>

  <select name="userid">
    <option value="">Select a User</option>
    <?php foreach ($users as $user): ?>
      <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
      </option>
    <?php endforeach; ?>
  </select>

  <input type="submit" value="Add Question">
</form>
