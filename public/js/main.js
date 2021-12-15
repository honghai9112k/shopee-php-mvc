$(document).ready(function () {
    $("#Username").keyup(function () {
        var user = $(this).val();

        $.post("./Ajax/checkUsername", { un: user }, function (data) {
            $(".msgUsername").html(data);
        })
    });
});

// $(document).ready(function () {
//     $(".minusBtn").click(function () {
//         var idBookItem = $("#Id_bookItem-Cart").val();
//         $.post("./Ajax/minusItem", {id: idBookItem}, function (data1) {
//             $(".amount-Cart").html(data1);
//             alert(idBookItem);
//         })
//     });
// });

function minusBookItem(Id_bookItem) {
    var inputId = "#Id_bookItem-Cart" + Id_bookItem;
    var idBookItem = $(inputId).val();

    var priceId = "#newPrice" + Id_bookItem;
    var newPrice = $(priceId).val();

    $.post("./Ajax/minusItem", { id: idBookItem }, function (data1) {
        var classAmount = '.amount-Cart' + Id_bookItem;
        $(classAmount).html(data1);
        var classSmallCartAmount = '.amount-cartsmall'+ Id_bookItem;
        $(classSmallCartAmount).html(data1);
        reloadMoney(Id_bookItem,newPrice,data1); 
    })
}
function plusBookItem(Id_bookItem) {
    var inputId = "#Id_bookItem-Cart" + Id_bookItem;
    var idBookItem = $(inputId).val();

    var priceId = "#newPrice" + Id_bookItem;
    var newPrice = $(priceId).val();

    $.post("./Ajax/plusItem", { id: idBookItem }, function (data1) {
        var classAmount = '.amount-Cart' + Id_bookItem;
        $(classAmount).html(data1);
        var classSmallCartAmount = '.amount-cartsmall'+ Id_bookItem;
        $(classSmallCartAmount).html(data1);
        reloadMoney(Id_bookItem,newPrice,data1);       
    })
}
// Load lại tổng giá tiền mới sau khi click + -
function reloadMoney (Id_bookItem, newPrice, newMount) {
    var classMoneCart = '.sumMoney'+ Id_bookItem;
    var sumMoney = newPrice*newMount;
    $(classMoneCart).html(sumMoney);
}











// $("body").on("click","#addCartBtn",function(){
    //     $.post("http://localhost/bookstore-mvc/mvc/controllers/Ajax/addCart", {}, function(data) {
    //         $("#countItemCart").html(data);
    //     });
    // });