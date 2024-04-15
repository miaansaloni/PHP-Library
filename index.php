<?php
include __DIR__ . '/includes/db.php';

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

<div class="text-center header h2 d-flex align-items-center text-white">
Are you looking for a new read? Or maybe you want to share your favourite book with the world? Either way you're in the right place! 
</div>

    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Author, Title, Genre, Year...">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">search in existing library</button>
        </div>
    </form>

    <h2 class="text-center">Recommended by fellow readers</h2>
    <div class="container">
        <div class="row">
             <?php foreach ($stmt as $line) {?>
             <div class="my-2 col-lg-3">
                <div class="card h-100">
                 <img src=<?="$line[copertina]"?> class="card-img-top" alt="">
                 <div class="card-body">
                 <h5 class="card-title"><?="$line[titolo]"?></h5>
                 <h6>Author: <?="$line[autore]"?></h6>
                 <p class="m-0">Published in: <?="$line[anno_pubblicazione]"?></p>
                </div>
                <div class="d-flex justify-content-evenly p-3">
                    <a href="/PHP-Library/details.php?id=<?= $line['id'] ?>" class="btn btn-outline-info">Details</a>
                    <a href="/PHP-Library/delete.php?id=<?= $line['id'] ?>" class="btn btn-outline-danger">Delete</a>
                    <a href="/PHP-Library/edit.php?id=<?= $line['id'] ?>" class="btn btn-outline-warning">Edit</a>
                </div>
                <p class="m-0 text-end pe-3" style="font-size: small;">Book ID: <?="$line[id]"?></p>
             </div>
             </div>
             <?php }?>
         </div>
    </div>
    


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