<?php
include __DIR__ . '/includes/db.php';

// INSERIMENTO DATI NEL DB QUANDO IL FORM VIENE INVIATO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $copertina = $_POST['copertina'];

    $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titolo, $autore, $anno_pubblicazione, $genere]);
}

include __DIR__ . '/includes/init.php'; ?>
    <div class="headerTop w-100 d-flex flex-column justify-content-end">
    Did you just finish reading a book that you wish more people knew about? <br>
    What are you waiting for?!
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DEAC80" fill-opacity="1" d="M0,96L80,128C160,160,320,224,480,240C640,256,800,224,960,218.7C1120,213,1280,235,1360,245.3L1440,256L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>    <form class="d-flex justify-content-center">

    <div class="text-center">
    <h1>Add a book to our library</h1>
    <h3 class="mb-4">So that you can inspire fellow readers</h3>
    <form method="post">
        <label class="mt-2 fw-bold h6" for="titolo">Title:</label><br>
        <input class="w-75" type="text" id="titolo" name="titolo"><br>
        <label class="mt-2 fw-bold h6" for="autore">Author:</label><br>
        <input class="w-75" type="text" id="autore" name="autore"><br>
        <label class="mt-2 fw-bold h6" for="anno_pubblicazione">Published:</label><br>
        <input class="w-75" type="text" id="anno_pubblicazione" name="anno_pubblicazione"><br>
        <label class="mt-2 fw-bold h6" for="genere">Genre:</label><br>
        <input class="w-75" type="text" id="genere" name="genere"><br><br>
        <label class="mt-2 fw-bold h6" for="copertina">Cover:</label><br>
        <input class="w-75" type="text" id="copertina" name="copertina"><br><br>
        <input type="submit" class="btn searchBTN ms-0 w-75" value="Add">
    </form>
    </div><?php

    include __DIR__ . '/includes/end.php';