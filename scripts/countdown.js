var countdown_to = new Date("Nov 6, 2018 08:00:00").getTime();

var countdown_interval = setInterval(function() {
    var now = new Date().getTime();

    var distance = countdown_to - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = ("00" + days).slice(-2)
    document.getElementById("hours").innerHTML = ("00" + hours).slice(-2)
    document.getElementById("minutes").innerHTML = ("00" + minutes).slice(-2)
    document.getElementById("seconds").innerHTML = ("00" + seconds).slice(-2)

    if (distance < 0) {
        clearInterval(countdown_interval);
        document.getElementById("timer").innerHTML = "Website will be up soon";
    }
}, 1000);