<?php
session_start();
//Metodo que envia via correo electronico la cotizacion de la compra que el cliente realiza en la tienda

include "../conexion.php";
		//variable de session que contiene los articulos del carrito de compras
		$arreglo=$_SESSION['cotiza'];
		//variables del metodo post con los datos del formulario 
		$nombrec=$_POST['nombrec'];
		$desdec=$_POST['emailc'];

		$total=0;							
								
		$tabla='<table border="1">
			<tr>
			<th>Codígo</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
			</tr>';
		for($i=0;$i<count($arreglo);$i++){
			$tabla=$tabla.'<tr>
				<td>'.$arreglo[$i]['Codigo'].'</td>
				<td>'.$arreglo[$i]['Nombre'].'</td>
				<td>'.$arreglo[$i]['Cantidad'].'</td>
				<td>'.$arreglo[$i]['Precio'].'</td>
				<td>'.$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'].'</td>
				</tr>
			';
			$total=$total+($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);
		}

		$tabla=$tabla.'</table>';
		//echo $tabla;
		$nombre=$nombrec;
		$fecha=date("d-m-Y");
		$hora=date("H:i:s");
		$asunto="Compra en MRY Tienda de Repuestos";
		$desde="www.mry.com";
		$correo=$desdec;
		$comentario='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="https://pbs.twimg.com/profile_images/493504264220602369/kBVjqWby_400x400.png" width="300px" heigth="250px">
				<h1>Muchas gracias por comprar en mi carrito de compras</h1>
			</center>
			<p>Hola '.$nombre.' muchas gracias por Cotizar a continuación te mostramos una lista que contiene los productos que deseabas cotizar</p>
			<center>
			<p>Lista de Artículos<br>
				'.$tabla.'
				<br>
				Monto Total en Colones: '.$total.'
			</center>	
			</p>
			</div>

		';

		//echo $comentario;
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-type: text/html; charset=utf8\r\n";
		$headers.="From: Remitente\r\n";
		mail($correo,$asunto,$comentario,$headers);
		unset($_SESSION['cotiza']);
		header("location: ../index.php");
		