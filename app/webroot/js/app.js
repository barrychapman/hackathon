
$(function() {

    $(document.body).on('click', '#HandleRequestSubmit', function(event) {

        alert('hi');

        $('#RequestForm').submit();

        event.preventDefault();
        event.stopPropagation();

    });


});