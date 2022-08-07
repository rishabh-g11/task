$(document).ready(function () {

    // Delete article Ajax request.
    $(document).on("click", ".deleteRecord", function () {
        var id = $(this).data('id');
        var URL = $(this).data('action');
        console.log(id);
        console.log(URL);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#delete").off().click(function () {

            $.ajax({
                url: URL,
                type: 'delete',
                dataType: 'json',
                success: function (data) {
                    if (data.status == 'success') {
                        $('.flash-message').hide();
                        $('.ajaxMessage').html(
                            '<div class="alert alert-success alert-dismissable">' +
                            '<button type="button" class="close close-sm" data-dismiss="alert">' +
                            ' <i class="fa fa-times"></i>' +
                            '</button>' +
                            data.success +
                            '</div>'
                        );
                        window.location.reload();
                    }
                }
            });

        });
    });

});