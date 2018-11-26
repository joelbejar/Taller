$(document).ready(function(){

    $(".directorio_programa button").click(function(){
        var idProg=$(this).attr("id");
        $(".directorio_anio button").hide();
         $(".directorio_anio").show();
        $(".directorio_anio #"+idProg).show();
    });
    
    $(".directorio_anio button").click(function(){
        var idAnio=$(this).attr("id");
        console.log(idAnio);
        $(".directorio_alumno button").hide();

         $(".directorio_alumno").show();
        $(".directorio_alumno #"+idAnio).show();
    });
 
}); 