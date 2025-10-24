<?php foreach ($questions as $question): ?>
  <blockquote>
    <?php if (!empty($question['img'])): ?>
      <img src="images/<?= htmlspecialchars($question['img']) ?>"
           alt="Question image"
           style="max-width:200px; display:block; margin-bottom:10px;">
    <?php endif; ?>

    <p><?= htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8') ?></p>

    (by <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
      <?= htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8') ?></a>)

    <a href="editquestion.php?id=<?= $question['id'] ?>">Edit</a>

    <form action="deletequestion.php" method="post">
      <input type="hidden" name="id" value="<?= $question['id'] ?>">
      <input type="submit" value="Delete">
    </form>
  </blockquote>
<?php endforeach; ?>
