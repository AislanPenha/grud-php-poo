<?php

  require_once __DIR__."/vendor/autoload.php";

  use App\Entity\Vaga;

  if(!isset($_GET['id']) or !is_numeric($_GET['id'])){

    header('location: index.php?status=error');
    exit;
  }
  $obVaga = Vaga::getVaga($_GET['id']);

  require_once __DIR__."/includes/header.php";
  require_once __DIR__."/includes/formulario.php";
  require_once __DIR__."/includes/footer.php";
?>
    
