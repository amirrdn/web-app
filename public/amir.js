$(document).on('click', '.Editlinks', function (e) {
    var id = $(this).attr("value");
    DetailLinks(id);
});

function DetailLinks(id) {
    $('body').loading({
        theme: 'light'
    });
    $('.modal-title').html("Edit Link");
    $('#btn-cancel').html("Close");
    $('#btn-save').hide();
    $('.modal-body').load("{{ url('/modal-edit-link') }}/" + id, function () {
        $('#LinkEDIT').modal('show');
        $('body').loading('stop');
    });
}
$(document).on('click', '#viewlink', function (e) {
    var id = $(this).attr("value");
    ViewLink(id);
});

function ViewLink(id) {
    $('body').loading({
        theme: 'light'
    });
    $('.modal-title').html("Detail Link");
    $('#btn-cancel').html("Close");
    $('#btn-save').hide();
    $('.modal-body').load("{{ url('/modal-view-link') }}/" + id, function () {
        $('#LinkEDIT').modal('show');
        $('body').loading('stop');
    });
}
$(document).ready(function () {

    var t = $('#role-table').DataTable({
        'searching': true,
        'responsive': true,
        "columnDefs": [{
            "searchable": false,
            "orderable": false
        }],
        "order": [
            [1, 'asc']
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route("getLink") !!}',
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                searchable: false,
                sortable: false
            },
            {
                "data": null,
                "sortable": false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'link_name',
                name: 'link_name'
            },
            {
                data: 'link',
                name: 'link',
                searchable: true,
                sortable: false
            },
            {
                data: 'action',
                name: 'action',
                searchable: true,
                sortable: false
            },
        ]
    });
    $('#searchquery').on('submit', function (e) {
        var owner = $('#searchquery input[name=owner]').val();
        var account_name = $('#searchquery input[name=account_name]').val();

        console.log(owner)
        $('.account_name').val(account_name);
        $('.owner').val(owner);
        $('.query_search').val();
        $('#myModal').modal('toggle');

        t.draw();
        e.preventDefault();
    });

    $('#example-select-all').click(function (e) {
        var rows = $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });


    $(document).on('change keyup', 'input[type=search]', function () {
        $('.query_search').val($(this).val());
        $('.account_name').val('');
        $('.owner').val('');
    })
    $(document).on('click', '.delete_all', function () {
        var allVals = [];
        $(':checkbox:checked').each(function (i) {
            allVals[i] = $(this).val();
        });
        if (allVals.length <= 0) {
            alert("Please select row.");
        } else {
            var join_selected_values = allVals.join(",");
            swal({
                title: "Are you sure?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: '{{ route("deletelinkarray") }}',
                    data: {
                        id: join_selected_values,
                        _token: '{{csrf_token()}}'
                    },
                    type: 'post',
                    dataType: "json",

                    success: function (data) {
                        swal("Done!", "It was succesfully delete!", "success");
                        $('#role-table').DataTable().ajax.reload()
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error delete!", "Please try again", "error");
                    }
                });
            });
        }
    });

    $(document).on('click', '#delete', function (id) {
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            //text: "You will not be able to recover this imaginary file!",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: '/delete-links/' + id,
                type: 'get',
                data: {
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function () {
                    swal("Done!", "It was succesfully delete!", "success");
                    $('#role-table').DataTable().ajax.reload()
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error delete!", "Please try again", "error");
                }
            });
        });
    });
});

$(document).on('submit', '#demoForm', function (e) {
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Creates new FormData object
    e.preventDefault();
    $.ajax({
        url: post_url,
        type: request_method,
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('table').loading({
                theme: 'light'
            });
            $('#LinkEDIT button').prop('disabled', true);
        },
        success: function (data) {
            $('#LinkEDIT button').prop('disabled', false);
            $('#LinkEDIT').modal('hide');
            $('.modal-backdrop').css('display', 'none');
            toastr.success('Success edit data');
            $('#role-table').DataTable().ajax.reload()
        },
        complete: function (data) {
            $('.loading-overlay.loading-theme-light').css('display:none !important');
            $('table').loading('stop');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('table').loading('stop');
            swal("Error send message!", "Please try again", "error");
            $('#LinkEDIT button').prop('disabled', false);
        }
    });
    return false;
});
