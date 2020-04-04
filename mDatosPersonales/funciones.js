//Variables globales
var blanco   = "#ffffff";
var negro    = "#000000";
var obscuro  = "#343A40";
var azul     = "#1278F4";
var verde    = "#2AA44E";
var rojo     = "#D9304B";
var amarillo = "#FFC107";
var celeste  = "#17A2B8";

$("#frmGuardar").submit(function(e){
    var clave     = $("#clave").val();
    var nombre    = $("#nombre").val();
    var apPaterno = $("#apPaterno").val();
    var apMaterno = $("#apMaterno").val();
    var fNac      = $("#fNac").val();
    var edad      = $("#edad").val();
    var correo    = $("#correo").val();
    var curp      = $("#curp").val();
    var domicilio = $("#domicilio").val();
    var sexo      = $("#sexo").val();
    var ecivil    = $("#ecivil").val();
    
    //transition -> slide , zoom , flipx , flipy , fade , pulse
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Sistema', 
        '¿Deseas guardar la información?', 
        function(){ 
            $.ajax({
                url:"../mDatosPersonales/guardar.php",
                type:"POST",
                dateType:"html",
                data:{clave,nombre,apPaterno,apMaterno,edad,fNac,correo,curp,domicilio,sexo,ecivil},
                success:function(respuesta){
                    console.log(respuesta);
                    $("#guardar").hide();
                    llenar_lista();
                    $("#frmGuardar")[0].reset();
                    selectTwo();
                    alertify.success("<i class='fa fa-save fa-lg'></i>",2);
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX");
                },
            });alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
        }, 
        function(){ 
            alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                }
    ).set('labels',{ok:'Guardar',cancel:'Salir'});
    e.preventDefault();
    return false;
});

/* $("#frmGuardar2").submit(function(e){
    var descripcion =$("#descripcion").val();
    
    //transition -> slide , zoom , flipx , flipy , fade , pulse
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Sistema', 
        '¿Deseas guardar la información?', 
        function(){ 
            $.ajax({
                url:"../mEcivil/guardar2.php",
                type:"POST",
                dateType:"html",
                data:{descripcion},
                success:function(respuesta){
                    console.log(respuesta);
                    $("#guardar2").hide();
                    llenar_lista2();
                    $("#frmGuardar2")[0].reset();
                    selectTwo();
                    alertify.success("<i class='fa fa-save fa-lg'></i>",2);
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX");
                },
            });alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
        }, 
        function(){ 
            alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                }
    ).set('labels',{ok:'Guardar',cancel:'Salir'});
    e.preventDefault();
    return false;
}); */


$("#frmGuardar2").submit(function(e){
    var descripcion    = $("#descripcion").val();

    //transition -> slide , zoom , flipx , flipy , fade , pulse
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Sistema', 
        '¿Deseas guardar la información?', 
        function(){ 
            $.ajax({
                url:"../mEcivil/guardar2.php",
                type:"POST",
                dateType:"html",
                data:{descripcion},
                success:function(respuesta){
                    console.log(respuesta);
                    $("#guardar2").hide();
                    llenar_lista2();
                    $("#frmGuardar2")[0].reset();
                    selectTwo();
                    alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
                },
                error:function(xhr, status){
                    alert("Error en metodo AJAX");
                },
            });
        }, 
        function(){ 
            alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                }
    ).set('labels',{ok:'Guardar',cancel:'Salir'});
    e.preventDefault();
    return false;
});

function selectTwo(){
    $(".select2").select2({
        theme: "bootstrap4",
        placeholder: 'Seleccione...'
    });
}

function llenar_lista(){
    // abrirModalCarga('Cargando Lista');
    $("#frmGuardar")[0].reset();
    $("#Listado1").hide();
    $.ajax({
        url:"../mDatosPersonales/lista1.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado1").html(respuesta);
            $("#Listado1").slideDown('slow');
            // cerrarModalCargar();
            $("#nombre").focus();
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX");
        },
    });
}

function llenar_lista2(){
    // abrirModalCarga('Cargando Lista');
    $("#frmGuardar2")[0].reset();
    $("#Listado2").hide();
    $.ajax({
        url:"../mEcivil/lista2.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado2").html(respuesta);
            $("#Listado2").slideDown('slow');
            // cerrarModalCargar();
            $("#descripcion").focus();
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX");
        },
    });
}

function combo_ecivil(){
    $.ajax({
        url:"../mDatosPersonales/comboEcivil.php",
        data:{},
        type:"POST",
        dateType:"html",
        success:function(respuesta){
            console.log(respuesta);
            $("#ecivil, #eEcivil, #Ecivil").empty();
            $("#ecivil, #eEcivil, #Ecivil").html(respuesta);
            selectTwo();
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX");
        },
    });
}

//Cambio de color jumbotron
function cambioColor(duracion, colorF, mensaje, colorL=blanco){
    $(".jumbotron , .hTabla").css({
        transition: 'background-color'+duracion+'ease-in-out',
        "background-color": colorF,
        color: colorL
    });
    $("#titular").html(mensaje);
}

