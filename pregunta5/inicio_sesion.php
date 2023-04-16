<?php
    include "cabeceraU.inc.php";
	$ci=$_POST["ci"];
	$password=$_POST["psw"];
?>

<br>
<br>
<br>
<br>
<br>

<?php
    include "conexion.inc.php";
    $usuario="no existe";
    $sql="select u.ci, u.usuario, u.password, p.nombre_com from usuario u, persona p where u.ci=$ci and u.password like '$password' and u.ci like p.ci";

	$resu=mysqli_query($con, $sql);
	$datos=mysqli_fetch_array($resu);

    if (empty($datos)) {
        echo '<div  align="center">';
		echo '<form action="formulario.php">';
		echo '<div  style="height: 200;" class="formulario">';
		echo '<p>El usuario ';
		echo $ci;
		echo ' no existe ';
		echo 'o la contraseña es incorrecta </p>';
		echo '<input type="submit" value="Atrás" class="boton" >';
		echo '</div>';
		echo '</form>';
		echo '</div>';
    } 
    else 
    {
		session_start();
		
        $_SESSION['ci']=$datos["ci"];
        $_SESSION['usuario']=$datos["usuario"];
        $_SESSION['password']=$datos["password"];
        $_SESSION['nombre']=$datos["nombre_com"];

        if ($_SESSION['usuario']=="estudiante") {
			echo '<div  align="center">';
			echo '<form method="POST"action="notas.php">';
			echo '<div  style="height: 250;" class="formulario">';
			echo '<p>Bienvenido Estudiante: <br>';
			echo $_SESSION['nombre'];
			echo '<br> CI :';
			echo  $_SESSION['ci'];
			echo '</p>';
			echo '<input type="submit" value="Ver notas" class="boton" >';
			echo '</form>';
			echo '</div>';
			
		} else {
			echo '<div  align="center">';
			echo '<form method="POST"action="notas.php">';
			echo '<div  style="height: 250;" class="formulario">';
			echo '<p>Bienvenido Director: <br>';
			echo $_SESSION['nombre'];
			echo '<br> CI :';
			echo $_SESSION['ci'];
			echo '</p>';
			echo '<input type="submit" value="Ver notas" class="boton" >';
			echo '</form>';
			echo '</div>';
			
		}
    }
	


    include "scripts.inc.php";

?>
</body>
</html>