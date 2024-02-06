
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


    // Add Product Page
    // Depended ChildCategory on SubCategory
    $("select[name='sub_category']").on("change", function () {
        let subCatId = $("select[name='sub_category'] .subCatOpt:selected").val();
        if (subCatId) {
            $.ajax({
                type: "GET",
                url: '/dependedChildCategory/' + subCatId,
                dataType: "json",
                success: function (data) {
                    if (data != '') {
                        $("select[name='child_category']").empty();
                        $.each(data, function (index, value) {
                            $("select[name='child_category']").append(`<option value='${index}'>${value}</option>`);
                        });
                    } else {
                        $("select[name='child_category']").empty();
                    }
                }
            });
        } else {
            $("select[name='child_category']").empty();
        }
    });

    // Image Drag and Drop
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

});


$('[name=tags],[name=unit]').tagify({
    duplicates: false,
    maxItems: 5,
});

var quill = new Quill('#editor-textarea', {
    theme: 'snow',
    placeholder: 'Product Description...',
});

$(document).on('submit', function (delta, oldDelta, source) {
    // console.log(quill.root.innerHTML)
    $('#description').val(quill.container.firstChild.innerHTML);
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
