
$(document).on('click', '#activity-index-link', (function() {
        $.get(
        $(this).data('url'),
        function (data) {
            $('.modal-body').html(data);
            $('#modal').modal();
        }
        );
}));

$(document).scroll(function() {
    if ($(".navbar").offset().top > 20) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});


$(document).on('click', 'input[type="checkbox"]', function() {      
    $('input[type="checkbox"]').not(this).prop('checked', false);      
});

$(document).on('click', "input[type='checkbox']", (function() {
        if($("input[type='checkbox']").is(':checked')) {  
            $('#itemespacio-espacio_id').val($("input[type='checkbox']:checked").val());  
        } else { 
            $('#itemespacio-espacio_id').val(""); 
        };  
})); 

// $(function(){
//     $(document).on('click', '.fc-future', function(){
//         var title = $(this).attr('data-date');
//         $.get("/index.php/event/create", {title: title}, function(respuesta){
//         $(".event-title").html(respuesta);
//         });
//     });
// });


// $(function(){
//     $(document).on('click', '.fc-future', function(){
//         var date = $(this).attr('data-date');
//         window.location.replace('/index.php/event/create');
//         //$('.btn-success').click();
//     });
// });

$(document).on('click', '.fc-future', function(){
    var title = $(this).attr('data-date');
    $('#event-fecha').val(title);
    $( ".btn-success" ).click();  
});

$(document).on('click', '#guardar-reserva', function(){
    var fecha = $('#event-fecha').val();
    var hora1 = $('#event-horainicio').val();
    var hora2 = $('#event-horafin').val();
    var fecha_hora1 = fecha.concat(" ",hora1);
    var fecha_hora2 = fecha.concat(" ",hora2);
    $('#event-start_date').val(fecha_hora1);
    $('#event-end_date').val(fecha_hora2);
    if(!($("input[type='checkbox']").is(':checked'))) 
    {  
        document.getElementById("mensaje-espacios").innerHTML = "Debes seleccionar un espacio";

    }else 
    { 
        document.getElementById("mensaje-espacios").innerHTML = ""; 
    };   
});


