<?php
if (isset($_POST['text'])) {
    try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunction.php';
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
        insertQuestion($pdo, $_POST['text'], $_POST['moduleid'], $_POST['userid'], $imageFileName);

        header('location: questions.php');
        exit;
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';
    $title = 'Add a new Question';
    $modules = allModules($pdo);
    $users = allUsers($pdo);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>
