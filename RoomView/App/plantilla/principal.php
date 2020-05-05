<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier y Olga" />
    <title>RoomView</title>
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="Web/css/main.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="Web/favicon/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <!-- CABECERA -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <img src="Web/img/logo.png" style="width: 20%" alt="logo bootstrap">

        </div>
        </div>
    </nav>

    <!-- CONTENIDO-->
    <header class="main-header">
        <div class="background-overlay text-white py-5">
            
                <div class="container">
                    <div class="row">
                        <div id="text" class="col-md-8 topmargin-lg">
                            <h1>Aplicación de reserva de salas para <b>reuniones</b></h1>
                            <p></p>
                        </div>
                   
                        <div id="login" class="col-md-4 topmargin-lg bg-white text-dark p-5">
                        	<b><?= (isset($msg))?$msg:"" ?></b>
                            <div>
                            
                            <img src="Web/img/grupo.png" id="icon" alt="User Icon" />
                             </div>
                            <form method="post" action="index.php">
                                <div class="form-group p-1">
                                  <label>Nombre de usuario</label>
                                  <input type="text" name="user" class="form-control" placeholder="Usuario">
                                </div>
                                <div class="form-group p-1">
                                  <label>Password</label>
                                  <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-check text-muted ">
                                  <input type="checkbox" class="form-check-input" ">
                                  <label class="form-check-label">Recordar Usuario</label>
                                </div>
                                <input type="submit" name="orden" value="Entrar" class="btn btn-primary m-1">
                              </form>
                              
                        </div>
                   
                    </div>
                </div>
            
        </div>
    </header>


    <!-- BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>