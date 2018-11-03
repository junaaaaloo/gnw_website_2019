$("#navbar .hamburger_menu").click(() => {
    $("#navbar").toggleClass("open", 200);

    if ($("#navbar").hasClass("open")) {

        $("#overlay").css("background", "black");
        $("#overlay").css("z-index", "4");
        $("#overlay").css("opacity", "0.8");
        
        $("body").css("overflow", "hidden");
        return;
    } 

    $("#overlay").css("background", "none");
    $("#overlay").css("z-index", "2");
    $("#overlay").css("opacity", "0.4");
    
    $("body").css("overflow", "");
})