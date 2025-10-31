<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    $sql = 'SELECT question.id, `text`, `date`, img, `name`, email, moduleName FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id ORDER BY question.id DESC';


    $questions = $pdo->query($sql);
    $title = 'Question List';
    $totalQuestion = totalQuestion($pdo);
    
    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>