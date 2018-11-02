var sub = $(".sub-section");
var done = $(".done-section");

$(document).ready(function() {
	done.hide();
	$(document).bind("contextmenu",function(e){
       return false;
     });
});