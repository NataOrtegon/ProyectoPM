/* global hoy, fecha_nacimiento */

$(document).ready(function(){
	$(".btnEliminarItem").click(function(){
		var id = $(this).attr("id").split("-")[1];
		$("#btnEliminar").attr("href", urlDelete + id);
	});
});
  $(function () {
               
                $("#fecha_inicio").datepicker({
                    dateFormat: "yy-mm-dd",
                     
                    minDate: GetTodayDate(),
                    //minDate: 0
                    onSelect: function (dateText, inst) {
                        $('#fecha_final').val("");
                        $('#fecha_final').datepicker("option", "minDate", new Date(dateText));
                    }                    
                });
                
                $("#fecha_final").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            function GetTodayDate() {
                var tdate = new Date();
                var dd = tdate.getDate(); //yields day
                var MM = tdate.getMonth(); //yields month
                var yyyy = tdate.getFullYear(); //yields year
                var today = yyyy + "-" + (MM + 1) + "-" + dd;

                return today;
            }
         $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#fecha_nacimiento" ).datepicker();
  } );
  
  $(function() {
$.datepicker.regional['es'] =

 {

 closeText: 'Cerrar',

 prevText: 'Previo',

 nextText: 'Próximo',
  
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0,
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);
   $( "#datapicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });

  

            
         
            
         