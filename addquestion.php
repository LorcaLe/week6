<?php
if (isset($_POST['text'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $imageFileName = null;

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = __DIR__ . '/images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imageFileName = time() . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageFileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            } else {
                $imageFileName = null;
            }
        }
        $sql = 'INSERT INTO question (text, date, img, userid)
                VALUES (:text, CURDATE(), :img, userid = 1)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['text']);
        $stmt->bindValue(':img', $imageFileName);
        $stmt->execute();

        header('location: questions.php');
        exit;
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a new Question';
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>
