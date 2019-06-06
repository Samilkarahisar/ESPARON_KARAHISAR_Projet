$('#use-address-shipping-checkbox').change(function() {
    if($(this).prop('checked')) {
        var url = $(this).data('href');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                $('#shipping_address_first_name').val(data.first_name);
                $('#shipping_address_last_name').val(data.last_name);
                $('#shipping_address_street_1').val(data.street_1);
                $('#shipping_address_street_2').val(data.street_2);
                $('#shipping_address_zip_code').val(data.zip_code);
                $('#shipping_address_city').val(data.city);
                $('#shipping_address_country').val(data.country);

                $('#shipping-part').find('input').each(function () {
                    $(this).css({"background": "#F8F8F8", "pointer-events": "none"}).prop('readonly', true);
                });
            }
        });
    } else {
        $('#shipping-part').find('input').each(function () {
            $(this).val('');
            $(this).css({"background": "", "pointer-events": ""}).prop('readonly', false);
        });
    }
});

$('#use-address-billing-checkbox').change(function() {
    if($(this).prop('checked')) {
        var url = $(this).data('href');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                $('#billing_address_first_name').val(data.first_name);
                $('#billing_address_last_name').val(data.last_name);
                $('#billing_address_street_1').val(data.street_1);
                $('#billing_address_street_2').val(data.street_2);
                $('#billing_address_zip_code').val(data.zip_code);
                $('#billing_address_city').val(data.city);
                $('#billing_address_country').val(data.country);

                $('#billing-part').find('input').each(function () {
                    $(this).css({"background": "#F8F8F8", "pointer-events": "none"}).prop('readonly', true);
                });

                $('#same-address-checkbox-container').hide();
            }
        });
    } else {
        $('#billing-part').find('input').each(function () {
            $(this).val('');
            $(this).css({"background": "", "pointer-events": ""}).prop('readonly', false);
        });

        $('#same-address-checkbox-container').show();
    }
});

$('#same-address-checkbox').change(function() {
    if($(this).prop('checked')) {
        $('#billing_address_first_name').val($('#shipping_address_first_name').val());
        $('#billing_address_last_name').val($('#shipping_address_last_name').val());
        $('#billing_address_street_1').val($('#shipping_address_street_1').val());
        $('#billing_address_street_2').val($('#shipping_address_street_2').val());
        $('#billing_address_city').val($('#shipping_address_city').val());
        $('#billing_address_zip_code').val($('#shipping_address_zip_code').val());
        $('#billing_address_country').val($('#shipping_address_country').val());

        $('#billing-part').find('input').each(function () {
            $(this).css({"background": "#F8F8F8", "pointer-events": "none"}).prop('readonly', true);
        });

        $('#use-address-billing-checkbox-container').hide();
    } else {
        $('#billing-part').find('input').each(function () {
            $(this).val('');
            $(this).css({"background": "", "pointer-events": ""}).prop('readonly', false);
        });

        $('#use-address-billing-checkbox-container').show();
    }
});


