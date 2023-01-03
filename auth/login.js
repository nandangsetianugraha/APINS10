$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        var username = $("#username").val(), password = $("#password").val(), tapel = $("#tapel").val(), smt = $("#smt").val();

        if ((username === "") || (password === "")) {
			const liveToast = new bootstrap.Toast(document.querySelector('#liveToast'));
			liveToast.show();
        } else {
            $.ajax({
                type: "POST",
                url: "checklogin.php",
                data: "username=" + username + "&password=" + password + "&tapel=" + tapel + "&smt=" + smt,
                dataType: 'JSON',
				success: function (html) {
                    $("#loading").hide();
					$(".loader").hide();
                    if (html.response === 'true') {
						const liveToast1 = new bootstrap.Toast(document.querySelector('#liveToast1'));
						$("#pesan").html("Login Sukses <br/> Tunggu sebentar.... Anda akan dialihkan ke Halaman Admin");
						liveToast1.show();
						setTimeout(function () {
							location.href="../";
						},3000);
						return html.username;
                    } else {
						const liveToast1 = new bootstrap.Toast(document.querySelector('#liveToast1'));
						$("#pesan").html(html.response);
						liveToast1.show();
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#loading").show();
					$(".loader").show();
                }
            });
        }
        return false;
    });
});