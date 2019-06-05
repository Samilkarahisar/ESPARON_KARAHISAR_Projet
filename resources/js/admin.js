$('.confirm-btn').each(function() {
    $(this).on('click', function() {
        var idToConfirm = $(this).data('id');
        var url = $(this).data('url');
        var parent = $(this).closest('.card');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            data: { orderId : idToConfirm },
            success: function () {
                parent.hide(function() {
                    parent.remove();
                    if($('#accordion').children().length === 0) {
                        location.reload();
                    } else {
                        $('#toast-header').html('Succès');
                        $('#toast-body').html('Commande confirmée !');
                        $('.toast').toast('show');
                    }
                });
            }
        });
    });
});