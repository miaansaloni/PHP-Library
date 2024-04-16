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

<div class="headerTop w-100">
Are you looking for a new read?<br>
Or maybe you'd like to share your favourite book with the world? <br>
Either way you're in the right place! 
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DEAC80" fill-opacity="1" d="M0,96L80,128C160,160,320,224,480,240C640,256,800,224,960,218.7C1120,213,1280,235,1360,245.3L1440,256L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>    <form class="d-flex justify-content-center">
        <div class="w-50">
            <input type="text" name="search" class="form-control" placeholder="Author, Title, Genre, Year...">
        </div>
        <div>
            <button type="submit" class="btn searchBTN">search in existing library</button>
        </div>
    </form>

    <h2 class="text-center mt-4">Recommended by fellow readers</h2>
    <div class="container">
        <div class="row">
             <?php foreach ($stmt as $line) {?>
             <div class="my-2 col-xs-6 col-sm-6 col-sm-4 col-md-4 col-lg-3">
                <div class="card h-100">
                 <img src=<?="$line[copertina]"?> class="card-img-top" alt="">
                 <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center">
                 <p class="mb-0" style="font-size: small;">Book ID: <?="$line[id]"?></p>
                 <div>
                     <a href="/PHP-Library/details.php?id=<?= $line['id'] ?>" class="btn detailsBTN px-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg></a>
                     <a href="/PHP-Library/edit.php?id=<?= $line['id'] ?>" class="btn editBTN px-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                    <a href="/PHP-Library/delete.php?id=<?= $line['id'] ?>" class="btn deleteBTN px-1 mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                 </div>
                </div>
                 <h5 class="card-title"><?="$line[titolo]"?></h5>
                 <h6>Author: <?="$line[autore]"?></h6>
                 <p class="m-0">Published in: <?="$line[anno_pubblicazione]"?></p>
             </div> 
             </div>
             </div>
             <?php }?>
         </div>
    </div>
<nav>
    <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPages; $i++) {?>
    <li class="page-item <?= $i === $current_page ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" style="background-color: <?= $i === $current_page ? '#B5C18E' : 'transparent' ?>; border: transparent"><?= $i ?></a>
    </li>
    <?php }?>


    </ul>
</nav>
</div>

<?php
include __DIR__ . '/includes/end.php';