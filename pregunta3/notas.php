<?php
    include "cabeceraU.inc.php";
	
?>

<br>
<br>
<br>
<br>
<br>

<div align="center">
            <div align="center">
            <table>
        <?php 
            session_start();
            echo 'CI: ' .$_SESSION['ci'];
            echo "<br>";
            echo 'Nombre: ' .$_SESSION['nombre'];
            if ( $_SESSION['usuario']=="estudiante") {
                echo "<th> SIGLA</th>
                <th> NOTA1</th>
                <th> NOTA2</th>
                <th> NOTA3</th>
                <th> NOTAFINAL</th>";
                $sql="select i.sigla, i.nota1,i.nota2,i.nota3,i.nota_final
                from usuario us,inscripcion i 
                where us.ci= ".$_SESSION['ci']." 
                and us.ci like i.ci_estudiante";
                $resultado=mysqli_query($con, $sql);
                while($fila=mysqli_fetch_array($resultado)) {
                    echo "<tr>";
				    echo "<td>".$fila["sigla"]."</td>";
				    echo "<td>".$fila["nota1"]."</td>";
                    echo "<td>".$fila["nota2"]."</td>";
                    echo "<td>".$fila["nota3"]."</td>";
                    echo "<td>".$fila["nota_final"]."</td>";
				    echo "</p>";
                    echo "</tr>";
			    }
            } else 
            {
                echo "<h3> Bienvenido Director, a continuación se muestran los estudiantes inscritos<h3>";
                echo "<th> CI</th>
                <th> NOMBRE</th>
                <th> SIGLA</th>";
                $sql="select p.ci,p.nombre_com, i.sigla
                from persona p,inscripcion i 
                where p.ci like i.ci_estudiante";
                $resultado=mysqli_query($con, $sql);
                while($fila=mysqli_fetch_array($resultado)) {
                    echo "<tr>";
				    echo "<td>".$fila["ci"]."</td>";
				    echo "<td>".$fila["nombre_com"]."</td>";
                    echo "<td>".$fila["sigla"]."</td>";
				    echo "</p>";
                    echo "</tr>";
            }  }
        ?>
            </table>
            </div>

</div>

<?php

    include "scripts.inc.php";

?>
</body>
</html>