<?php
try {
    include 'includes/DatabaseConnection.php';

    $stmt = $pdo->prepare('SELECT img FROM question WHERE id = :id');
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    $question = $stmt->fetch();

    if ($question && !empty($question['img'])) {
        $imagePath = 'images/' . $question['img'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $stmt = $pdo->prepare('DELETE FROM question WHERE id = :id');
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    header('location: questions.php');
    exit;
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
    include 'templates/layout.html.php';
}
?>
