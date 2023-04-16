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
                echo "<h3> Bienvenido Director, a continuación se muestra la media de notas de los estudiantes <h3>";
                echo "
                <th> CHQ</th>
                <th> LPZ</th>
                <th> COCH</th>
                <th> ORU</th>
                <th> PTS</th>
                <th> TRJ</th>
                <th> STC</th>
                <th> BEN</th>
                <th> PND</th>";
                echo "<tr>";
              
                    $sql=" select 
                    sum(case when departamento='01' then promedio else 0 end) as CHQ,
                    sum(case when departamento='02' then promedio else 0 end) as LPZ,
                    sum(case when departamento='03' then promedio else 0 end) as COCH,
                    sum(case when departamento='04' then promedio else 0 end) as ORU,
                    sum(case when departamento='05' then promedio else 0 end) as PTS,
                    sum(case when departamento='06' then promedio else 0 end) as TRJ,
                    sum(case when departamento='07' then promedio else 0 end) as STC,
                    sum(case when departamento='08' then promedio else 0 end) as BEN,
                    sum(case when departamento='09' then promedio else 0 end) as PND
                    from 
                    (select p.departamento, truncate(avg(nt.nota_final),2)as promedio
                    from persona p,inscripcion nt 
                    where p.ci like nt.ci_estudiante
                    GROUP BY p.departamento) as depto";
                    $resultado=mysqli_query($con, $sql);
                    $fila=mysqli_fetch_array($resultado) ;
                    echo "<td>".$fila["CHQ"]."</td>";
                    echo "<td>".$fila["LPZ"]."</td>";
                    echo "<td>".$fila["COCH"]."</td>";
                    echo "<td>".$fila["ORU"]."</td>";
                    echo "<td>".$fila["PTS"]."</td>";
                    echo "<td>".$fila["TRJ"]."</td>";
                    echo "<td>".$fila["STC"]."</td>";
                    echo "<td>".$fila["BEN"]."</td>";
                    echo "<td>".$fila["PND"]."</td>";
                
                echo "</tr>";
                echo "</table>";
                echo "<br>";
                echo "<h3> Bienvenido Director, a continuación se muestra la media de notas de los estudiantes (Resuelto con otro metodo)<h3>";
                echo "<table>";
                echo "
                <th> CHQ</th>
                <th> LPZ</th>
                <th> COCH</th>
                <th> ORU</th>
                <th> PTS</th>
                <th> TRJ</th>
                <th> STC</th>
                <th> BEN</th>
                <th> PND</th>";
                echo "<tr>";
                for ($i=1; $i <10 ; $i++) { 
                    $sql=" select truncate(avg(i.nota_final),2)as promedio
                    from persona p,inscripcion i where p.departamento='0$i' 
                    and p.ci like i.ci_estudiante";
                    
                    $resultado=mysqli_query($con, $sql);
                    $fila=mysqli_fetch_array($resultado) ;
                    if($fila["promedio"]==""){
                        echo "<td>0.00</td>";
                    }
                    else{
                        echo "<td>".$fila["promedio"]."</td>";
                    }
                    
                }
                echo "</tr>";
            }

        ?>
            </table>
            </div>

</div>

<?php

    include "scripts.inc.php";

?>
</body>
</html>