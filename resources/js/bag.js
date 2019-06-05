$('#update-btn').click(function() {
    var url = $(this).data('href');
    var quantityInputsArray = $('.quantity-input').serializeArray();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        data: { ordersProducts : quantityInputsArray },
        success: function () {
            $('#toast-header').html('Succès');
            $('#toast-body').html('Panier mis à jour !');
            $('.toast').toast('show');
        }
    });
});

$('.quantity-input').each(function(i) {
    $(this).on('input', function() {
        var priceUnit = $(this).data('priceunit');
        var quantity = $(this).val();
        var totalPriceElement = $(this).parent().parent().find('.total-price-product');
        var oldPrice = parseFloat(totalPriceElement.html());
        var newPrice = (priceUnit * quantity).toFixed(2);
        var difference = newPrice - oldPrice;
        totalPriceElement.html(newPrice);
        var totalOrderElement = $('#total-order');
        var totalOrderPrice = parseFloat(totalOrderElement.html());
        var total = (totalOrderPrice + difference).toFixed(2) + ' €';
        totalOrderElement.html(total);
        var fullTotalOrderElement = $('#full-total-order');
        fullTotalOrderElement.html(total);
    });
});

$('.delete-btn').each(function() {
    $(this).click(function() {
        var idToDelete = $(this).data('id');
        var url = $(this).data('href');
        var parent = $(this).closest('.product');
        var totalPriceProduct = parseFloat($(this).parent().parent().find('.total-price-product').html().replace(' €', ''));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            data: { orderProductId : idToDelete },
            success: function () {
                parent.hide(function() {
                    parent.remove();
                    var totalOrderElement = $('#total-order');
                    var totalOrderPrice = parseFloat(totalOrderElement.html());
                    var total = (totalOrderPrice - totalPriceProduct).toFixed(2) + ' €';
                    totalOrderElement.html(total);
                    var fullTotalOrderElement = $('#full-total-order');
                    fullTotalOrderElement.html(total);
                    if($('#items').children().length === 0) {
                        location.reload();
                    } else {
                        $('#toast-header').html('Succès');
                        $('#toast-body').html('Article supprimé du panier !');
                        $('.toast').toast('show');
                    }
                });
            }
        });
    });
});
