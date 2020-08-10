function displayFormRating() {
    document.getElementById('form-rating').style.display = 'block';
}

// $(function (){
//     let listStar =  $(".list_star .fa");
//     listRatingText = {
//         1 : 'Không thích',
//         2 : 'Tạm được',
//         3 : 'Bình thường',
//         4 : 'Tốt',
//         5 : 'Tuyệt vời',
//     };
//
//     listStar.mouseover(function (e) {
//         let $this = $(this);
//         let number = $this.attr('data-key');
//         listStar.removeClass('rating_active')
//
//         $.each(listStar, function (key, value){
//             if (key + 1 <= number)
//             {
//                 $(this).addClass("rating_active")
//             }
//         })
//
//         $(".list_text").text("").text(listRatingText[number]).show();
//     })
// });




