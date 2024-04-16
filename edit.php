<?php
include __DIR__ . '/includes/db.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validazione
    if (empty($_POST['titolo'])) {
        $errors[] = "Title field is required.";
    }
    if (empty($_POST['autore'])) {
        $errors[] = "Author field is required.";
    }
    if (empty($_POST['anno_pubblicazione'])) {
        $errors[] = "Year of publication is required";
    }
    if (empty($_POST['genere'])) {
        $errors[] = "Genre field is required.";
    }
    if (empty($_POST['copertina'])) {
        $errors[] = "Cover image field is required.";
    }

    // AGGIORNAMENTO DB SE NON CI SONO ERRORI
    if (empty($errors)) {
        $id = $_POST['id'];
        $titolo = $_POST['titolo'];
        $autore = $_POST['autore'];
        $anno_pubblicazione = $_POST['anno_pubblicazione'];
        $genere = $_POST['genere'];
        $copertina = $_POST['copertina'];

        $stmt = $pdo->prepare("UPDATE libri SET titolo=?, autore=?, anno_pubblicazione=?, genere=?, copertina=? WHERE id=?");
        $stmt->execute([$titolo, $autore, $anno_pubblicazione, $genere, $copertina, $id]);

        header("Location: /PHP-Library/");
        exit();
    }
}

// RECUPERO DEI DATI DA MODIFICARE
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM libri WHERE id = ?");
$stmt->execute([$id]);
$libri = $stmt->fetch();

include __DIR__ . '/includes/init.php';
?>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<div class="text-center mt-4">
<h1 class="mb-3">Edit a book from our library:</h1>
    <form method="post" >
        <input type="hidden" name="id" value="<?= $libri['id'] ?>">
        <label class="mt-2 fw-bold h6" for="titolo">Title:</label><br>
        <input class="w-50" type="text" id="titolo" name="titolo" value="<?= $libri['titolo'] ?>"><br>
        <label class="mt-2 fw-bold h6" for="autore">Author:</label><br>
        <input class="w-50" type="text" id="autore" name="autore" value="<?= $libri['autore'] ?>"><br>
        <label class="mt-2 fw-bold h6" for="anno_pubblicazione">Published:</label><br>
        <input class="w-50" type="text" id="anno_pubblicazione" name="anno_pubblicazione" value="<?= $libri['anno_pubblicazione'] ?>"><br>
        <label class="mt-2 fw-bold h6" for="genere">Genre:</label><br>
        <input class="w-50" type="text" id="genere" name="genere" value="<?= $libri['genere'] ?>"><br><br>
        <label class="mt-2 fw-bold h6" for="copertina">Cover:</label><br>
        <input class="w-50" type="text" id="copertina" name="copertina" value="<?= $libri['copertina'] ?>"><br><br>
        <button type="submit" class="btn searchBTN w-25 mt-3">Edit</button>
    </form>
</div><?php
include __DIR__ . '/includes/end.php';