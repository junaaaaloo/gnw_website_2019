$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
})


$('.ui.dropdown').dropdown();
$('.ui.accordion').accordion();
$('.ui.modal').modal({
    closable: true
})