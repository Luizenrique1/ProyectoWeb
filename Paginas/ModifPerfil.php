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
            
    
<div class="tab-content" id="nav-tabContent">
       <div class="">
                            <form class="col-12" method="POST" action="../Script_php/ActualizarPerfilinfo.php">     
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
                    $correo2='<input type="Email" class="form-control" id="inputEmail" value="'.$c.'" name="caja_Correo" required>';        
                    $direccion='';
                    $ciudad='';
                    $estado='';
                    $zip='';
                                
                    $res = mysqli_query($conexion, $sql);                
                    if ($res) {
                  // output data of each row
                    while($row = mysqli_fetch_assoc($res)) {
                        
                      //  echo "id: " . $row["nombre"]. " - Name: " . $row["apellido"]. " " . $row["direccion"]. "<br>";
                      
                        
                        $nombre .=' <input type="text" class="form-control" id="inputNombre" value="' .$row['nombre']. '"  name="caja_nombre" required> ';
                        $apellido .='<input type="text" class="form-control" id="inputApellido" value="' .$row['apellido']. '" name="caja_apellido" required>';
                        $direccion .='<input type="text" class="form-control" id="inputAddress" value="' .$row['direccion']. '" name="caja_direccion" required>';
                        $ciudad .='<input type="text" class="form-control" id="inputCity" value="' .$row['ciudad']. '" name="caja_ciudad" required>';
                        
                        if ($row['estado']=="Zacatecas"){
                            $estado .='<select id="inputState validationServer04" class="form-control" aria-describedby="validationServer04Feedback" required name="caja_estado" required>
                                        <option selected>Zacatecas</option>
                                        <option>Nuevo Leon</option>
                                        <option>Baja California</option>
                                        </select>';   
                        }else if($row['estado']=="Nuevo Leon"){
                            $estado .='<select id="inputState validationServer04" class="form-control" aria-describedby="validationServer04Feedback" required name="caja_estado" required>
                                        <option>Zacatecas</option>
                                        <option selected>Nuevo Leon</option>
                                        <option>Baja California</option>
                                        </select>';
                        }else{
                            $estado .='<select id="inputState validationServer04" class="form-control" aria-describedby="validationServer04Feedback" required name="caja_estado" required>
                                        <option>Zacatecas</option>
                                        <option >Nuevo Leon</option>
                                        <option selected>Baja California</option>
                                        </select>';
                            
                        }
                        
                        
                        
                        $zip .='<input type="text" class="form-control" id="inputZip" value="' .$row['zip']. ' " name="caja_zip" required>';
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
                            <div  class="form-group modular-content modal-dialog text-center" style="width: 100%;">
                                <div class="modal-content" style="border-color: white; ">
                              <label style="float: left" for="inputCity" >Contraseña Actual</label>
                               <input type="Password" class="form-control in-valid" id="inputPassword" placeholder="Contraseña" value="" required name="caja_contraseña"> 
                                    <label style="float: left" for="inputCity" >Repetir contraseña</label>
                               <input type="Password" class="form-control in-valid" id="inputPassword" placeholder="Contraseña" value="" required name="caja_contraseña2"> 
                            </div>
                            </div>
                          </div>
                                
                                              <div class="form-row">
                                <div class="form-group col-md-6 text-left">
                                    <a href="Perfil.php"><button type="button" class="btn btn-primary">Regresar</button></a>
                                </div>
                                    <div class="form-group col-md-6 text-right">  
                                       
                                    <button type="submit" class="btn btn-success">Aplicar Cambios</button>
                                </div>
                            </div>
                          </form>

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