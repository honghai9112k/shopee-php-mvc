$(document).ready(function () {
    $("#Username").keyup(function () {
        var user = $(this).val();

        $.post("./Ajax/checkUsername", { un: user }, function (data) {
            $(".msgUsername").html(data);
        })
    });
});

// $(document).ready(function () {
//     $("#addCartBtn").click(function () {
//         $.post("./mvc/controllers/Ajax/addCart", {}, function (data1) {
//             $(".countItemCart").html(data1);
//         })
//     });
// });
// $("body").on("click","#addCartBtn",function(){
    //     $.post("http://localhost/bookstore-mvc/mvc/controllers/Ajax/addCart", {}, function(data) {
    //         $("#countItemCart").html(data);
    //     });
    // });