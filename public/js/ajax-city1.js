$(document).ready(function () {
    let origin = window.location.origin

    function getAllCity() {
        $.ajax({
            url: origin + '/houses/cities',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result, function (key, value) {
                    $('#citySearch').append($('<option>', {value: value.id, text: value.name}));
                });
            }
        })
    }

    getAllCity();

    $('#citySearch').change(function () {
        $("#districtSearch option").remove();
        let idCity = $(this).val();
        console.log(idCity)
        $.ajax({
            url: origin + '/houses/cities/' + idCity + '/district',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $('#districtSearch').append($('<option>', {value: '', text: "Quận/Huyện:"}));
                $.each(result, function (key, value) {
                    $('#districtSearch').append($('<option>', {value: value.id, text: value.name}));
                });
            },
            error: function () {
                alert('Có lỗi xảy ra!!!');
            }
        });
    });

    $('#districtSearch').change(function () {
        $("#roadSearch option").remove();
        let idRoad = $(this).val();
        console.log(idRoad)
        $.ajax({
            url: origin + '/houses/district/' + idRoad + '/road',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $('#roadSearch').append($('<option>', {value: '', text: "Xã/Phường:"}));
                $.each(result, function (key, value) {
                    $('#roadSearch').append($('<option>', {value: value.id, text: value.name}));
                });
            },
            error: function () {
                alert('Có lỗi xảy ra!!!');
            }
        });
    });

})
