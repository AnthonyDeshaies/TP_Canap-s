<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>header</title>

  <!-- ICONS -->
  <script src="https://kit.fontawesome.com/e6187d3d12.js" crossorigin="anonymous"></script>

  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- CSS link -->
  <link rel="stylesheet" href="CSS/style.css">
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light container-fluid">
    <!-- <div class="container-fluid"> -->

      <button class="navbar-toggler burger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse barre" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
          </li>
        </ul>
      </div>

      <span><img src="images/logo_header.png" alt="logo du site"></span>
      <h1>" Au paradis des canapés "</h1>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="logo-espace-membre"><i class="fas fa-user"></i><span></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="users.php">Se connecter</a></li>
              <li><a class="dropdown-item" href="inscription.php">Inscrivez-vous !</a></li>
              <li><a class="dropdown-item" href="index.php">Se déconnecter</a></li>
            </ul>
          </li>
        </ul>
      </div>
    <!-- </div> -->
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</header>

</html>