<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inventory</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="assets/img/minilogo.png" type="image/x-icon"/>
        <!-- Fonts and icons -->
        <script src="assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
            });
        </script>
        <!-- CSS Files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/azzara.min.css">
        <link rel="stylesheet" href="assets/css/indstyle.css">
    </head>
    <body class="login">
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
			    <div style="text-align: center;">
				    <img src="assets/img/polinema.png" width="45%" alt="Polinema Logo">
			    </div>
                <h3 class="text-center">Silahkan Login</h3>
            <div class="login-form">
                <form method="POST" action="cek_login.php">
                    <div class="form-group form-floating-label">
                        <input id="username" maxlength="15" name="username" type="text" class="form-control input-border-bottom" required>
                        <label for="username" class="placeholder">NIM/NIP</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" maxlength="15" name="password" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Password</label>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Login</button>
                    </div>
                </form>
                <div class="login-account">
                    <a href="https://forms.gle/L2UyShVKeDKRkjEC6" target= "_blank" class="link">Lupa Password ?</a>
                </div>
            </div>
                <div class="copyright">
                    &copy; 2023 Sistem Inventory JTI - 1.0
                </div>
            </div> 
        </div>
        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/ready.js"></script>
    </body>
</html>