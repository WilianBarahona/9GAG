<?php 
  $archivoRegistro=fopen("data/memesRegistrados.csv", "a+");

  fwrite($archivoRegistro, 
        $_POST["txt-descripcion"].",".
        $_POST["rbt-foto"].",".
        $_POST["txt-puntuacion"].",".
        $_POST["slc-image"].",".
        $_POST["txt-usuario1"]."|".
        $_POST["txt-comentario1"].":".
        $_POST["txt-usuario2"]."|".
        $_POST["txt-comentario2"].":".
        $_POST["txt-usuario3"]."|".
        $_POST["txt-comentario3"].":".
        $_POST["txt-usuario4"]."|".
        $_POST["txt-comentario4"].":".
        $_POST["txt-usuario5"]."|".
        $_POST["txt-comentario5"]."\n"

  );
  fclose($archivoRegistro);
  echo  '<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">'.
        '<div class="well">'.
        '<strong>'.$_POST["rbt-foto"].'</strong>'.
        '<p>'. $_POST["txt-descripcion"].'</p>'.
        '<img src="'.$_POST["slc-image"].'" class="img-responsive">'.
        '<span class="badge">Puntos:'.$_POST["txt-puntuacion"].'</span>'.
        '<span class="badge">Comentarios: 2</span>'.
        '<p>'.
        '<hr>'.
        '<h4>Comentarios:</h4>'.
        '<div>'.
        '<strong>'.$_POST["txt-usuario1"].'</strong>'.
        '<p  class="commentario">'.$_POST["txt-comentario1"].'</p>'.
        '</div>'.
        '<div>'.
        '<strong>'.$_POST["txt-usuario2"].'</strong>'.
        '<p  class="commentario">'.$_POST["txt-comentario2"].'</p>'.
        '</div>'.
        '<div>'.
        '<strong>'.$_POST["txt-usuario3"].'</strong>'.
        '<p  class="commentario">'.$_POST["txt-comentario3"].'</p>'.
        '</div>'.
        '<div>'.
        '<strong>'.$_POST["txt-usuario4"].'</strong>'.
        '<p  class="commentario">'.$_POST["txt-comentario4"].'</p>'.
        '</div>'.
        '<div>'.
        '<strong>'.$_POST["txt-usuario5"].'</strong>'.
        '<p  class="commentario">'.$_POST["txt-comentario5"].'</p>'.
        '</div>'.
        '</p>'.
        '</div>'.
        '</div>';


 ?>

