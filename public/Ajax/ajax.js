//var session;
//$.ajaxSetup({cache: false})
//$.get('ajax.php', function (data) {
//    session = data;
//    console.log(session);
//});

// to get session data :

//$.ajax({
//    url: 'http://localhost/Project_ecommerce/public/ajax/ajax.php',
//    cache: false,
//    type: 'POST',
//    success: function (data) {
//        console.log(data);
//
//    },
//    error: function (jqXHR, textStatus, errorThrown) {
//        alert("Error Code: " + jqXHR.status + ", Type:" + textStatus + ", Message: " + errorThrown);
//
//    }
//});


// to modify session data :

$(".cartQuantity").find('select').change(function () {
    var quantity = $(this).val();
    var id = $(this).parent().parent().parent().siblings('.cartId').html();
    $.ajax({
        type: "POST",
        url: "http://localhost/Project_ecommerce/public/ajax/ajax.php?id=" + id + "&quantity=" + quantity,
        //data: "quantity=" + $(this).val() + ",id=" + id,
        //success: function () {
        //    console.log('success');
        //}
    });

    return false;
});