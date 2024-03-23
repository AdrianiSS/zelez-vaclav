$(document).ready(function(){
    $(".toggle").on("click", function(){
        if($(".menu").hasClass("active")){
            $(".menu").removeClass("active");
            $(this).find("a").html("<ion-icon name='menu_outline'></ion-icon>");
        } else{
            $(".menu").addClass("active");
            $(this).find("a").html("<ion-icon name='close_outline'></ion-icon>");
        }
    })
})