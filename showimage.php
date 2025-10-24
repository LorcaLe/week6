<?php
include 'includes/DatabaseConnection.php';
$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare('SELECT img FROM question WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$row = $stmt->fetch();
if ($row && !empty($row['image'])) {
    header('Content-Type: image/jpeg');
    echo $row['image'];
}
?>
