function Cart() {
    // Updates the total price in the cart section
    this.setTotalPrice = function () {
        var total = 0;

        $('.cartItem').each(function () {
            total += parseFloat($(this).find('select').val()) * parseFloat($(this).find('.cartPrice').html());
        });
        $('.subtotal').html((Math.round(total * 100) / 100).toFixed(2));
    }

    // Updates the cart's number of products in the header while in the cart section
    this.setTotalProducts = function () {
        var total = 0;

        $('.cartItem').each(function () {
            total += parseInt($(this).find('select').val());
        });
        $('.header__cart').html((total * 100) / 100);
    }
}


var cart = new Cart();
cart.setTotalPrice();
$('.cartQuantity').find('select').change(function () {
    var self = $(this);
    console.log('change');
    cart.setTotalPrice();
    cart.setTotalProducts();
});


$("input[name=address]:radio").change(function () {
    if ($('input[name=address]:checked').val() == 'new') {
        $(".order__newaddress").removeAttr("disabled");
    } else {
        $(".order__newaddress").attr("disabled", "disabled");
    }
});

$(document).ready(function() {
    $('select').material_select();
});



$('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
);


$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

$(".button-collapse").sideNav();

$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.collapsible').collapsible();
});


$(document).ready(function(){
    $('.slider').slider({full_width: true});
});


$(document).ready(function(){
    $('.materialboxed').materialbox();
});