<?php
include __DIR__ . '/includes/db.php';

// INSERIMENTO DATI NEL DB QUANDO IL FORM VIENE INVIATO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];

    $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titolo, $autore, $anno_pubblicazione, $genere]);
}

include __DIR__ . '/includes/init.php'; ?>
<div  class="header">
    <h5 class="text-center">Did you just finish reading a book that you wish more people knew about?</h5>
    <h5 class="text-center">Have you been forced to read a book that you would never have read and it shocked you to the point that you can't get it out of your head?</h5>
    <h3 class="text-center">#SharingIsCaring</h3>
</div>

    <h1 class="text-center">Add a book to our library</h1>
    <h3 class="text-center">So that you can inspire fellow readers</h3>
    <form method="post">
        <label for="titolo">Title:</label><br>
        <input type="text" id="titolo" name="titolo"><br>
        <label for="autore">Author:</label><br>
        <input type="text" id="autore" name="autore"><br>
        <label for="anno_pubblicazione">Published:</label><br>
        <input type="text" id="anno_pubblicazione" name="anno_pubblicazione"><br>
        <label for="genere">Genre:</label><br>
        <input type="text" id="genere" name="genere"><br><br>
        <label for="copertina">Cover:</label><br>
        <input type="text" id="copertina" name="copertina"><br><br>
        <input type="submit" value="Add">
    </form>