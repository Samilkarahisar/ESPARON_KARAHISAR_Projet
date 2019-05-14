$('#add-to-bag-btn').click(function() {
    var productId = $(this).data('productid');
    var quantity = $('#quantity-input').val();
    var url = $(this).data('href');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        data: { productId : productId,
            quantity : quantity },
        success: function () {
            alert('Produit ajouté au panier !');
        }
    });
});