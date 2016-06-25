SELECT * FROM carrera c,facultad f WHERE c.Facultad_Id_Facultad=f.Id_Facultad

SELECT * FROM carrera c,facultad f, materia m WHERE c.Facultad_Id_Facultad=f.Id_Facultad AND c.Nombre_Carrera=m.Carrera

SELECT Nombre_Carrera FROM carrera c,facultad f WHERE c.Facultad=f.Nombre_Facultad="Tecnologia"

SELECT * FROM planglobal pg,materia m,docente d WHERE pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente AND pg.tipo="Titular"
SELECT * FROM planglobal pg,justificacion j WHERE pg.ID_PG=1 AND j.ID_PG=pg.ID_PG
SELECT * FROM objetivos o,planglobal pg

WHERE pg.ID_PG=o.ID_PG AND pg.ID_PG=1

 $sql="SELECT * FROM materia WHERE ID_Materia=$CodigoM";
       $resultado=mysql_db_query($sql,$link);
       while($row=mysql_fetch_array($resultado)){

       }
      