$(document).ready(function () {
    initTable();
    $('.modal').modal({
        dismissible: false,
        onCloseEnd: clearModal
    });
    $('.fixed-action-btn').floatingActionButton({});
});

function clearModal() {
    console.log("Modal has closed");
}

function initTable() {
    getTableBody();
}

function getTableBody() {
    $.ajax('../api.php', {
        data: {
            'data': {
                method: 'get',
                entity: {
                    name:'persona'
                }
            }
        },
        type: 'POST',
        dataType: "json",
        success: function (data) {
            if (!data.err)
            // setTableBody(data);
                console.log(data);
            else
                console.log(data.err_msg);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            $('#post').html(msg);
        },
        beforeSend: function(){
            // console.log("This was executed before send data");
        }
    });
}

function setTableBody(data) {
    let thead = "";
    for (let i = 0; i < data.length; i++) {
        thead += "<tr>";
        thead += "<td class='center-align' id='codigo_" + (i + 1) + "'>" + data[i].codigo + "</td>";
        thead += "<td class='center-align' id='nombre_"+(i+1)+"'>" + data[i].nombre.toUpperCase() + "</td>";
        thead += "<td class='center-align' >" + getCheckField(data[i].activo, i + 1) + "</td>";
        thead += "<td class='center-align' onclick='editFruta(" + (i + 1) + ")' id='edit_" + (i + 1) + "'><i class='material-icons'>edit</i></td>";
        thead += "</tr>";
    }
    $('#tb_body_fruta').html(thead);
    // $('#tb_fruta').dataTable();
}

function validateFieldsToInsert() {
    return true;
}

function addNewUser() {
    if (validateFieldsToInsert()) {
        $.ajax('../api.php', {
            data: {
                'data': {
                    method: 'add',
                    entity: {
                        name:'persona',
                        data:{
                            persona: {
                                documento: 1,
                                nombre: 1,
                                tipoDoc: 1
                            }
                        }
                    },
                }
            },
            type: "POST",
            success: function (data) {
                if (data.err) {
                    console.log(data.err_msg);
                } else {
                    console.log("Fruta agregada");
                }
            }
        });
    } else {
        M.toast({
            html: "<span class='red-text text-lighten-3'>Faltan campos</span>",
            classes: 'rounded'
        });
    }
}
