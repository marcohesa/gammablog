function message_error(obj) {
    var html;
    if(typeof (obj) === 'object') {
        html = '<ul style="text-align: left;">';
        $.each(obj, function(key, value) {
            html+='<li style="list-style: none;">'+value+'</li>';
            console.log(key+': '+value);
        });
    } else {
        html = '<p>'+obj+'</p>';
    }

    html+='</ul>';
    Swal.fire({
        title: '¡Error!',
        html: html,
        icon: 'error',
    })
}

function capitalize(word) {
  return word[0].toUpperCase() + word.slice(1);
}

function submit_with_ajax(url, parameters, callback) {
    $.confirm({
        theme: 'material',
        title: 'Confirmación',
        icon: 'fa fa-info',
        content: '¿Estás seguro de realizar la siguiente acción?',
        columnClass: 'small',
        typeAnimated: true,
        cancelButtonClass: 'btn-primary',
        draggable: true,
        dragWindowBorder: false,
        buttons: {
            info: {
                text: "Si",
                btnClass: 'btn-primary',
                action: function () {
                  $.ajax({
                        url: url,
                        type: 'POST',
                        data: parameters,
                        dataType: 'json',
                        processData: false,
                        contentType: false,

                    }).done(function(data) {
                        if(!data.hasOwnProperty('error')) {
                            callback();
                            return false;
                        }
                        message_error(data.error);
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+': '+errorThrown);
                    }).always(function(data) {

                    });
                }
            },
            danger: {
                text: "No",
                btnClass: 'btn-red',
                action: function () {

                }
            },
        }
    })
}

function delete_register(url, parameters, callback) {
    $.confirm({
        theme: 'material',
        title: 'Confirmación',
        icon: 'fa fa-info',
        content: '¿Estás seguro de realizar la siguiente acción?',
        columnClass: 'small',
        typeAnimated: true,
        cancelButtonClass: 'btn-primary',
        draggable: true,
        dragWindowBorder: false,
        buttons: {
            info: {
                text: "Si",
                btnClass: 'btn-primary',
                action: function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: parameters,
                        dataType: 'json',
                    }).done(function(data) {
                    if(!data.hasOwnProperty('error')) {
                        callback();
                        return false;
                    }
                    message_error(data.error);
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+': '+errorThrown);
                    }).always(function(data) {

                    });
                }
            },
            danger: {
                text: "No",
                btnClass: 'btn-red',
                action: function () {

                }
            },
        }
    })
}