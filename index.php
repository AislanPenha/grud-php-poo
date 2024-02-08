<?php

  require_once __DIR__."/vendor/autoload.php";
  
  use  App\Entity\Vaga;

  $vagas = Vaga::getVagas();
  $resultado = '';

  foreach($vagas as $vaga){
    $resultado .= '<tr>
                      <td>'.$vaga->id.'</td>
                      <td>'.$vaga->titulo.'</td>
                      <td>'.$vaga->descricao.'</td>
                      <td>'.($vaga->status=='s'? 'Ativo': 'Inativo' ).'</td>
                      <td>'.date('d/m/Y à\s H:i:s', strtotime($vaga->data)).'</td>
                      <td>
                        <a href="editar.php?id='.$vaga->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$vaga->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                      </tr>';
  }
  require_once __DIR__."/includes/header.php";
  require_once __DIR__."/includes/listagem.php";
  require_once __DIR__."/includes/footer.php";
?>
    
