<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/estilos.css">
        <title>Iniciar sesión</title>
    </head>

    <body>
        <?php
            session_start();

            if(!(isset($_SESSION['estado']))){
                $_SESSION['estado'] = false;
            }

            if(!(isset($_SESSION['nombre']))){
                $_SESSION['nombre'] = "(error)";
            }

            if(!(isset($_SESSION['mensaje']))){
                $_SESSION['mensaje'] = null;
            }
        ?>

        <h1>Proyecto: Registro de usuarios.</h1>
            <?php

                if(!($_SESSION['estado'])){
                    require("form_login.php");
                    require("validar_login.php");
                    require("conectar.php");

                    $validar = new validar_datos();

                    if(isset($_POST['login'])){

                        $usuario = $_POST['usuario'];
                        $clave = $_POST['clave'];
                    
                        if($validar->validarNombre($usuario)){
                            $comando = $con->prepare('SELECT Clave FROM usuarios WHERE Usuario=?');
                            $comando->bind_param('s', $usuario);
                            $comando->execute();
                            $comando->store_result();
                            $comando->bind_result($clave_hash_array);
                            $clave_hash;

                            if($comando->num_rows == 1){
                                while($comando->fetch()){
                                    $clave_hash = $clave_hash_array;
                                }
                            }

                            if(password_verify($clave, $clave_hash)){
                                $_SESSION['estado'] = true;
                                $_SESSION['nombre'] = $usuario;
                                header("Location: index.php");
                                exit();
                            }else{
                                $_SESSION['estado'] = false;
                                $_SESSION['mensaje'] = "Contraseña incorrecta.";
                                header('Location: index.php');
                                exit();
                            }
                        }else{
                            $_SESSION['estado'] = false;
                            $_SESSION['mensaje'] = "Ese nombre de usuario no está registrado.";
                            header('Location: index.php');
                            exit();
                        }
                    }
                }else{
                    include("logged.php");
                }
            ?>

        <div id="pie">
            <p>Creado por Christian Mardueño.</p>
        </div>
    </body>
</html>