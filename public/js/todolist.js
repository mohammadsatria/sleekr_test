function store() {
    var url         = $('.formStore').attr('action');
    var description = $('#todo').val();
    var token       = $('meta[name="csrf-token"]').attr('content');


    if (description == '') {
        alert('Please fill todo !');
        return false;
    } else {
        var data = {
            '_token'      : token,
            'description' : description
        };

        $.ajax({
            type    : 'POST',
            url     : url,
            dataType: 'json',
            data    : data,
            success: function(data) {
                $('#todo').val('');
                goToPage(data.redirect);
            }
        });

    }
}


function goToPage(url) {
    $.ajax({
        type: 'GET',
        url : url,
    }).done(
        function(data){
            $('.table-responsive').html(data);
       }
   );
}


function editData(id) {
    $('#tdEdit_'+id).show();
    $('#tdEditButton_'+id).show();
    $('#realData_'+id).hide();
    $('#last_'+id).hide();
}


function saveData(id, flag){
    var url         = $('#urlSave').val();
    var description = $('#editValue_' + id).val();
    var token       = $('meta[name="csrf-token"]').attr('content');
    var status      = $('#status_' + id).val();


    if (description == '') {
        alert('Please fill todo !');
        return false;
    } else {
        var data = {
            '_method'     : 'PUT',
            '_token'      : token,
            'description' : description,
            'id'          : id,
            'status'      : status,
            'flag'        : flag
        };

        $.ajax({
            type    : 'POST',
            url     : url,
            dataType: 'json',
            data    : data,
            success: function(data) {
                $('#todo').val('');
                goToPage(data.redirect);
            }
        });

    }
}

function deleteData(id) {
    var url   = $('#urlDelete').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    data  = {
        '_token' : token,
        'id'     : id
    };

    $.ajax({
        type    : 'POST',
        url     : url,
        dataType: 'json',
        data    : data,
        success: function(data) {
            goToPage(data.redirect);
        }
    });
}
