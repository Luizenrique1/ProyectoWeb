<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link href="../Vistas/perfil.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body>
    
      
         <?php 
        require_once('TopBarL.html');
        ?>
<br>
      <hr>
<div class="container">

<div class="">
            
      <div class="modal-dialog text-center">
      <div class="modal-content" style="border-color: white;">
        <form method="POST" action="../Script_php/ValidarEliminacion.php"> 
            <div class="alert alert-danger" role="alert">
             terminacion de cuenta
            </div>
        <div class="form-group col-sm">
        <label style="float: left" for="inputAddress">Contraseña Actual</label>
        <input type="Password" class="form-control in-valid" id="inputEmail" placeholder="Contraseña Actual" value="" required name="cont">
            
      </div>
      <div class="form-group col-sm">
        <label style="float: left" for="inputAddress">Repetir Contraseña</label>
        <input type="Password" class="form-control in-valid" id="inputPassword" placeholder="Repetir Contraseña" value="" required name="cont2">
      </div>              

            

            <br>
            
            
        <div> <a href="Perfil.php"><button type="button" class="btn btn-success">Regresar</button> </a>
            
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-danger">Terminacion de cuenta</button>
        </div>
        <br><br>
    </form>
      
      </div>    </div>  
    

            
            
            </div>
        </div>

      <br>
      <hr>
        
        <?php
            require_once('footer.html');
        ?>
      
      
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>