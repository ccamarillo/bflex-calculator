$(function() {
    $.ajax({
        type: 'get',
        url: $('h1').data('url'),
        dataType: 'binary',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            let url = URL.createObjectURL(data);
            window.location = url

        },
        error: function (msg, textStatus, errorThrown) {
            alert('An error occurred while loading the brochure.  Close this window and try again.')
        }
    })
});
