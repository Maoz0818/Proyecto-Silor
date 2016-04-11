$(document).on('click', '#activity-index-link', (function() {
        $.get(
        $(this).data('url'),
        function (data) {
            $('.modal-body').html(data);
            $('#modal').modal();
        }
        );
}));
