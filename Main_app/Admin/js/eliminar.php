<?php
session_start();
	$arreglo=$_SESSION['cotiza'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id']!=$_POST['Id']){
			$datosNuevos[]=array(
				'Id'=>$arreglo[$i]['Id'],
				'Codigo'=>$arreglo[$i]['Codigo'],
				'Nombre'=>$arreglo[$i]['Nombre'],
				'Precio'=>$arreglo[$i]['Precio'],
				'Imagen'=>$arreglo[$i]['Imagen'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['cotiza']=$datosNuevos;
		
	}else{
		unset($_SESSION['cotiza']);
		echo '0';
	}
?>