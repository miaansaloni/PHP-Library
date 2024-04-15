<?php
include __DIR__ . '/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];

    $stmt = $pdo->prepare("UPDATE libri SET titolo=?, autore=?, anno_pubblicazione=?, genere=? WHERE id=?");
    $stmt->execute([$titolo, $autore, $anno_pubblicazione, $genere, $id]);

    header("Location: /PHP-Library/");
    exit();
}

// RECUPERO DEI DATI DA MODIFICARE
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM libri WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();


include __DIR__ . '/includes/init.php'
?>


<form method="post">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label for="titolo">Title:</label><br>
    <input type="text" id="titolo" name="titolo" value="<?= $user['titolo'] ?>"><br>
    <label for="autore">Author:</label><br>
    <input type="text" id="autore" name="autore" value="<?= $user['autore'] ?>"><br>
    <label for="anno_pubblicazione">Published:</label><br>
    <input type="text" id="anno_pubblicazione" name="anno_pubblicazione" value="<?= $user['anno_pubblicazione'] ?>"><br>
    <label for="genere">Genre:</label><br>
    <input type="text" id="genere" name="genere" value="<?= $user['genere'] ?>"><br><br>
    <button type="submit" class="btn edit-btn">Edit</button>
</form><?php
include __DIR__ . '/includes/end.php';