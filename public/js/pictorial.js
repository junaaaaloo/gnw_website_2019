$(document).ready(function() {
    var pictorialTable = $('#pictorialTable').DataTable();
});

$(document).on("click", "#schedulePhoto", function() {
    $("#schedModal").modal('toggle');
});

function timeslotDate() {
    var date = $("#tsDate").val();
    var sepDate = listToArray(date, '/');
    $("#month").val(sepDate[0]);
    $("#day").val(sepDate[1]);
};

function timeslotTime() {
    var time = $("#tsTime").val();
    switch(time) {
        case "1":
            $("#startTime").val("9:00");
            $("#endTime").val("9:45");
            break;
        case "2":
            $("#startTime").val("9:45");
            $("#endTime").val("10:30");
            break;
        case "3":
            $("#startTime").val("10:30");
            $("#endTime").val("11:15");
            break;
        case "4":
            $("#startTime").val("11:15");
            $("#endTime").val("12:00");
            break;
        case "5":
            $("#startTime").val("13:00");
            $("#endTime").val("13:45");
            break;
        case "6":
            $("#startTime").val("13:45");
            $("#endTime").val("14:30");
            break;
        case "7":
            $("#startTime").val("14:30");
            $("#endTime").val("15:15");
            break;
        case "8":
            $("#startTime").val("15:15");
            $("#endTime").val("16:00");
            break;
        case "9":
            $("#startTime").val("16:00");
            $("#endTime").val("16:45");
            break;
        case "10":
            $("#startTime").val("9:00");
            $("#endTime").val("13:45");
            break;
    }
};

function listToArray(fullString, separator) {
  var fullArray = [];

  if (fullString !== undefined) {
    if (fullString.indexOf(separator) == -1) {
      fullAray.push(fullString);
    } else {
      fullArray = fullString.split(separator);
    }
  }

  return fullArray;
}

function changeDate() {
    var collegeSelect = $("#college");
    var college = collegeSelect.val();
    var dates = [];
    switch(college) {
        case "1": dates = [ "February 26, 2018", "February 27, 2018", 
                            "February 28, 2018", "March 1, 2018", 
                            "March 2, 2018", "March 3, 2018"];
            break;
        case "2": dates = [ "January 29, 2018", "January 30, 2018", 
                            "January 31, 2018", "February 1, 2018", 
                            "February 2, 2018", "February 17, 2018"];
            break;
        case "3": dates = [ "February 5, 2018", "February 6, 2018", 
                            "February 7, 2018", "February 8, 2018", 
                            "February 9, 2018", "February 10, 2018", ];
            break;
        case "4": dates = [ "February 12, 2018", "February 13, 2018", 
                            "February 14, 2018", "February 15, 2018", 
                            "March 9, 2018", "February 17, 2018", ];
            break;
        case "5": dates = [ "February 19, 2018", "February 20, 2018", 
                            "February 21, 2018", "February 22, 2018", 
                            "February 23, 2018", "February 24, 2018"];
            break;
        case "6": dates = [ "March 5, 2018", "March 6, 2018", 
                            "March 7, 2018", "March 10, 2018"];
            break;
        case "7": dates = [ "March 5, 2018"];
            break;
    }

    var dateSelect = $("#date");
    dateSelect.empty();
    console.log("Date: " + dates[0]);

    var newOption;
    newOption = document.createElement("option"); 
    newOption.text= "Date";  
    dateSelect.append(newOption); 

    for(var i = 0; i < dates.length; i++) {
        newOption = document.createElement("option"); 
        newOption.value = i;
        newOption.text= dates[i];  
        dateSelect.append(newOption); 
    }
};
