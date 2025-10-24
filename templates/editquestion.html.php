<form action="" method="post">
    <input type="hidden" name="questionid" value="<?= $question['id'] ?>">
    <label for="text">Question text:</label><br>
    <textarea name="text" rows="5" cols="40">
    <?=$question['text']?>
    </textarea>
    <input type="submit" name="submit" value="Save">
</form>