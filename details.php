<?php
include __DIR__ . '/includes/db.php';

$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/init.php'?>

<div class="row">
<div class="col">
    <h1><?= $row['titolo'] ?></h1>
    <h2><?= $row['autore'] ?></h2>
</div>
<div class="col">
    <p class="m-0"><span class="fw-bold">Published in:</span> <?= $row['anno_pubblicazione'] ?></p>
    <p class="m-0"><span class="fw-bold">Genre:</span> <?= $row['genere'] ?></p>
</div>
</div><?php
include __DIR__ . '/includes/end.php';