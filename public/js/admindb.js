$(document).ready(function() {
	var idTable = $('#idTable').DataTable({
		columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0]
        }]
	});
	var subTable = $('#subTable').DataTable({
		columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1, 2]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0, 2 ]
        }]
	});
	var paymentTable = $('#paymentTable').DataTable({
		columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1, 2]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0, 2 ]
        }]
	});
	var newsTable = $('#newsTable').DataTable({
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0]
        }]
    });
	var adminTable = $('#adminTable').DataTable();
});

// NEWS
$(document).on("click", ".news-row", function() {
    var subject = $(this).data("subject");
    var message = $(this).data("message");
    var id = $(this).data("id");
    var creator = $(this).data("user");

    $("#managesubject").val(subject);
    $("#managemessage").val(message);
    $("#editid").val(id);
    $("#deleteid").val(id);
    $("#editby").val(creator);
    $("#managesubject").prop("disabled", true);
    $("#managemessage").prop("disabled", true);
    $("#submitedit").hide();
    $("#manageBtns").show();
    $("#manageNewsModal").modal('toggle');
});

$(document).on("click", "#manageedit", function() {
    $("#managesubject").prop("disabled", false);
    $("#managemessage").prop("disabled", false);
    $("#submitedit").show();
    $("#manageBtns").hide();
});

$(document).on("click", "#managedelete", function() {
    $("#deleteNewsMethod").submit();
});

$(document).on("click", "#editNewsBtn", function() {
    var subject = $("#managesubject").val();
    var message = $("#managemessage").val();

    $("#editsubject").val(subject);
    $("#editmessage").val(message);
    $("#editNewsMethod").submit();
});


// ADMIN
$(document).on("click", ".admin-row", function() {
    var id = $(this).data("id");
	var idnum = $(this).data("idnum");
    var name = $(this).data("name");
    var email = $(this).data("email");
    var position = $(this).data("position");
    var role = $(this).data("role");

    $("#id").val(id);
    $("#deleteid").val(id);
    $("#adminid").val(idnum);
    $("#adminname").val(name);
    $("#adminemail").val(email);
    $("#adminposition").val(position);
    $("#adminrole").val(role);
    $("#manageAdminModal").modal('toggle');
});

$(document).on("click", "#addadmin", function() {
    $("#addid").val('');
    $("#addname").val('');
    $("#addposition").val('');
    $("#addrole").val('');
    $("#addemail").val('');
    $("#addpw").val('');
    $("#addAdminModal").modal('toggle');
});

$(document).on("click", "#admindelete", function() {
    $("#deleteAdminMethod").submit();
});

// ID
$(document).on("click", "#addID", function() {
    $("#addIDModal").modal('toggle');
});

$(document).on("click", ".reg-row", function() {
    var idNum = $(this).data("idnum");
    var id = $(this).data("id");
    var status = $(this).data("status");

    $("#editid").val(id);
    $("#editidnum").val(idNum);
    switch(status) {
    	case 0: $("#editidstatus").val("Pending"); 
                $("#editidnum").prop("disabled", true);
                $("#editIDBtn").hide(); break;
    	case 1: $("#editidstatus").val("Active");
                $("#editidnum").prop("disabled", true); 
                $("#editIDBtn").hide(); break;
    	case -1: $("#editidstatus").val("Inactive");
                $("#editidnum").prop("disabled", false);
                $("#editIDBtn").show(); break;
    }

    $("#editIDModal").modal('toggle');
});

// Subscribers
$(document).on("click", ".sub-row", function(e) {
    var id = $(this).data("id");
    console.log(id);
    window.location.href = "subscriber/" + id;
});

// PAYMENTS

$(document).on("click", ".payment-row", function() {
    var id = $(this).data("id");
    var ybstatus = $(this).data("ybstatus");
    var pstatus = $(this).data("pstatus");
    var dstatus = $(this).data("dstatus");

    $("#idnum").val(id);
    $("#ybstatus").val(ybstatus);
    $("#pstatus").val(pstatus);
    $("#dstatus").val(dstatus);

    $("#paymentsModal").modal('toggle');
});