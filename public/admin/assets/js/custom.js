$(document).ready(function () {
    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Sweet Alert
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        let link = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                }
            });
    });

});


// Store and Update with Ajax Custom Method
function ajaxStoreAndUpdate(method, url, data, modalId, toastrMsg) {
    $.ajax({
        type: method,
        url: url,
        data: data,
        success: function (response) {
            if (response.status == 'success') {
                $('.error-msg').hide();
                $(modalId).modal('hide');
                $(this).trigger('reset');
                $('.table').load(location.href + ' .table');
                toastr.success(toastrMsg);
            }
        }, error: function (err) {
            let error = err.responseJSON;
            $.each(error.errors, function (index, value) {
                $('.error-msg').append(`<span class="text-danger">${value}</span><br>`);
            });
        }
    });
}

// Delete with Ajax Custom Method
function ajaxDeleteWithToastr(method, url, data, toastrMsg) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function (response) {
                        if (response.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            toastr.success(toastrMsg);
                        }
                    }
                });
            }
        });
}
