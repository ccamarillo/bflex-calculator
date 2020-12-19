$(function() {
   
    $('.button').click(function(event) {
        event.preventDefault()
        $(this).addClass('loading')
        console.log($(event.target).data('loading-text'))
        $(this).html($(this).data('loadingText'))
    })
});