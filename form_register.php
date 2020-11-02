<div class="contenedor">
    <h2>Registro</h2>

    <form action="registro.php" method="post">
        <input type="text" name="usuario" class="ingresar-datos" placeholder="Nombre de usuario" required><br>
        <input type="mail" name="correo" class="ingresar-datos" placeholder="Correo" required><br>
        <input type="password" name="clave" class="ingresar-datos" placeholder="Contraseña" required><br>
        <input type="submit" value="Registrarse" name="registro" class="boton">
        <?php
            if(isset($_SESSION['mensaje'])){
                echo '<p>' . $_SESSION['mensaje'] . '</p>';
                unset($_SESSION['mensaje']);
            }
        ?>
    </form>
    
    <a href="index.php">¿Ya tienes una cuenta?</a>
</div>