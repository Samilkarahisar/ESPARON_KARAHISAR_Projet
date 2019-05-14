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
        }
    });
});

var totalPriceElements = $('.total-price-product');

$('.quantity-input').each(function(i) {
    $(this).on('input', function() {
        var priceUnit = $(this).data('priceunit');
        var quantity = $(this).val();
        var totalPriceElement = $(totalPriceElements[i]);
        var oldPrice = parseFloat(totalPriceElement.html());
        var newPrice = (priceUnit * quantity).toFixed(2);
        var difference = newPrice - oldPrice;
        totalPriceElement.html(newPrice);
        var totalOrderElement = $('#total-order');
        var totalOrderPrice = parseFloat(totalOrderElement.html());
        totalOrderElement.html((totalOrderPrice + difference).toFixed(2));
    });
});

$('.delete-btn').each(function() {
    $(this).click(function() {
        var idToDelete = $(this).data('id');
        var url = $(this).data('href');
        var parent = $(this).closest('.product');
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
                    if($('#items').children().length == 0) {
                        location.reload();
                    }
                });
            }
        });
    });
});