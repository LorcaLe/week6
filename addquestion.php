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
        $sql = 'INSERT INTO question (text, date, img, userid, moduleid)
                VALUES (:text, CURDATE(), :img, :userid, :moduleid)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['text']);
        $stmt->bindValue(':img', $imageFileName);
        $stmt->bindValue(':userid', $_POST['userid']);
        $stmt->bindValue(':moduleid', $_POST['moduleid']);
        $stmt->execute();

        header('location: questions.php');
        exit;
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a new Question';
    include 'includes/DatabaseConnection.php';
    $sql_a = 'SELECT id, moduleName FROM module';
    $modules = $pdo->query($sql_a);
    $sql_b = 'SELECT id, name FROM user';
    $users = $pdo->query($sql_b);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>
