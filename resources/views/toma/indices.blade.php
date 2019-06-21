<script>

//Creacion de tablas de planes para el informe y exportar
$(document).ready(function() {
    var table=$('#table_productos').DataTable({
        'language':{
            'url':'{{asset('Spanish.json')}}'
        },
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        text: '<i class="far fa-file-excel"></i> Exportar excel',
        fieldSeparator: ';',
        className:'btn btn-info',
        title: null,
        footer: false,
        filename:'Ventas_<?php echo date('Y_m_s');?>',
        exportOptions: {
            orthogonal: 'filter',
        }
    }]
  });

    $('#fecha_inicio,#fecha_final').datepicker({
      language: "es",
      orientation: "bottom",
      format: "yyyy-mm-dd"
    });
});

//Funcion para traer datos de informes desde la base de datos
$('#form_productos').on('submit', function(e){
    $('#search').attr('disabled','disabled').empty().append(' <i class="fa fa-circle-o-notch fa-spin"> </i> Buscando... ');
    $.ajax({
      url: '{{route('informe_producto')}}',
      type: 'post',
      data: $('#form_productos').serialize(),
      success: function(data) {
        console.log(data);
        var dat=JSON.parse(data);
        console.log(dat);
        $('#table_productos').DataTable().destroy();
        $('#tbody_productos_informe').empty();
        var cadena='';
        $.each(dat,function(index,val){
          cadena+=' <tr> <td> '+val.id+' </td> <td> '+val.user_id+' </td> <td> '+val.estado+' </td> <td> '+val.fecha+' </td> <td> $ '+val.total+' </td>  </tr>  ';
        });
        $('#tbody_productos_informe').append(cadena);
        $('#table_productos').DataTable({
          'language':{
            'url':'{{asset('Spanish.json')}}'
          },
          dom: 'Bfrtip',
          buttons: [{
            extend: 'excel',
            text: '<i class="far fa-file-excel"></i> Exportar excel',
            fieldSeparator: ';',
            className:'btn btn-info',
            title: null,
            footer: false,
            filename:'Planes_<?php echo date('Y_m_s');?>',
            exportOptions: {
                orthogonal: 'filter',
            }
          }]
        });
        $('#search').empty().append('<i class="fa fa-search"></i> Buscar ').removeAttr('disabled');  
      }
    });
    e.preventDefault();
});

</script>
