
$(function() {

    $(document.body).on('click', '#HandleRequestSubmit', function(event) {

        $('#RequestForm').submit();

        event.preventDefault();
        event.stopPropagation();

    });


});