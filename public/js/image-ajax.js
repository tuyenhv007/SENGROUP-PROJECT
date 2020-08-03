$(document).ready(function () {
    $("#imageUpload").change(function () {
        $('#result').html("");
        let total = document.getElementById("imageUpload").files.length;
        for (let i = 0; i < total; i++) {
            $('#result').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style=\"width: 200px;height: 200px\">");
        }
    });
});
