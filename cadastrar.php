<?php

  require_once __DIR__."/vendor/autoload.php";

  use App\Entity\Vaga;

  $titulo = $_POST["titulo"] ?? '';
  $descricao = $_POST["descricao"] ?? '';
  $ativo = $_POST["ativo"] ?? '';

  $obVaga = new Vaga();

  if($titulo && $descricao){
    
    $obVaga->titulo = $titulo;
    $obVaga->descricao = $descricao;
    $obVaga->status = $ativo;
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
  }

  require_once __DIR__."/includes/header.php";
  require_once __DIR__."/includes/formulario.php";
  require_once __DIR__."/includes/footer.php";
?>
    
