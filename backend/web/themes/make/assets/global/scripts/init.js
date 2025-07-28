jQuery(document).ready(function () {
    $(".buttonlogout").click(function () {
        $("#form_logout").submit();
    })
    $("#usersearchadmin").load(urlhome + "site/searchuseradmin")
    $("#usersearchprop").load(urlhome + "site/searchuserprop")
    $("#change_pass").on("click", function (e) {
        $.metroMessageBox({
            title: "Cambiar contraseña",
            content: "Esta acción necesita autenticación",
            buttons: ["Aceptar", "Cancel"],
            defaultbutton: 1,
            input: "password",
            placeholder: "Entre la contraseña",
            icons: ["fa-lock", "fa-times"],
            activebutton: "#D6511C",
        }, function (action, button, value) {
            if (button == 'Aceptar') {
                $.ajax({
                    type: "POST",
                    url: urlhome + "/security/usuario/validatepass",
                    data: {
                        password: value,
                        _backendCSRF: _csrf
                    },
                    success: function (response) {
                        if (response.success == true) {
                            $('#form_change_pass').submit();
                        }
                        else {
                            img = urlhome + "../themes/make/assets/notifications/img/error.png ",
                                NotificationW8('#D91E18', 'Contraseña incorrecta', '', 5000, img)
                        }
                    },
                    error: function (response) {
                        if (response) {
                            img = urlhome + "../themes/make/assets/notifications/img/error.png ",
                                NotificationW8('#D91E18', 'Error en eliminacion', response.responseJSON.name, 5000, img)
                        }
                    }
                });
            }
            else {
                $('.mnMsgBoxTextContainer').hide();
            }

        });

    });
});