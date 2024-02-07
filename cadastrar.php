<?php

  require_once __DIR__."/vendor/autoload.php";

  use App\Entity\Vaga;

  $titulo = $_POST["titulo"] ?? '';
  $descricao = $_POST["descricao"] ?? '';
  $ativo = $_POST["ativo"] ?? '';

  if($titulo && $descricao){
    $obVaga = new Vaga;
    $obVaga->titulo = $titulo;
    $obVaga->descricao = $descricao;
    $obVaga->ativo = $ativo;
    $obVaga->cadastrar();
  }

  require_once __DIR__."/includes/header.php";
  require_once __DIR__."/includes/formulario.php";
  require_once __DIR__."/includes/footer.php";
?>
    
