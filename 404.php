<?php 
  $page_title="Erreur 404 | Page introuvable";
  require_once "includes/header.php";
  require_once "includes/navbar.php";?>
<style>
  body {
    background-color: rgba(57, 194, 57, 0.700);
  }
  .ftDes {
    background-color: white;
  }
</style>
  <!-- Page Content -->
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-5 mb-3">404 |
      <small>Page introuvable</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Accueil</a>
      </li>
      <li class="breadcrumb-item active">404</li>
    </ol>

    <div class="jumbotron">
      <h1 class="display-1">404</h1>
      <p class="text404" style="font-size: 2em;">Non, ce n'est pas ici que vous trouverez Luigi... continuez votre route !</p>
      <div><a href="javascript:history.back()" class="btn btn-success btn-block btn-lg">Revenir à la page précédante</a></div> <!-- div class="col-xs-12 col-md-12" -->
    </div>
    <!-- /.jumbotron -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php require_once ("includes/footer.php"); ?>