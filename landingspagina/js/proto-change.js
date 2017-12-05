$(function() {
    $("li").on("click",function() {
        $(".nav ul li").css("background-color", "transparent");
        $(this).css("background-color", "#6896a9");
        x = "#" + $(this).attr('class');
        $(".container__proto__item").removeClass("block");
        $(".container__proto").css("transform","translateX("+$(this).index() * -40+"vh)");
        $(x).addClass("block");
    });
    $(".container__proto__item").on("click",function() {
        x = $(this).attr('id');
        if(x == "one"){
            y = "two";
            swipe = "-40vh";
        } else if (x == "two") {
            y = "tree";
            swipe = "-80vh";
        } else if(x == "tree"){
            y = "one";
            swipe = "0vh";
        }
        $(".container__proto__item").removeClass("block");
        $(".container__proto").css("transform","translateX("+swipe+")");
        $("#"+y).addClass("block");
        $(".nav ul li").css("background-color", "transparent");
        $("."+y).css("background-color", "#6896a9");
    });

});