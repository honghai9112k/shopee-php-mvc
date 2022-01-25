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
        var classSmallCartAmount = '.amount-cartsmall' + Id_bookItem;
        $(classSmallCartAmount).html(data1);
        reloadMoney(Id_bookItem, newPrice, data1);
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
        var classSmallCartAmount = '.amount-cartsmall' + Id_bookItem;
        $(classSmallCartAmount).html(data1);
        reloadMoney(Id_bookItem, newPrice, data1);
    })
}
// Load lại tổng giá tiền mới sau khi click + -
function reloadMoney(Id_bookItem, newPrice, newMount) {
    var classMoneCart = '.sumMoney' + Id_bookItem;
    var sumMoney = newPrice * newMount;
    $(classMoneCart).html(sumMoney);
}

// click Mua hàng tại listcart
function handerOrderBtn(checkUser) {
    if (checkUser == 0) {
        alert("Vui lòng đăng nhập.!!!")
    } else {
        window.location.href = "http://localhost/shopee-php-mvc-dao/Order";
    }
}
// Reload price shipment khi thay đổi address
$(document).ready(function () {
    $('#addressIdOrder').on('change', function () {
        var Id_address = this.value;

        var count = $("#countCart").val();

        $.post("./Ajax/priceShipment", { idAdress: Id_address }, function (data2) {
            $(".costShipment").html(data2);
            sumCostnotShip(data2);
            sumPriceOrder(data2)
        })
    })
});

function sumCostnotShip(shipcost) {
    var count = $("#countCart").val();
    for (let i = 0; i < count; i++) {
        var classCost = ".sumCostOrder" + i;
        var idCost = "#sumMoneyNotShip" + i;

        var sumMoneyNotShip = $(idCost).val();

        var sumCost = Number(sumMoneyNotShip) + Number(shipcost);
        $(classCost).html(sumCost);
    }
}

function sumPriceOrder(shipcost) {
    var sumOderNotShip = $("#sumOderNotShip").val();
    var sumPriceOrder = Number(sumOderNotShip) + Number(shipcost);
    $(".sumMoneyOrdertxt").html(sumPriceOrder);
}
// Tìm Kiếm
$(document).ready(function () {
    $("#btnSearch").click(function () {
        var txtKey = $("#txtSearch").val();
        $.post("./Ajax/searchProduct", { key: txtKey }, function (data) {
            $(".app__container").html(data);
        })
    });
});
// Danh mục sản phẩm

function categoryAll(id) {
    event.preventDefault();
    $.post("./Ajax/GetBookCategory", { idCategory: id }, function (data) {
        $(".app__container").html(data);
    })
}

// $("body").on("click", "#btnSearch", function () {
//     var txtKey = $("#txtSearch").val();
//     alert("abcv");
//     $.post("./Ajax/searchProduct", { key: txtKey })
// });