<?php

	$realname=$_POST['realname'];
	$mail=$_POST['correo'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$tipou=$_POST['tipou'];

	require('./inc/connect_db.php');
	$checkemail=mysql_query("SELECT * FROM login WHERE correou ='$mail'");
	$check_mail=mysql_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, este correo ya se registro anteriormente, Verifique sus Datos");</script> ';
			}else{
				
				//require("connect_db.php");
				mysql_query("INSERT INTO login VALUES('','$realname','$pass','$mail','$tipou')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				mysql_close($link);
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>