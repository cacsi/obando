<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obando - Login</title>
    <!-- <link rel="icon" href="Obando.ico" type="image/*" /> -->
    <link rel="stylesheet" href="source/auth/auth.css">
    <link rel="stylesheet" href="libraries/basic.css">
    <script src="libraries/axios.js"></script>
    <script src="libraries/sweetalert.js"></script>
    <script src="libraries/global.js"></script>
    <script src="source/auth/auth.js"></script>
</head>
<body>
    <div class="container">
        <div class="con-left">
            <div class="con-left-content">
                <img class="logo-sm" src="source/image/obando_pin.png" />
                <img class="logo-sm" src="source/image/obando_gplus.png" />
                <img class="logo-sm" src="source/image/obando_ins.png" />
                <img class="logo-sm" src="source/image/obando_fb.png" />
            </div>
        </div>
        <div class="con-right">
            <div class="form-container">
                <form action="javascript:void(0)">
                    <img class="logo-sm w100 p5" src="source/image/logo.png" />
                    <input type="text" placeholder="username" id="username" autocomplete="off">
                    <input type="password" placeholder="password" id="password" autocomplete="off">
                    <input class="form-butt" type="button" value="SIGN IN" id="login" onclick="_login()">
                </form>
            </div>
        </div>
    </div>

</body>
</html>