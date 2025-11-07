<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunction.php';
try{
    if(isset($_POST['text'])){

    updateQuestion($pdo, $_POST['questionid'], $_POST['text']);

        header('location: questions.php');
        exit;
    } else {
        
       
        $question = getQuestion($pdo, $_GET['id']);
        $title = 'Edit Question';
        
        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';