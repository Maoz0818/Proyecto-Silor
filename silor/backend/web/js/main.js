
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
    if ($(".navbar").offset().top > 10) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".navbar").css("opacity", "0.8");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".navbar").css("opacity", "1");
    }
});


$(document).on('click', 'input[type="checkbox"]', function() {      
    $('input[type="checkbox"]').not(this).prop('checked', false);      
});

$(document).on('click', "input[type='checkbox']", (function() {
        if($("input[type='checkbox']").is(':checked')) {  
            $('#event-espacio_id').val($("input[type='checkbox']:checked").val());  
        } else { 
            $('#event-espacio_id').val(""); 
        };  
})); 

$(document).on('click', '.fc-future', function(){
    var title = $(this).attr('data-date');
    $('#event-fecha').val(title);
    $( ".btn-success" ).click();  
});

$(document).on('click', '#guardar-reserva', function(){
    var fecha = $('#event-fecha').val();
    var hora1 = $('#event-horainicio').val().substr(0,5);
    var hora2 = $('#event-horafin').val().substr(0,5);
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

// obtener la id del formulario y establecer el manejador de eventos Espacios
$("form#espacio-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
        form.attr("action")+"&submit=true",
        form.serialize()
        )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#espacio-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos Categorias
$("form#categoria-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
    form.attr("action")+"&submit=true",
    form.serialize()
    )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#categoria-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos Edificios
$("form#edificio-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
    form.attr("action")+"&submit=true",
    form.serialize()
    )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#edificio-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos Equipos
$("form#equipo-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
    form.attr("action")+"&submit=true",
    form.serialize()
    )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#equipo-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos Actualizar estado eventos
$("form#event-form-update").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
    form.attr("action")+"&submit=true",
    form.serialize()
    )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#reservas-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos Usuarios
$("form#user-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
    form.attr("action")+"&submit=true",
    form.serialize()
    )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#user-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos
$("form#tipo-espacio-form").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
        form.attr("action")+"&submit=true",
        form.serialize()
        )
    .done(function(result) {
        form.parent().html(result.message);
        $.pjax.reload({container:"#tipo-espacio-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

// obtener la id del formulario y establecer el manejador de eventos
$("form#event-form-calendario").on("beforeSubmit", function(e) {
    var form = $(this);
    $.post(
        form.attr("action")+"&submit=true",
        form.serialize()
        )
    .done(function(result) {
        form.parent().html(result.message);
        //$.pjax.reload({container:"#tipo-espacio-grid"});
    });
    return false;
}).on("submit", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});