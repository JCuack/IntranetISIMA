<?php
	include 'conexion_be.php';

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$query = "INSERT INTO usuarios(nombre,apellido,correo,pass) VALUES('$nombre','$apellido','$email','$pass')";

	$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$email'");

	if (mysqli_num_rows($verificar_correo) > 0 ) {
		echo '
			<script>
				alert("Este correo ya esta registrado");
				window.location "../index.php";
			</script>
		';
		exit();
	}

	$ejecutar = mysqli_query($conexion,$query);

	if ($ejecutar) {
		echo '
			<script>
				alert("Usuario almacenado correctamente");
				window.location "../index.php";
			</script>
		';
	}
	else{
		echo '
			<script>
				alert(Intenta registrarte de nuevo);
				window.location ../index.php";
			</script>
		';
	}
	mysqli_close(conexion_be.php);
?>