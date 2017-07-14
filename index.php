<?php 

  //Obtener los usuarios como la imagen de perfil
  $usuarios=array();
  $archivoUsuarios=fopen("data/usuarios.csv" , "r");
  while(!feof($archivoUsuarios)){
    $usuarios[]=fgets($archivoUsuarios);
  }
  fclose($archivoUsuarios);

  //Obtener las url de los memes
  $imagenes=array();
  $archivoImagenes=fopen("data/imagenes.csv", "r");
  while(!feof($archivoImagenes)){
    $imagenes[]=fgets($archivoImagenes);
  }
  fclose($archivoImagenes);

  //Obtner memes registrados
  $memesRegistrados=array();
  $archivoRegisto=fopen("data/memesRegistrados.csv","r");
  while (!feof($archivoRegisto)) {
    $memesRegistrados[]=fgets($archivoRegisto);
  }
  fclose($archivoRegisto);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png" />
    <title>9GAG en español - Diviértete</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">9GAG</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12 col-sm-6 col-md-6 col-lg-6">
          <h2>Memes Registrados</h2>
          <p>
            <div class="container-fluid">
              <div class="row">
              <div id="div-respuesta">
                <?php 

                for ($i=0; $i <(sizeof($memesRegistrados)-1); $i++) { 
                  //estructura de separacion de campos
                  $partesRegistro=explode(",", $memesRegistrados[$i]);
                  $descripcion=$partesRegistro[0];
                  $usuario=$partesRegistro[1];
                  $puntuacion=$partesRegistro[2];
                  $urlMeme=$partesRegistro[3];
                  $usuariosQueComentaron=$partesRegistro[4];

                  $partesUsuarioQueComento=explode(":",$usuariosQueComentaron);

                  $partes1=explode("|",$partesUsuarioQueComento[0]);
                  $partes2=explode("|",$partesUsuarioQueComento[1]);
                  $partes3=explode("|",$partesUsuarioQueComento[2]);
                  $partes4=explode("|",$partesUsuarioQueComento[3]);
                  $partes5=explode("|",$partesUsuarioQueComento[4]);
                  
                  $usuario1=$partes1[0];
                  $comentario1=$partes1[1];
                  $usuario2=$partes2[0];
                  $comentario2=$partes2[1];
                  $usuario3=$partes3[0];
                  $comentario3=$partes3[1];
                  $usuario4=$partes4[0];
                  $comentario4=$partes4[1];
                  $usuario5=$partes5[0];
                  $comentario5=$partes5[1];

                  echo  '<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">'.
                        '<div class="well">'.
                        '<strong>'.$usuario.'</strong>'.
                        '<p>'.$descripcion.'</p>'.
                        '<img src="'.$urlMeme.'" class="img-responsive">'.
                        '<span class="badge">Puntos:'.$puntuacion.'</span>'.
                        '<span class="badge">Comentarios: 2</span>'.
                        '<p>'.
                        '<hr>'.
                        '<h4>Comentarios:</h4>'.
                        '<div>'.
                        '<strong>'.$usuario1.'</strong>'.
                        '<p  class="commentario">'.$comentario1.'</p>'.
                        '</div>'.
                        '<div>'.
                        '<strong>'.$usuario2.'</strong>'.
                        '<p  class="commentario">'.$comentario2.'</p>'.
                        '</div>'.
                        '<div>'.
                        '<strong>'.$usuario3.'</strong>'.
                        '<p  class="commentario">'.$comentario3.'</p>'.
                        '</div>'.
                        '<div>'.
                        '<strong>'.$usuario4.'</strong>'.
                        '<p  class="commentario">'.$comentario4.'</p>'.
                        '</div>'.
                        '<div>'.
                        '<strong>'.$usuario5.'</strong>'.
                        '<p  class="commentario">'.$comentario5.'</p>'.
                        '</div>'.
                        '</p>'.
                        '</div>'.
                        '</div>';


                }

                  
               ?>
              </div>
              </div>
            </div>
          </p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <h2>Registrar un meme</h2>
          <form method="POST" action="index.php">
            <table>
              <tr>
                <td>Descripcion Meme: <input type="text" id="txt-descripcion" class="form-control"></td>
              </tr>
              <tr>
                  <td>
                    <br>Usuario que registra el meme:<br>
                    <?php 
                    for($i=0; $i<sizeof($usuarios);$i++){
                      $partes=explode( "," , $usuarios[$i]);
                      echo '<label>'.
                            $partes[0].
                            '<input id="'.$partes[0].'"type="radio" value="'.$partes[0].'" name="rbt-foto">'.
                            '<img src="'.$partes[1].'" class="img-responsive img-circle">'.
                            '</label>';
                     
                    }
                    ?>
                </tr>
                <tr>
                  <td>
                    Puntuación:
                    <input id="txt-puntuacion" type="text" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>
                    Imagenes disponibles:
                    <select id="slc-image" class="form-control" >
                      <?php 
                        for($i=0;$i<sizeof($imagenes);$i++){
                          echo '<option value="'.$imagenes[$i].'">'.
                                "Memes ". ($i+1) .
                               '</option>';
                        }
                       ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br>Comentarios:
                    <input type="text" id="txt-usuario1" class="form-control" placeholder="Usuario 1"><input id="txt-comentario1" type="text" placeholder="Comentario 1" class="form-control"><br>
                    <input type="text" id="txt-usuario2" class="form-control" placeholder="Usuario 2"><input id="txt-comentario2" type="text" placeholder="Comentario 2" class="form-control"><br>
                    <input type="text" id="txt-usuario3" class="form-control" placeholder="Usuario 3"><input id="txt-comentario3" type="text" placeholder="Comentario 3" class="form-control"><br>
                    <input type="text" id="txt-usuario4" class="form-control" placeholder="Usuario 4"><input id="txt-comentario4" type="text" placeholder="Comentario 4" class="form-control"><br>
                    <input type="text" id="txt-usuario5" class="form-control" placeholder="Usuario 5"><input id="txt-comentario5" type="text" placeholder="Comentario 5" class="form-control"><br>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br><br>
                    <input type="button" id="btn-registrar" value="Guardar Meme" class="btn btn-primary">
                  </td>
                </tr>
              </table>            
          </form>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>

      $("#Goku").attr('checked',true);
      $("#btn-registrar").click(function(){
      var cadena1=$("#slc-image").val();
      var cadena2=cadena1.replace("\n","")
       
      var parametros ={
        "txt-descripcion":$('#txt-descripcion').val(),
        "rbt-foto":$("input[type='radio'][name='rbt-foto']:checked").val(),
        "txt-puntuacion":$("#txt-puntuacion").val(),
        "slc-image":cadena2,
        "txt-usuario1":$("#txt-usuario1").val(),
        "txt-comentario1":$("#txt-comentario1").val(),
        "txt-usuario2":$("#txt-usuario2").val(),
        "txt-comentario2":$("#txt-comentario2").val(),
        "txt-usuario3":$("#txt-usuario3").val(),
        "txt-comentario3":$("#txt-comentario3").val(),
        "txt-usuario4":$("#txt-usuario4").val(),
        "txt-comentario4":$("#txt-comentario4").val(),
        "txt-usuario5":$("#txt-usuario5").val(),
        "txt-comentario5":$("#txt-comentario5").val()
    
      }
      // console.log(parametros)
      $.ajax({
        url: 'procesar.php',
        method: 'POST',
        data: parametros, //UrlEncoded,JSON, FormData
        dataType: 'html', // Formato de respuesta
          success:function(respuesta){
            $("#div-respuesta").html($("#div-respuesta").html()+respuesta);
          },
          error:function(error){
            alert(error);
          }
        });

      });     
    </script>
</html>
