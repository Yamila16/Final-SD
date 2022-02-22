<?php

	$realname=$_POST['realname'];
	$mail=$_POST['nick'];
	$rpass=$_POST['rpass'];
  $tdocumento= $_POST['tdocumento'];
	$documento=$_POST['documento'];
	$pass=$_POST['pass'];
	$pass_cifrado=password_hash($pass, PASSWORD_DEFAULT);

	require("bancoconexion.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM cuentas WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
				echo "<script>location.href='index.php'</script>";
			}else{

				mysqli_query($mysqli,"INSERT INTO cuentas VALUES('','$realname','$pass_cifrado','$mail','$tdocumento','$documento','','2')");

				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				echo "<script>location.href='index.php'</script>";

			}

		}else{
			echo 'Las contraseñas son incorrectas';
		}


?>
