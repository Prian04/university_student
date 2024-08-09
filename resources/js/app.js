import './bootstrap';
$(document).ready(function() {
    // Handle form submission for create and edit
    $('#studentForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var formAction = $(this).attr('action');
        var method = $(this).attr('method');

        $.ajax({
            url: formAction,
            method: method,
            data: formData,
            success: function(response) {
                $('#studentForm')[0].reset();
                $('#modalForm').modal('hide');
                $('#students-table').DataTable().ajax.reload(); // Assuming you are using DataTables
                alert('Student saved successfully');
            },
            error: function(xhr) {
                alert('An error occurred while saving the student');
            }
        });
    });
});


        $(document).ready(function() {
            $('#students-table').DataTable();
        });
   