$(document).ready(function () {
    var jumlah = 12;
    var allFilled = true;
    var alertFilled;
    var carian = {
        submit: function () {

            //Validate each input
//            $('input[type=text]').each(function (index, element) {
//                if (element.value === '') {
//                    alertFilled[index] = element.name+'\n';
//                    allFilled = false;
//                }
//            });
            var fname = $('#fname');
            if (fname.val() == '') {
                alertFilled = fname.attr('name') + '\n';
                allFilled = false;
            }

            if (allFilled) {
                $('.result').html('Hasil Carian "' + fname.val() + '": ' + jumlah);
                this.divHide(2);
            } else {
                alert(alertFilled);
            }
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
    $('.btnSubmit').click(function () {
        carian.submit();
    });
    $('.btnKembali').click(function () {
        carian.divHide(1);
        $("input[type=text]").val('');
        $('.result').html('');
    });

});