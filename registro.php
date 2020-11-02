<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/estilos.css">
        <title>Registrarse</title>
    </head>

    <body>

        <h1>Proyecto: Registro de usuarios.</h1>
        
        <?php
            #Sesiones
            if(!(isset($_SESSION))){
                session_start();
            }

            if(!(isset($_SESSION['estado']))){
                $_SESSION['estado'] = false;
            }

            if(!(isset($_SESSION['nombre']))){
                $_SESSION['nombre'] = "(error)";
            }

            if(!(isset($_SESSION['mensaje']))){
                $_SESSION['mensaje'] = null;
            }

            if(!($_SESSION['estado'])){
                require("validar_login.php");
                require("form_register.php");

                #Validación
                $validar = new validar_datos();

                if(isset($_POST['registro'])){
                    $usuario = $_POST['usuario'];
                    $correo = $_POST['correo'];
                    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

                    if($validar->validarNombre($usuario)){
                        $_SESSION['mensaje'] = "Ese nombre de usuario ya está registrado";
                        header('Location: registro.php');
                        exit();
                    }else{
                        if($validar->validarCorreo($correo)){
                            $_SESSION['mensaje'] = "Ese correo ya está registrado";
                            header('Location: registro.php');
                            exit();
                        }else{
                            $validar->validarRegistro($usuario, $correo, $clave);

                            $_SESSION['mensaje'] = "¡Registro completo! Puedes iniciar sesión.";
                            header('Location: registro.php');
                            exit();
                        }
                    }
                }
            }else{
                require("logged.php");
            }
        ?>

        <div id="pie">
            <p>Creado por Christian Mardueño.</p>
        </div>
    </body>
</html>