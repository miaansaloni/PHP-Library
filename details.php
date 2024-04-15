<?php
include __DIR__ . '/includes/db.php';

$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$line = $stmt->fetch();

include __DIR__ . '/includes/init.php'?>

<div class="row pt-5">
<div class="col-lg-8">
    <div class="card">
    <h1><?= $line['titolo'] ?></h1>
    <h2><?= $line['autore'] ?></h2>
        <img class="img-fluid" src=<?="$line[copertina]"?> alt="">
    </div>
</div>
<div class="col-lg-4 p-5">
    <p class="m-0"><span class="fw-bold">Published in:</span> <?= $line['anno_pubblicazione'] ?></p>
    <p class="m-0"><span class="fw-bold">Genre:</span> <?= $line['genere'] ?></p>
</div>
</div><?php
include __DIR__ . '/includes/end.php';