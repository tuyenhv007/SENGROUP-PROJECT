$(function () {
    $('form-register').validate({
        rules: {
            name: {
                require: true,
            },
            email: {
                require: true,
                email: true,
                unique: true
            },
            password: {
                require: true,
                minLength: 6,
                maxLength: 12
            },
            phone: {
                require: true,
                unique: true
            }
        },
        message: {
            name: {
                require: "Tên không được để trống",
            },
            email: {
                require: "Email không đươc để trống",
                email: "Email không đúng định dạng",
                unique: "Email đã tồn tại"
            },
            password: {
                require: "Mật khẩu không được để trống",
                minLength: "Mật khẩu phải nhiều hơn 6 ký tự",
                maxLength: "Mật khẩu phải ít hơn 12 ký tự"
            },
            phone: {
                require: "Số điện thoại không được để trống",
                unique: "Số điện thoại đã tồn tại"
            }
        },
        submitHandler : function () {
            console.log ('xxx');
        }
    })
});
