/* 
 * @tutorial Sesi "Transfer of technology"
 * Penggunaan AppGen - API Manager dan 
 * pembangunan API Service dengan mengggunakan
 * PHP dan MySQL
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mzm@kpkt.gov.my
 * @date	: 17hb Februari 2015
 * @location 	: Makmal Komputer, Bahagian Teknologi Maklumat,
 *             	  Kementerian Kesejahteraan Bandar, Perumahan Dan Kerajaan Tempatan	
 */


/**
 * Define URL
 * @type String
 */
var url = 'http://localhost/php_pdo_api/';

/**
 * Append Modal to body
 */
var viewModal =
        '<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
        '  <div class="modal-dialog" role="document">' +
        '    <div class="modal-content">' +
        '      <div class="modal-body"></div>' +
        '    </div>' +
        '  </div>' +
        '</div>';

$('body').append(viewModal);


/**
 * Add AJAX
 * @param {type} param
 */
$('.add-ajax').click(function () {
    $('.modal-body').load('add_form.php', function (result) {
        $('#formModal').modal({show: true});
        $('#formModal').on('shown.bs.modal', function () {
            data_save();
        });

    });
});

/**
 * Update AJAX
 * @param {type} param
 */
$('.edit-ajax').click(function () {
    $('.modal-body').load('edit_form.php', function (result) {
        $('#formModal').modal({show: true});
        $('#formModal').on('shown.bs.modal', function () {

            //Get id of data row
            var user_id = $('.edit-ajax').attr("id").split("-")[1];
            data_get(user_id);
            data_update();

        });

    });
});

function data_save() {
    $('#btn-save').click(function () {
        var data = {
            "btn": $('#btn-save').val(),
            "fname": $('#fname').val(),
            "femail": $('#femail').val(),
            "fphone": $('#fphone').val()
        };
        //consoe.log(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: url + "api/api_add.php",
            data: data,
            success: function (res) {
                if (res['status'] == 'berjaya') {
                    var html;
                    html += '<tr id="user-' + res['data']['id'] + '">';
                    html += '<td>' + res['data']['id'] + '</td>';
                    html += '<td>' + res['data']['name'] + '</td>';
                    html += '<td>' + res['data']['email'] + '</td>';
                    html += '<td>' + res['data']['phone'] + '</td>';
                    html += '<td>';
                    html += '<a href="edit.php?edit_id=' + res['data']['id'] + '" class="btn btn-info btn-sm">Edit Form</a>';
                    html += '<a id="edit-' + res['data']['id'] + '" class="btn btn-primary btn-sm">Edit Ajax</a>';
                    html += '</td>';
                    html += '</tr>';
                    $('#index_users tbody').append(html);
                }
            }
        });
    });
}

function data_get(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url + "api/api_get.php",
        data: {"user_id": id},
        success: function (res) {
            if (res['status'] == 'berjaya') {
                $('#user_id').val(res['data']['id']);
                $('#fname').val(res['data']['name']);
                $('#femail').val(res['data']['email']);
                $('#fphone').val(res['data']['phone']);
            }
        }
    });
}

function data_update() {
    $('#btn-update').click(function () {
        var data = {
            "btn": $('#btn-update').val(),
            "user_id": $('#user_id').val(),
            "fname": $('#fname').val(),
            "femail": $('#femail').val(),
            "fphone": $('#fphone').val()
        };
        //consoe.log(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: url + "api/api_edit.php",
            data: data,
            success: function (res) {
                if (res['status'] == 'berjaya') {
                    var html;
                    html += '<tr id="user-' + res['data']['id'] + '">';
                    html += '<td>' + res['data']['id'] + '</td>';
                    html += '<td>' + res['data']['name'] + '</td>';
                    html += '<td>' + res['data']['email'] + '</td>';
                    html += '<td>' + res['data']['phone'] + '</td>';
                    html += '<td>';
                    html += '<a href="edit.php?edit_id=' + res['data']['id'] + '" class="btn btn-info btn-sm">Edit Form</a>';
                    html += '<a id="edit-' + res['data']['id'] + '" class="btn btn-primary btn-sm">Edit Ajax</a>';
                    html += '</td>';
                    html += '</tr>';
                    $("#user-" + res['data']['id']).replaceWith(html);
                }
            }
        });
    });
}