function nuevo_registro(){
    $("#Listado1").hide();
    $("#guardar").fadeIn();
    $("#clave").focus();
}

function nuevo_registro2(){
    $("#Listado2").hide();
    $("#guardar2").fadeIn();
    $("#descripcion").focus();
}

$("#btnCancelarG , #btnCancelarA").click(function(){
    $("#editar").hide();
    $("#guardar").hide();
    $("#Listado1").fadeIn();
    cambioColor('.5s' , obscuro , "Programa de ejemplo", blanco)
});

$("#btnCancelar2").click(function(){
    $("#editar").hide();
    $("#guardar2").hide();
    $("#Listado2").fadeIn();
    cambioColor('.5s' , obscuro , "Programa de ejemplo", blanco)
});

$("#btnCancelarG, #btnCancelar2").mouseover(function(){
    cambioColor('.5s' , rojo , "Cancelar captura de Información")
});

$("#btnCancelarG, #btnCancelar2").mouseout(function(){
    cambioColor('.5s' , obscuro , "Programa de Ejemplo")
});

$("#btnGuardar, #btnGuardar2").mouseout(function(){
    cambioColor('.5s' , obscuro , "Programa de Ejemplo", blanco)
});

function inputs(){

    $("#btnGuardar, #btnGuardar2").mouseover(function(){
            if($(this).is('[disabled]')){
                cambioColor('.5s', rojo, 'Programa de ejemplo')
            }else{
                cambioColor('.5s', azul, 'Captura de Informacion')
            }
    });

    $("#curp , #eCurp").keyup(function(){
        valor=$(this);
        // Convierte en mayuscula
        valor.val(valor.val().toUpperCase());

        //Validar curp + expresion regular
        if (curpValida(valor.val())=="Si") {
            //$("#btnGuardar").removeAttr('disable');
            $(valor).css("color", obscuro);
            alertify.success("Curp valida!", 1);
            cambioColor('.5s', azul, 'Programa de ejemplo');
        }else{
            //$("#btnGuardar").attr('disabled', 'disable');
            $(valor).css("color", rojo);
            cambioColor('.5s', rojo, 'Curp no valida');
        }
    });
}

//solo numeros
function soloNumeros(e){
    if(event.shiftKey)
    {
         event.preventDefault();
    }
 
    if (event.keyCode == 46 || event.keyCode == 9 || event.keyCode == 8 )    {
    }
    else {
         if (event.keyCode < 95) {
           if (event.keyCode < 45 || event.keyCode > 57) {
                 event.preventDefault();
           }
         } 
         else {
               if (event.keyCode < 96 || event.keyCode > 105) {
                   event.preventDefault();
               }
         }
       }
}

//validar curp
function curpValida(valor) {

    var validador;
    var curp=valor;

    // Expresion regular para curp
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
    
    if (!validado){  //Coincide con el formato general?
        validador="No";
    }else{
        validador="Si";
    }
    return validador;
}


/*     //transition -> slide , zoom , flipx , flipy , fade , pulse
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Sistema', 
        '¿Deseas guardar la información?', 
        function(){ 


        }, 
        function(){ 
            alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                }
    ).set('labels',{ok:'Guardar',cancel:'Salir'}); */

function edad(fecha){
    $.ajax({    
        url:"../mDatosPersonales/calcularEdad.php",
        type:"POST",
        dateType:"html",
        data:{fecha},
        success:function(respuesta){
            $("#edad,#eEdad").val(respuesta);
            xedad=parseInt(respuesta);
            if(xedad < 0){
                cambioColor('.5s',rojo,'Fecha Invalida')
                $("#edad,#eEdad,#fNac,#efNac").css("color",rojo);
            }else{
                cambioColor('.5s',obscuro,'Programa de ejemplo')
                $("#edad,#eEdad,#fNac,#efNac").css("color",obscuro);
            }
     },
        error:function(xhr,status){
            alert("Error en metodo AJAX");
        },
    });
}

$("#fNac").change(function(){
    var fecha = $(this).val();
    edad(fecha);
});

function revisar_clave(valor){
    $.ajax({    
        url:"../mDatosPersonales/rClave.php",
        type:"POST",
        dateType:"html",
        data:{valor},
        success:function(respuesta){
            res=parseInt(respuesta);
            if(res == 0){
                cambioColor('.5s',obscuro,'Programa de ejemplo')
                $("#clave").css("color",obscuro);
            }else{
                cambioColor('.5s',rojo,'Clave repetida')
                $("#clave").css("color",rojo);
            }
     },
        error:function(xhr,status){
            alert("Error en metodo AJAX");
        },
    });
}

$("#clave").keyup(function(){
    var valor = $(this).val();
    revisar_clave(valor);
});

$(document).ready(function(){
    $(window).resize(function(){
        if($(this).width()<= 700){
            $(".btn").addClass("btn-block");
        }else{
            $(".btn").removeClass("btn-block");
        }
    });
});