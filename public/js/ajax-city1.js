$(document).ready(function () {
    let origin = window.location.origin

    function getAllCity() {
        $.ajax({
            url: origin + '/houses/cities',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result, function (k, v) {
                    $('#citySearch').append($('<option>', {value: v.id, text: v.name}));
                });
            }
        })
    }

    getAllCity();

    $('#citySearch').change(function () {
        $("#districtSearch option").remove();
        let idCity = $(this).val();
        $.ajax({
            url: origin + '/houses/cities/' + idCity + '/district',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $('#districtSearch').append($('<option>', {value: '', text: "Quận/Huyện:"}));
                $.each(result, function (k, v) {
                    $('#districtSearch').append($('<option>', {value: v.id, text: v.name}));
                });
            },
            error: function () {
                alert('error...');
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
                $.each(result, function (k, v) {
                    $('#roadSearch').append($('<option>', {value: v.name, text: v.name}));
                });
            },
            error: function () {
                alert('error...');
            }
        });
    });

    $('#roadSearch').change(function () {
        let road = $(this).val();
        console.log(road)
        $.ajax({
            url: origin + "/houses/search/" + road,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log(result[0].data)
                // $.each(result[0].data, function (k, v) {
                //     $('#search').append($('#result').append(v))
                // });
            },
            error: function () {
                alert('error...');
            }
        });
    });
})
