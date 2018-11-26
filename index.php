<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="style.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    
</head>


<body>


<?php
        error_reporting(0);
        $prueba=array();
        $programa_anio=array();
        $prueba1=array();
        $prueba2=array();
        $prueba3=array();
        $anio_alumno=array();
        $programa_alumno=array();
        $arrayAnio=array();
        $arrayCodigo=array();
        $arrayAlumno=array();
        $arrayLleno=array();
        $arraycapertas=array();
    $dir="UPG.CARPETAS.ESTUDIANTES1";
    
     $explorar= scandir($dir);
     $array1=array();  
     for($i=0;$i<count($explorar);$i++){
         if( $explorar[$i] == '.' || $explorar[$i] == '..')
                continue;
         array_push($array1,$explorar[$i]);
         $path=$dir."/".$explorar[$i];
         $explorar1=scandir($path);

         for($y=0;$y<count($explorar1);$y++){
             if( $explorar[$y] == '.' || $explorar[$y] == '..')
                    continue; 
             array_push($array1,$explorar1[$y]);
             $prueba=array($explorar[$i]=>$explorar1[$y]);
             array_push($programa_anio,$prueba);
             $path1=$dir."/".$explorar[$i]."/".$explorar1[$y];
             $explorar2=scandir($path1);
            for($z=0;$z<count($explorar2);$z++){  
                 if( $explorar2[$z] == '.' || $explorar2[$z] == '..')
                        continue;   

                array_push($array1,$explorar2[$z]);
                $prueba1=array($explorar1[$y]=>$explorar2[$z]);
                array_push($anio_alumno,$prueba1);
               $prueba2=array($explorar[$i]=>$explorar2[$z]);
                array_push($programa_alumno,$prueba2);
                $path2=$dir."/".$explorar[$i]."/".$explorar1[$y]."/".$explorar2[$z];
                $explorar3=scandir($path2);
                
                for($r=0;$r<count($explorar3);$r++){  
                    if( $explorar3[$r] == '.' || $explorar3[$r] == '..')
                            continue;
                 
                    $prueba3=array($explorar[$i]=>$explorar3[$r]);
                   
                     array_push($arraycapertas,$prueba3);
                    array_push($arrayLleno,$explorar3[$r]);
                }
            }
             
         }

  
     }
    
   
 
        foreach ($arraycapertas as $key => $value) {
            foreach($value as $k=>$v){ 
                    $contadorprogramalleno[$k]+=1;
            }    
        } 
        foreach ($programa_alumno as $key => $value) {
            foreach($value as $k=>$v){ 
                    $contador[$k]+=1;
            }    
        } 
    
        foreach ($anio_alumno as $key => $value) {
            foreach($value as $k=>$v){ 
                    $contador1[$k]+=1;
            }    
        } 
    foreach($contadorprogramalleno as $key => $value){
        
        if($value!=NULL){
            
        foreach($contador as $k => $v){
            if($k==$key){
                $arraydifprog[$k]=$v-$value;
            }else{
                 $arraydifprog[$k]=$v;
            }
        }
        }
    }

    $carpetaLlenas=count($arrayLleno);

    
    for($m=0;$m<count($array1);$m++){

        
        if(strlen($array1[$m])>4){
            array_push($arrayAlumno,$array1[$m]);
        }
        if(strlen($array1[$m])<=4){
            $var= strpos($array1[$m],"20");
            if($var !== false){
                array_push($arrayAnio,$array1[$m]);
            }else{
                array_push($arrayCodigo,$array1[$m]);
            }
        }
        
    }
    $totalCarpeta=count($arrayAlumno);

    $carpetaVacia=($totalCarpeta-$carpetaLlenas);
    
    

    
    

/*
    function rec_listFiles($from)
{
   
    if(!is_dir($from))
        return false;
    $files = array();
    if( $dh = opendir($from)){
      

        while(($file = readdir($dh)) !== false  ){
            if( $file == '.' || $file == '..')
                continue;
            $path = $from . '/' . $file;
            
            
            if( is_dir($path) ){
                echo $path;
                echo "<br>";
                $files += rec_listFiles($path);
            }else{
                $files[] = $path;
                
      
            }                            
        }
        closedir($dh);
    }
    return $files;
}

rec_listFiles("UPG.CARPETAS.ESTUDIANTES");
*/
?>
<div class="contenedor   col-xs-12">
    <div class="container">
    <div class="text-center col-xs-12">
      <h1>Listado de Carpetas vacías</h1>
    </div>
    <div class="col-xs-12 directorio_principal text-center">
        <button id="principal" class="btn btn-primary" type="button">
          <?=$dir;?> <span class="badge"><?=$carpetaVacia;?></span>
        </button>
    </div>
    <div id="contenedor_carpetas" class="col-xs-12 contenedor_carpetas">
        <div class="col-xs-12 directorio_programa text-center">
            <h2>Listado de carpetas de Programas</h2>
            <?php
                echo '<div class="col-xs-12">';
                foreach($arrayCodigo as $key => $value){
                    echo '<button id="'.$value.'" class="btn btn-primary" type="button">'.$value.'<span class="badge"></span></button>';
                }
                echo '</div>';
                 echo '<div class="col-xs-12">';
                for($e=0;$e<count($contadorprogramalleno);$e++){
         
                }
                    foreach($arraydifprog as $key => $value){
                 echo '<button  class="btn btn-info valor_prog" type="button">'.$value.'<span class="badge"></span></button>';
                }
            echo '</div>';
            ?>
        </div>
        <div class="col-xs-12 directorio_anio text-center">
            <h2>Listado de carpetas de Año de ingreso</h2>
            <?php
            foreach ($programa_anio as $key => $value) { // $key tendrá el valor de "lug" y value el array
                foreach($value as $k=>$v){ // Con value hacemos referencia al array más interno
                    // $k hace referencia a las claves colonia y dirección , y $v hace referencia a 
                   // los valores sanfernando y 23
                    echo '<button id="'.$k.'" class="btn btn-primary" type="button" value="'.$v.'">'.$v.'<span class="badge"></span></button>';
                }
            }
            

            ?>
        </div>
        <div class="col-xs-12 directorio_alumno text-center">
            <h2>Listado de carpetas de Alumnos</h2>

            <?php

            foreach ($programa_alumno as $key => $value) { // $key tendrá el valor de "lug" y value el array
               
                foreach($value as $k=>$v){ // Con value hacemos referencia al array más interno
                    // $k hace referencia a las claves colonia y dirección , y $v hace referencia a 
                   // los valores sanfernando y 23

                    echo '  
                            <button id="'.$k.'" class="btn btn-primary" type="button">
                              '.$v.' <span class="badge"><?=$totalCarpeta;?></span>
                            </button> ';
                }

            
            }



            ?>



        </div>
    </div>
    </div>
</div>



<script src="app.js"></script>
</body>
</html>




