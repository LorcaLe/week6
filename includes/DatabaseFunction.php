<?php
function totalQuestion($pdo) {
    $query = query ($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}
function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}
function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}
function updateQuestion($pdo, $questionid, $text){
    $query = 'UPDATE question SET text = :text WHERE id = :id';
    $parameters = [':text' => $text, ':id' => $questionid];
    query($pdo, $query, $parameters);
}
function deleteQuestion($pdo, $id){
    $query = 'DELETE FROM question WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, $query, $parameters);
}
function getQuestionImg($pdo, $id) {
    $parameters = [':id' => $id];
    $stmt = query($pdo, 'SELECT img FROM question WHERE id = :id', $parameters);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function insertQuestion($pdo, $text, $moduleid, $userid, $imageFileName) {
    $query = 'INSERT INTO question (text, date, img, userid, moduleid)
    VALUES (:text, CURDATE(), :img, :userid, :moduleid)';   
    $parameters = [
        ':text' => $text,
        ':img' => $imageFileName,
        ':userid' => $userid,
        ':moduleid' => $moduleid
    ];
    query($pdo, $query, $parameters);
}
function allModules($pdo) {
    $modules = query($pdo, 'SELECT id, moduleName FROM module');
    return $modules->fetchAll();
}
function allUsers($pdo) {
    $users = query($pdo, 'SELECT id, name FROM user');
    return $users->fetchAll();
}
function allQuestions($pdo) {
    $questions = query($pdo, 'SELECT question.id, `text`, `date`, img, `name`, email, moduleName FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id ORDER BY question.id DESC');
    return $questions->fetchAll();
}
?>   