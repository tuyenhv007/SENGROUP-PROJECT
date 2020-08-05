$(document).ready(function () {
    $("#avatar").change(function () {
        $('#result').html("");
        let avatar = document.getElementById("avatar").files;
        console.log(avatar);
            $('#result').append("<img src='" + URL.createObjectURL(event.target.files[0]) + "' style=\"width: 200px;height: 200px\">");
    });
});
