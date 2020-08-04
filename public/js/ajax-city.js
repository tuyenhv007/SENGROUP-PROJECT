$(document).ready(function () {
    $("select[name='city']").change(function () {

        let city_id = $(this).val();
        console.log(city_id);
        let origin = location.origin;
        console.log(origin);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: origin + '/houses/post-form/' + city_id,
            method: 'POST',
            data: {},

            dataType: 'json',
            success: function (result) {
                console.log(this.url)
                $("select[name='district']").children().remove();
                $("select[name='district']").focus();
                $("select[name='district']").append(
                    "<option >" + "Quận/Huyện" + "</option>"
                );
                console.log(result);
                $.each(result, function (key, value) {
                    $("select[name='district']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                })
            },

        })
    })
    $("select[name='district']").change(function () {

        let district_id = $(this).val();
        console.log(district_id);
        let origin = location.origin;
        $.ajax({
            url: origin + '/houses/post-form/road/' + district_id,
            method: 'POST',
            data: {},

            dataType: 'json',
            success: function (result) {
                console.log(this.url)
                $("select[name='road']").children().remove();
                $("select[name='road']").focus();
                $("select[name='road']").append(
                    "<option >" + "Xã/Phường" + "</option>"
                );
                console.log(result);
                $.each(result, function (key, value) {
                    $("select[name='road']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                })
            },

        })
    })
})
