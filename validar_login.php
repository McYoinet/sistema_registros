<?php
    class validar_datos{
        public function validarNombre($nombre){
            require("conectar.php");
            try{
                $comando = $con->prepare('SELECT * FROM usuarios WHERE Usuario=?');
                $comando->bind_param('s', $nombre);
                $comando->execute();
                $comando->store_result();
                
                $cantidad = $comando->num_rows;
             
                if($cantidad == 0){
                    return false;
                }else{
                    return true;
                }
                
                $comando -> close();
                
            }catch(mysqli_sql_exception $error){
                echo $error->__toString();
            }
        }

        public function validarCorreo($correo){
            require("conectar.php");
            try{
                $comando = $con->prepare('SELECT * FROM usuarios WHERE Correo=?');
                $comando->bind_param('s', $correo);
                $comando->execute();
                $comando->store_result();
                
                $cantidad = $comando->num_rows;
             
                if($cantidad == 0){
                    return false;
                }else{
                    return true;
                }
                
                $comando -> close();
                
            }catch(mysqli_sql_exception $error){
                echo $error->__toString();
            }
        }
    
        public function validarClave($nombre, $clave){
            require("conectar.php");
            try{
                $comando = $con->prepare('SELECT * FROM usuarios WHERE Usuario=? AND Clave=?');
                $comando->bind_param('ss', $nombre, $clave);
                $comando->execute();
                $comando->store_result();
                
                $cantidad = $comando->num_rows;
                
                if($cantidad == 0){
                    return false;
                }else{
                    return true;
                }
                
                $comando -> close();
                
            }catch(mysqli_sql_exception $error){
                echo $error->__toString();
            }
        }

        public function validarRegistro($nombre, $correo, $clave){
            require("conectar.php");

            try{
                $comando = $con->prepare("INSERT INTO usuarios (Usuario, Correo, Clave) VALUES (?, ?, ?);");
                $comando->bind_param('sss', $nombre, $correo, $clave);
                $comando->execute();
                $comando->close();
            }catch(mysqli_sql_exception $error){
                echo $error->__toString();
            }
        }
    }
?>