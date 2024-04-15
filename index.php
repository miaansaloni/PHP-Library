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

//PAGINAZIONE
$totalLibriStmt = $pdo->query('SELECT COUNT(*) FROM libri');
$totalLibri = $totalLibriStmt->fetchColumn();
$libriPerPage = 4;
$totalPages = ceil($totalLibri / $libriPerPage);
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $libriPerPage;

// SELECT DI TUTTE LE RIGHE O DI RIGHE FILTRATE PER RICERCA
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $pdo->prepare("SELECT * FROM libri WHERE titolo LIKE ? LIMIT ?, ?");
    $stmt->execute(["%$search%", $offset, $libriPerPage]);
} else {
    $stmt = $pdo->prepare("SELECT * FROM libri LIMIT ?, ?");
    $stmt->execute([$offset, $libriPerPage]);
}

include __DIR__ . '/includes/init.php'; ?>
    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Search..">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">search</button>
        </div>
    </form>

    <div id="header">

    </div>

    <h2>Ad Here your favourite book!</h2>
    <form method="post">
        <label for="titolo">Title:</label><br>
        <input type="text" id="titolo" name="titolo"><br>
        <label for="autore">Author:</label><br>
        <input type="text" id="autore" name="autore"><br>
        <label for="anno_pubblicazione">Published:</label><br>
        <input type="text" id="anno_pubblicazione" name="anno_pubblicazione"><br>
        <label for="genere">Genre:</label><br>
        <input type="text" id="genere" name="genere"><br><br>
        <input type="submit" value="Add">
    </form>

    <h2>Other people's favs</h2>
    <ul>
        <?php foreach ($stmt as $row) {?>
            <li>
                <?= "$row[id] - $row[titolo] - $row[autore] - $row[anno_pubblicazione] - $row[genere]"?>
                <a href="/PHP-Library/details.php?id=<?= $row['id'] ?>">Details</a>
                <a href="/PHP-Library/delete.php?id=<?= $row['id'] ?>">Delete</a>
                <a href="/PHP-Library/edit.php?id=<?= $row['id'] ?>">Edit</a>
            </li>
        <?php }?>
    </ul>


<nav>
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPages; $i++) {?>
            <li class="page-item <?= $i === $current_page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><?= $i ?></a>
            </li>
        <?php }?>
    </ul>
</nav>
</div>

<?php
include __DIR__ . '/includes/end.php';