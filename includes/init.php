<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookAdvisor.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href = "style.css">
<style>
.navbar{
  background-color: #DEAC80;
}
.headerTop{
  display: flex;
  justify-content: end;
  padding-inline: 2rem;
  padding-top: 2rem;
  margin: 0;
  color: white;
  text-align: end;
  font-weight: bold;
  font-size: 35px;
  line-height: 1.2;
  position: absolute;
}

.searchBTN{
  border: 1px solid #DEAC80;
  color: #DEAC80;
  margin-inline-start: 1rem;
}

.detailsBTN{
  color: #B5C18E;
}
.detailsBTN:hover{
  color: black;
}
/* .deleteBTN{
  color: #B5C18E;
} */
.deleteBTN:hover{
  color: red;
}

h2{
  color: #B99470;
  font-size: 50px;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
  color: #B99470;
}
</style>
  </head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">BookAdvisor.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="http://localhost/PHP-Library/">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/PHP-Library/add.php">Add your favourite book</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        
       </ul>
      </div>
    </div>
  </nav>
    <div>