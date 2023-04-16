
<?php 
include "cabecera.inc.php";
?>
<br>
<br>
<br>
<br>
<br>
<div class="text-center">
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <h2>LOGIN</h2>
               </div>
            </div>
         </div>
        
            <div class="container" display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;>
                 
                <form method="POST" action="inicio_sesion.php" >
                    <h1>Ingrese sus datos</h1>
                    <div class="formcontainer">
                    <hr/>
                    <div class="container" text-align: left; margin: 24px 50px 12px;>
                        <label for="ci"><strong>Usuario</strong></label>
                        <input type="text" placeholder="Ingresa tu CI" name="ci" required> <br>
                        <label for="psw"><strong>Password</strong></label>
                        <input type="password" placeholder="ingrese su Password" name="psw" required>
                    </div>
                    <div align="center">
                        <div style="width: 80%;" class="alineacion">
                        <input type="submit" value="Acceder" class="boton" >
                        <input type="reset" value="Borrar" class="boton">
                        </h3>
                        </div>
                    </div>
                
                </form>
            </div>
      
      <br>
</div>
<?php include "scripts.inc.php"; ?>
</body>
</html>
