<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Mantenimiento Articulos</title>
		<?php include '../../inc/head_common.php';?>
		<link rel="stylesheet" href="../../css/registro.css">
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   		 <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">

	</head>

	<body>
		<?php include '../../inc/headeradmin.php'; ?>
		<!--detail cambia los estilos workshop w1 cambia todo-->
		
		<link rel="stylesheet" href="../../css/workshops2.css">
		<link rel="stylesheet" href="../../css/style.css">
		<article id="w1-detail" class="detail">
				<header>
				<!--Cabecera de la pagina repuesto, imagen de menu-->
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="section-content">
									<h1 class="section-header">Mantenimiento de Artículos<span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Repuestos MRY</span></h1>
								<br>
									<h3>Tabla de Productos.</h3>
								</div>
								
							</div>
						</div>
					</div>
				</header>
				<div class="container">
						<div class="col">
							<div class="col-xs-12">
								<section id="tipos-repuestos">
									<div class="col-xs-12">									
										<table class="table table-bordered">
										<thead>
											<tr>
												<td >
													<a href="articuloagrega.php" class="btn btn-success" role="button">Agregar Artículos</a>				
												</td>
											</tr>
											 <tr>
											    <th>CÓDIGO:</th>
											    <th>DESCRICIÓN:</th> 
											    <th>PRECIO:</th>
											    <th>EXISTENCIA:</th>
											    <th>FOTO</th>
											    <th>DEPARTAMENTO</th>
											    <th>SUCURSAL</th>
											    <th colspan="2">MANTENIMIENTO</th>
											  </tr>
										</thead>
										<tbody>
											<?php 
												include("conexion.php");
												$query = "SELECT * FROM articulos";
												$resultado = mysql_query($query);
												while ($row = mysql_fetch_assoc($resultado)) {
											 ?>	
											 	<tr>

											 		<td><?php echo $row['codigo']; ?></td>
											 		<td><?php echo $row['descripcion']; ?></td>
											 		<td><?php echo $row['precio']; ?></td>
											 		<td><?php echo $row['existencia']; ?></td>
											 		<td><img height="70px" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"/></td>
											 		<td><?php echo $row['departamento']; ?></td>
											 		<td><?php echo $row['sucursal']; ?></td>
											 		<th><a href="articulomodifica.php?id=<?php echo $row ['id'];?>" class="btn btn-warning" role="button">Modificar</a></th>
											 		<th><a href="procesoeliminar.php?id=<?php echo $row ['id'];?>" class="btn btn-danger" role="button">Eliminar</a></th>
											 	</tr>
											 <?php
												 }
											 ?>
										</tbody>
										<table>
											<tr>
																
											</tr>	
										</table>				
									</div>			
								</section>
		
		</article>						
		
		<?php include '../../inc/footerua.php';?>
		<?php include '../../inc/footer_common.php';?>
	</body>
	</html>	