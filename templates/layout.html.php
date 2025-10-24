<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="questions.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Student Forum</h1></header>
        <nav>
            <ul>
                <a href="index.php">Home</a>
                <a href="questions.php">Questions List</a>
                <a href="addquestion.php">Add Question</a>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; Student Forum</footer>
    </body>
</html>