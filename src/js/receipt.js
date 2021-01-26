$(function() {
    $.ajax({
        type: 'get',
        url: $('h1').data('url'),
        dataType: 'text',
        success: function (data, status, jqXHR) {
            window.location = data
            // let formData = new FormData($('form')[0]);
            // $('input[name="blob"]').attr('value', data)
            // $('form').submit()
        },
        error: function (msg, textStatus, errorThrown) {
            alert('An error occurred while loading the brochure.  Close this window and try again. ' + errorThrown)
        }
    })
});
