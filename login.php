<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="css/style.css">

    <title>Login Administrator</title>
</head>

<body>

    <!-- form login -->
    <section class="login_admin" id="login_admin">
        <form method="POST" action="adapter_login.php">
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col m8 12 offset-m2">
                        <div class="card">
                            <div class="card-action teal lighten-1 white-text center">
                                <h3>Login Administrator</h3>
                            </div>
                            <div class="card-content">
                                <div class="input-field">
                                    <input type="text" name="username" class="validate" style="height: 50px;" require>
                                    <label for="username">Username</label>
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" style="height: 50px;" require>
                                    <label for="password">Password</label>
                                </div>
                                <label>
                                    <input type="checkbox"/>
                                    <span>Remember Me</span>
                                </label>
                                <div class="form-field" style="margin-top: 20px;">
                                    <button type="submit" class="btn-large waves-effect waves-dark deep-purple" style="width:25%;">Login</button>
                                    <button type="button" class="btn-large waves-effect waves-dark red" style="float: right;" style="width:25%;"><a href="index.php" style="color: white;">Kembali</button>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </div>
        </div>
        </div>
    </section>
    <!-- end form login -->
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>