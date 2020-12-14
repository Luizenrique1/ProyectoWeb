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
            
<nav>
  <div class="nav nav-tabs content" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Seguridad</a>
    
  </div>
</nav>
    
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    
       <div class="">
                            <form class="col-12">     
                            <div class="form-row">
                            <div class="form-group col-md-6">
                             <label style="float: left" for="inputEmail4">Nombre</label>
<?php
                
                    include('../Script_php/Conexion_BD.php');

                    $con = new ConexionBD();
                    $conexion = $con->getConexion();
                                
                    session_start();
                    $c=$_SESSION['correo'];
                    $correo=sha1($c);
                    $contra=sha1($_SESSION['contra']);
                                
                    $sql = "SELECT nombre, apellido, direccion, ciudad, estado, zip FROM info WHERE idu = (select idu from cuenta where correo='$correo' AND contraseña='$contra')";
                    
                    $nombre='';
                    $apellido='';
                    $correo2='<input type="Email" class="form-control" id="inputEmail" placeholder="'.$c.'" readonly>';        
                    $direccion='';
                    $ciudad='';
                    $estado='';
                    $zip='';
                                
                    $res = mysqli_query($conexion, $sql);                
                    if ($res) {
                  // output data of each row
                    while($row = mysqli_fetch_assoc($res)) {
                        
                      //  echo "id: " . $row["nombre"]. " - Name: " . $row["apellido"]. " " . $row["direccion"]. "<br>";
                      
                        
                        $nombre .=' <input type="text" class="form-control" id="inputNombre" placeholder="' .$row['nombre']. '" readonly name="name"> ';
                        $apellido .='<input type="text" class="form-control" id="inputApellido" placeholder="' .$row['apellido']. '" readonly>';
                        $direccion .='<input type="text" class="form-control" id="inputAddress" placeholder="' .$row['direccion']. '" readonly>';
                        $ciudad .='<input type="text" class="form-control" id="inputCity" placeholder="' .$row['ciudad']. '" readonly>';
                        $estado .='<input type="text" class="form-control" id="inputCity" placeholder="' .$row['estado']. '" readonly>';
                        $zip .='<input type="text" class="form-control" id="inputZip" placeholder="' .$row['zip']. ' " readonly>';
                    }
                    } else {
                    echo "0 results";
                    }
                   

?>
      
                                <?php echo $nombre; ?>
                            </div>
                            <div style="float: left"  class="form-group col-md-6">
                              <label style="float: left"  for="inputPassword4">Apellido</label>
                              <?php echo $apellido; ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label style="float: left" for="inputAddress">Correo Electronico</label>
                            <?php echo $correo2; ?>
                          </div>             
                          <div class="form-group">
                            <label style="float: left" for="inputAddress">Dirreccion</label>
                            <?php echo $direccion; ?>
                          </div>
                          <div class="form-row">
                            <div  class="form-group col-md-6">
                              <label style="float: left" for="inputCity" >Ciudad</label>
                               <?php echo $ciudad; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="float: left" for="inputCity" >Estado</label>
                              <?php echo $estado; ?>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="inputZip">Zip</label>
                              <?php echo $zip; ?>
                            </div>
                          </div>
                                              <div class="form-row">
                                <div class="form-group col-md-6 text-left">
                                  <a href="ModifPerfil.php">  <button type="button" class="btn btn-success">Modificar Perfil</button></a>
                                </div>
                                    <div class="form-group col-md-6 text-right">  
                                       
                                    <a href="EliminarCuenta.php"><button type="button" class="btn btn-danger">Elimanar Cuenta</button>  </a>
                                </div>
                            </div>
                          </form>

                              </div>

                            </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    
    
      <div class="modal-dialog text-center">
      <div class="modal-content" style="border-color: white;">
        <form method="POST" action="../Script_php/ActualizarContraseña.php"> 
            <div class="alert alert-primary" role="alert">
            Cambio de contraseña
            </div>
        <div class="form-group col-sm">
        <label style="float: left" for="inputAddress">Contraseña nueva</label>
        <input type="Password" class="form-control in-valid" id="inputEmail" placeholder="contraseña nueva" value="" required name="cont">
            
      </div>
      <div class="form-group col-sm">
        <label style="float: left" for="inputAddress">Repetir contraseña nueva</label>
        <input type="Password" class="form-control in-valid" id="inputPassword" placeholder="contraseña nueva" value="" required name="cont2">
      </div>              
      <div class="form-group col-sm">
        <label style="float: left" for="inputAddress">Contraseña Actual</label>
        <input type="Password" class="form-control in-valid" id="inputAddress" placeholder="contraseña actual" value="" required name="actual">
        </div>
            

            <br>
            <br>
            <br>
            
        <div>
        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
        </div>
        <br><br>
    </form>
      
      </div>    </div>  
    </div>
</div>
            
            
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