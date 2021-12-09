$(document).ready(function(){
    $("#Username").keyup(function(){
        var user = $(this).val();
        
        $.post("./Ajax/checkUsername", {un:user}, function(data) {
            $(".msgUsername").html(data);
        })
    });
});