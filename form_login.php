<div class="contenedor">
    <h2>Iniciar sesión</h1>

    <form action="index.php" method="post">
        <input type="text" name="usuario" class="ingresar-datos" placeholder="Nombre de usuario" required><br>
        <input type="password" name="clave" class="ingresar-datos" placeholder="Contraseña" required><br>
        <input type="submit" name="login" value="Iniciar sesión" class="boton">
        <?php
            if(isset($_SESSION['mensaje'])){
                echo '<p>' . $_SESSION['mensaje'] . '</p>';
                unset($_SESSION['mensaje']);
            }
        ?>
    </form>

    <a href="registro.php">¿No tienes una cuenta?</a>
</div>