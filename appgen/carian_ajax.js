$(document).ready(function () {
    
    var carian = {
        submit: function () {
            var operation = 'http://emaps.kpkt.gov.my/emaps/emaps/api_emaps/semak_pajak.cfm';
            var noLesen = $('#noLesen').val();
            $.ajax({
                type: "POST",
                //data: {'no_lesen': noLesen},
                data: {'no_lesen': noLesen.toUpperCase()}, //this use for make data submit toUpperCase
                dataType: "json",
                url: operation,
                beforeSend: function () {
                    $("ul.keputusan").empty();
                },
                success: function (result) {
                    if (result.keputusan == 'berjaya') { //res.output
                        carian.divHide(2);
                        $('.result').html('Hasil Carian : ' + result.output.length);
                        $.each(result.output, function (key, v) {
                            var nama_org = v.NAMA_SYARIKAT;
                            var no_telefon = v.NO_TELEFON;
                            var no_lesen = v.NO_LESEN;
                            var alamat_operasi = v.ALAMAT_OPERASI;
                            var poskod = v.POSKOD;
                            var bandar = v.BANDAR;
                            var negeri = v.NEGERI;
                            var tarikh_akhirlesen = v.TEMPOH_TAMAT;
                            var dataAttr = 'data-info=\'{"nama":"' + nama_org + '", "tel":"' + no_telefon + '","lesen":"' + no_lesen + '","alamat":"' + alamat_operasi + '","poskod":"' + poskod + '","bandar":"' + bandar + '","negeri":"' + negeri + '","expired":"' + tarikh_akhirlesen + '"}\'';
                            var newBlock = '<li class="contentData"><a ' + dataAttr + ' href="#">' + nama_org + '</a></li>';
                            $('.keputusan').append(newBlock);

                        });
                    } else {
                        alert('Maklumat carian tidak dijumpai.');
                        carian.divHide(1);
                    }
                }
            });

            carian.divHide(2);
        },
        keputusan: function (tHis) {
            var nama = tHis.data('info').nama;
            var tel = tHis.data('info').tel;
            var lesen = tHis.data('info').lesen;
            var alamat = tHis.data('info').alamat;
            var poskod = tHis.data('info').poskod;
            var bandar = tHis.data('info').bandar;
            var negeri = tHis.data('info').negeri;
            var expired = tHis.data('info').expired;
            var infoText = 'Nama Syarikat : ' + nama + '\n'
                    + 'No Lesen : ' + lesen + '\n'
                    + 'Alamat : ' + alamat + ', ' + poskod + ' ' + bandar + ', ' + negeri + ' \n'
                    + 'No Telefon : ' + tel + '\n'
                    + 'Tarikh Tamat Lesen : ' + expired;
            alert(infoText);
        },
        divHide: function (type) {
            console.log(type);
            if (type === 1) {
                $('.displayForm').show();
                $('.displayResult').hide();
            } else {
                $('.displayForm').hide();
                $('.displayResult').show();
            }
        }

    };

    carian.divHide(1);
    $('.btnSubmit').tap({
        callback: function () {
            carian.submit();
        }
    });
    $('.btnKembali').tap({
        callback: function () {
            carian.divHide(1);
            $("input[type=text]").val('');
            $("ul.keputusan").empty();
        }
    });

    $(".keputusan").on('tap', 'a', function () {
        carian.keputusan($(this));
    });
});