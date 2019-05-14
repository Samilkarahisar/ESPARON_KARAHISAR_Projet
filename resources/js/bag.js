$('#add-to-bag-btn').click(function() {
    var productId = $(this).data('productid');
    var url = $(this).data('href');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        data: { productId : productId },
        success: function () {
            alert('Produit ajouté au panier !');
        }
    });
});