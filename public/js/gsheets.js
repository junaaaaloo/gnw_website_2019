$(document).ready(function() {
    
    $(document).on("click", "#sc-aff", function(e) {
    	var comment = $("#comment-aff").val();
    	
    	const url='https://docs.google.com/forms/d/e/1FAIpQLSfZPO0TPve28toXx4Lb4LxM9ScfQa-OVM18upz5YpRroHcdmg/viewform?&entry.1266102776=' + comment + '&submit=Submit';
    	
    	window.open(url);
    	
    	$("#comment-aff").val('');
    });
    
    $(document).on("click", "#sc-basinf", function(e) {
    	var comment = $("#comment-basinf").val();
    	
    	const url='https://docs.google.com/forms/d/e/1FAIpQLSfVuG6-jXC17K0zWCQ8IiAyAx_1sm9xcZWA0Te3p4ikdO_TLg/viewform?usp=pp_url&entry.924099727=' + comment + '&submit=Submit';
    	
    	window.open(url);
    	
    	$("#comment-basinf").val('');
    });
    
    $(document).on("click", "#sc-deladd", function(e) {
    	var comment = $("#comment-deladd").val();
    	
    	const url='https://docs.google.com/forms/d/e/1FAIpQLSc1v3JBryH04qgGffxIHpbv6_08ZPojR_ifXqZTtc9qgf2rZg/viewform?usp=pp_url&entry.1266102776=' + comment + '&submit=Submit';
    	
    	window.open(url);
    	
    	$("#comment-deladd").val('');
    });
    
    $(document).on("click", "#sc-writeup", function(e) {
    	var comment = $("#comment-writeup").val();
    	
    	const url='https://docs.google.com/forms/d/e/1FAIpQLScUDTCHaiqERCJmOFQAaSXuSe-GRmrg_5v28G3jUMe8sQCi0g/viewform?usp=pp_url&entry.1266102776=' + comment + '&submit=Submit';
    	
    	window.open(url);
    	
    	$("#comment-writeup").val('');
    });
    
});

