function overlayMenu (open) {
    if (open) {
        $("#overlay").css("background", "black");
        $("#overlay").css("z-index", "4");
        $("#overlay").css("opacity", "0.8");
        
        $("body").css("overflow", "hidden");
        return;
    }

    $("#overlay").css("background", "none");
    $("#overlay").css("z-index", "2");
    $("#overlay").css("opacity", "0.4");
    
    $("body").css("overflow", "auto");
    $("#navbar").removeClass("open");
}

$("#navbar .hamburger_menu").click(() => {
    $("#navbar").toggleClass("open", 200);
    overlayMenu($("#navbar").hasClass("open"))
})

function mediaQuery (css) {
    overlayMenu(css.matches && $("#navbar").hasClass("open"))
}

let documentChange = window.matchMedia("(max-width: 767px)");
documentChange.addListener(mediaQuery);

$("#login_modal").modal({
	onHide () {
		window.history.replaceState({}, document.title, "/")
	}
})

$(".login-button").click(() => {
	$('#login_modal').modal('show');
})

function change () {
	let query = new URLSearchParams(location.search)
	if (query.get("login_show") == 1) {
		$('#login_modal').modal('show');
	}
}

change();
