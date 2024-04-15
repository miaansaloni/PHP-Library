<?php
include __DIR__ . '/includes/db.php';

$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/init.php'?>

    <h1><?= $row['titolo'] ?></h1>
    <h2><?= $row['autore'] ?></h2>
    <p><?= $row['anno_pubblicazione'] ?></p>
    <p><?= $row['genere'] ?></p><?php
    
include __DIR__ . '/includes/end.php';