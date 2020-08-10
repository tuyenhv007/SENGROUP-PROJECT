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
                    $('#roadSearch').append($('<option>', {value: value.name, text: value.name}));
                });
            },
            error: function () {
                alert('Có lỗi xảy ra!!!');
            }
        });
    });

    $('#roadSearch').change(function () {
        $('#searchAjax').remove();
        let road = $(this).val();
        console.log(road)
        $.ajax({
            url: origin + "/houses/search/" + road,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log(result[0].data)
                $.each(result[0].data, function (key, value) {
                    $('#searchAjax').append($('#nameHouse').append(
                        // `<div class="col-md-6 col-lg-4 mb-5 mb-lg-5" id="result">
                        //         <div class="ftco-media-1">
                        //             <div class="ftco-media-1-inner">
                        //                 <a href="{{route('houses.show',value.id)}}"
                        //                    class="d-inline-block mb-4"><img
                        //                         src="{{asset("storage/".value.images[0].image)}}"
                        //                         alt="FImageo"
                        //                         class="img-fluid"
                        //                         style="height: 400px;width: 300px;margin: auto"></a>
                        //                 <div class="ftco-media-details">
                        //                     <h3 id="nameHouse"><i class='fas fa-tags'></i> &nbsp;value.name</h3>
                        //                     <br>
                        //                     <strong><i class='fas fa-map-marker-alt'></i>
                        //                         &nbsp;{{value.address}},
                        //                         &nbsp;{{value.road}},
                        //                         {{value.district}},
                        //                         {{value.city}}</strong>
                        //                     <strong>
                        //                         <br><i class="fa fa-money"></i> &nbsp;{{number_format(value.price)}}
                        //                         VNĐ</strong>
                        //                     <br>
                        //                     <strong
                        //                         class="@if((value.status)===\\App\\Http\\Controllers\\HouseStatus::EMPTY)
                        //                             text-success
                        //                             @elseif((value.status)===\\App\\Http\\Controllers\\HouseStatus::INHABITED)
                        //                             text-danger
                        //                             @else
                        //                             text-warning
                        //                             @endif">
                        //                         <i class='fas fa-house-user'></i> &nbsp; Tình
                        //                         Trạng: {{value.status}} </strong>
                        //                     <br>
                        //                     <strong><i class="fa fa-edit"></i>
                        //                         &nbsp;{{ value.created_at.diffForHumans() }}.</strong>
                        //
                        //                 </div>
                        //             </div>
                        //         </div>
                        //     </div>`
                        ));
                });

            },
            error: function () {
                alert('Có lỗi xảy ra!!! ');
            }
        });
    });
})
