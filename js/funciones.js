/*$.validator.setDefaults({
 submitHandler: function() {
 alert("submitted!");
 },
 showErrors: function(map, list) {
 // there's probably a way to simplify this
 var focussed = document.activeElement;
 if (focussed && $(focussed).is("input, textarea")) {
 $(this.currentForm).tooltip("close", {
 currentTarget: focussed
 }, true)
 }
 this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
 $.each(list, function(index, error) {
 $(error.element).attr("title", error.message).addClass("ui-state-highlight");
 });
 if (focussed && $(focussed).is("input, textarea")) {
 $(this.currentForm).tooltip("open", {
 target: focussed
 });
 }
 }
 });
 $("#signupForm input:not(:submit)").addClass("ui-widget-content");
 
 $(":submit").button();
 */
jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});
jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "ingrese letras por favor");
var form = $("#myform");
form.validate();
$("button").click(function () {
    alert("Valid: " + form.valid());
});
$(document).ready(function () {
    $("#commentForm").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3,
                lettersonly: false
            },
            descripcion: {
                required: true,
                minlength: 10,
                lettersonly: false
            },
            tipo_usuario: {
                required: true,
                minlength: 1,
                lettersonly: true
            },
            id_usuEmpresa: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            genero: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            fecha_nacimiento:
                    {
                        required: true,
                        minlength: 1,
                        lettersonly: false
                    },
            id_usuPromocion: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            id_categoria: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            tipo_puntuacion: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            direccion: {
                required: true,
                minlength: 5,
                lettersonly: false
            },
            telefono: {
                required: true,
                minlength: 5,
                lettersonly: false
            },
            cantidad: {
                required: true,
                minlength: 1,
                lettersonly: false
            },
            fecha_creacion:
                    {
                        required: true,
                        minlength: 1,
                        lettersonly: false
                    },
            fecha:
                    {
                        required: true,
                        minlength: 1,
                        lettersonly: false
                    },
            fecha_inicio:
                    {
                        required: true,
                        minlength: 1,
                        lettersonly: false
                    },
            fecha_final:
                    {
                        required: true,
                        minlength: 1,
                        lettersonly: false
                    },
            ciudad: {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            precio_actual: {
                required: true,
                minlength: 3,
                lettersonly: false
            },
            comment: "required",
            txturl: "url",
            email: {
                required: true,
                email: true
            },
            radio1: "required",
            //seleccionar: "required",
            /*seleccionar_again: {
             diferentTo: "#seleccionar"
             },*/

            nota: {
                range: [1, 5]
            },
            edad: "number",
            contrasena: "required",
            contrasenar: {
                equalTo: "#contrasena"
            }
        },
        messages: {
            nombre: {
                required: "Campo obligatrio",
                minlength: "El Nombre debe ser minimo de 3 letras"
            },
            descripcion: {
                required: "Campo obligatrio",
                minlength: "La descripcion debe tener minimo 10 letras "
            },
            tipo_usuario: {
                required: "El tipo de usuario es obligatorio",
                minlength: "el tipo de usuario debe tener minimo 5 letras"
            },
            id_usuEmpresa: {
                required: "Seleccione una empresa",
                minlength: "el tipo de usuario debe tener minimo 5 letras "
            },
            genero: {
                required: "El genero es obligatorio",
                minlength: "no found :)"
            },
            id_usuPromocion: {
                required: "Seleccione un usuario",
                minlength: "el tipo de usuario debe tener minimo 5 letras "
            },
            fecha_creacion: {
                required: "Fecha obligatoria",
                minlength: "s "
            },
            fecha_nacimiento: {
                required: "Fecha obligatoria",
                minlength: "s "
            },
            fecha_inicio: {
                required: "Fecha obligatoria",
                minlength: " n"
            },
            fecha_final: {
                required: "Fecha obligatoria",
                minlength: "n"
            },
            fecha: {
                required: "Fecha obligatoria",
                minlength: "n"
            },
            id_categoria: {
                required: "Seleccione una categoria",
                minlength: "La categoria debe tener minimo 3 letras "
            },
            tipo_puntuacion: {
                required: "Seleccione un tipo",
                minlength: "el tipo de puntuacion debe tener minimo 4 letras "
            },
            direccion: {
                required: "Campo Obligatrio",
                minlength: "direccion debe tener minimo 5 letras "
            },
            telefono: {
                required: "Campo Obligatrio",
                minlength: "telefono debe tener minimo 5 numeros ",
                number: "Ingrese solo numeros"
                
            },
            cantidad: {
                required: "Campo Obligatrio",
                minlength: "cantidad debe tener minimo 1 numero"
            },
            ciudad: {
                required: "Campo Obligatrio",
                minlength: "ciudad debe tener minimo 3 letras"
            },
            precio_actual: {
                required: "Campo Obligatrio",
                minlength: "precio debe tener minimo 3 numeros"
            },
            radio1: "Escoja el estado", //{
            //required: "Escoja el estado"
            //},
            /*seleccionar: "No puede ser igual",
             seleccionar_again: "No puede ser igual",*/
            comment: "Campo Obligatrio",
            txturl: "Debe ingresar una url correcta",
            email: {
                required: "Campo Obligatrio",
                email: "Ingrese un correo electrónico valido",
            },
            edad: "La edad debe ser un número",
            contrasena: "Campo Obligatrio",
            contrasenar: "Las contraseñas no coinciden"
        },
        submitHandler: function (form) {
            form.submit();
            //event.preventDefault();
        },
        invalidHandler: function (event, validator) {
            var errors = validator.numberOfInvalids();//cantidad errores
            //alert("Cantidad de errores: "+errors)
        },
        // La idea es que descomente una por una y pruebe que pasa
        /*errorLabelContainer: "#messageBox",
         wrapper: "li",*/

        /*showErrors: function(errorMap, errorList) {
         $("#messageBox").show();
         $("#messageBox").html("Tu formulario tiene " + this.numberOfInvalids()+ " errores, corrige los campos con la información correcta.");
         this.defaultShowErrors();
         }*/

        /*success: function(label) {
         label.addClass("valid").text("Ok!")
         },*/


    });

    // Evento para Validar que el formulario puede ser o no enviado
    $(".validarBoton").click(function () {
        alert("Valid: " + $("#commentForm").valid());
    });

    $(".resetForm").click(function () {
        var validator = $("#commentForm").validate();
        validator.resetForm();
    });



    function validarfecha() {
        var inicio = document.getElementById('fecha_inicio').value;
        var finalq = document.getElementBy('fecha_final').value;
        inicio = new Date(inicio);
        finalq = new Date(finalq);
        if (inicio > finalq)
            alert('La fecha de inicio puede ser mayor que la fecha fin');
    }
});