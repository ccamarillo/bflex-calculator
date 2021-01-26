$(function() {
    $.ajax({
        type: 'get',
        url: $('h1').data('url'),
        dataType: 'text',
        success: function (data, status, jqXHR) {
            window.location = data
        },
        error: function (msg, textStatus, errorThrown) {
            alert('An error occurred while loading the brochure.  Close this window and try again. ' + errorThrown)
        }
    })
});
