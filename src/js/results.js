$(function() {
   
    $('.button').click(function(event) {
        event.preventDefault()
        $(this).addClass('loading')
        $(this).html($(this).data('loadingText'))
    })
});