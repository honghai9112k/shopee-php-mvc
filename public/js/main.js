$(document).ready(function () {
    $("#Username").keyup(function () {
        var user = $(this).val();

        $.post("./Ajax/checkUsername", { un: user }, function (data) {
            $(".msgUsername").html(data);
        })
    });
});

$(document).ready(function () {
    $(".minusBtn").click(function () {
        var idBookItem = $("#Id_bookItem-Cart").val();
        $.post("./Ajax/minusItem", {id: idBookItem}, function (data1) {
            $(".amount-Cart").html(data1);
            alert(idBookItem);
        })
    });
});


// function minusBookItem(id_bookItem) {
//     alert(id_bookItem);
// }











// $("body").on("click","#addCartBtn",function(){
    //     $.post("http://localhost/bookstore-mvc/mvc/controllers/Ajax/addCart", {}, function(data) {
    //         $("#countItemCart").html(data);
    //     });
    // });