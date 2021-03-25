$(document).ready(function(){
    $('input').tooltipster({ //find more options on the tooltipster page
        trigger: 'custom', // default is 'hover' which is no good here
        position: 'right',
        animation: 'grow',
        theme: 'tooltipster-borderless'
    });
    $("#frmRegistro").validate({
        errorPlacement: function (error, element) {
            var ele = $(element),
                err = $(error),
                msg = err.text();
            if (msg != null && msg !== '') {
                ele.tooltipster('content', msg);
                ele.tooltipster('open');
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        },
        rules: {
            txtCedula: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 12
            },
            txtNombre:{
                required: true,
                minlength: 3,
                maxlength: 20
            },
            txtFecha:{
                required: true,
                date: true
            },
            txtEdad:{
                required: true,
                digits: true,
                min: 18,
                max: 99
            },
            txtEmail:{
                required: true,
                email: true,
            }
        },
        messages: {
            txtCedula:{
                required: "Por favor ingrese su cedula",
                digits: "Por favor ingrese unicamente valores numericos",
                minlength: "La cedula debe tener por lo menos 6 caracteres",
                maxlength: "La cedula debe tener maximo 12 caracteres"
            },
            txtNombre:{
                required: "Por favor ingresar su nombre",
                minlength: "El nombre debe tener por lo menos 3 caracteres",
                maxlength: "El nombre no debe tener mas de 20 caracteres"
            },
            txtFecha:{
                required: "Por favor ingres su fecha de nacimiento",
                date: "Ingrese una fecha valida"
            },
            txtEdad:{
                required: "Por favor ingrese su edad",
                min: "Para registrarse debe ser mayor de edad",
                max: "El campo edad no debe ser superior a 99"
            },
            txtEmail:{
                required: "Por favor ingrese su correo electronico",
                email: "Ingrese un correo electronico valido"
            }
        }
    });
    $("#btnRegistrar").click(function(){
        if($("#frmRegistro").valid()==false) return;
        $.ajax({
            data: $("#frmRegistro").serialize(),
            url: "registrar.php",
            type: "POST",
            beforeSend: function(){
                $("#response").html("procesando...");
            },
            success: function(resp){
                $("#response").html(resp+"<br><input type='button' value='cerrar' id='close'>");
                $("#response").show(1000);
                $("#close").click(function(){
                    $("#response").hide(1000);
                });
            } 
        });
    });
});