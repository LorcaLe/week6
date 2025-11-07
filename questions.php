<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunction.php';

    $questions = allQuestions($pdo);
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