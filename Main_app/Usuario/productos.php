<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Mantenimiento Articulos</title>
		<?php include '../../inc/head_common.php';?>
		

	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<body>
		<?php include '../../inc/header.php'; ?>
		<!--detail cambia los estilos workshop w1 cambia todo-->
		
		
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="stylesheet" href="../../css/registro.css">
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   		<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
		<article id="w1-detail" class="detail">
		<header>
			<!--Cabecera de la pagina repuesto, imagen de menu-->
					<div class="container">
						<div class="col">
							<div class="col-xs-12 main-info">
								<div class="section-content">
								<h1 class="section-header">Articulos en Tienda <span class="content-header wow fadeIn " data-wow-delay="0.2s" 	data-wow-duration="2s"> Repuestos MRY</span></h1>
								<h3>Presione añadir al carrito para poder realizar su compra o cotización.</h3>
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
											    <th>CÓDIGO:</th>
											    <th>DESCRICIÓN:</th> 
											    <th>PRECIO ¢:</th>
											    <th>EXISTENCIA:</th>
											    <th>FOTO</th>
											    <th>DEPARTAMENTO</th>
											    <th>SUCURSAL</th>
											    <th>AÑADIR AL CARRITO</th>
											    <th>UBICACIÓN</th>
											  </tr>
										</thead>
										<tbody>
											<?php 
												include("conexion.php");
												$query = "SELECT * FROM articulos WHERE existencia>0 
												ORDER BY descripcion ASC";
												$resultado = mysql_query($query);
												while ($row = mysql_fetch_assoc($resultado)) {
											 	
											 ?>	
											 	<tr>

											 		<td><?php echo $row['codigo']; ?></td>
											 		<td><?php echo $row['descripcion']; ?></td>
											 		<td><?php echo $row['precio']; ?></td>
											 		<td><center><?php echo $row['existencia']; ?></center></td>
											 		<td><img height="70px" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"/></td>
											 		<td><?php echo $row['departamento']; ?></td>									
											 		<td><center><a  class="btn btn-primary" class="button" role="button"><?php echo $row['sucursal']; ?></a></center></td>	
  													<th><center><a href="carrito.php?id=<?php echo $row ['id'];?>"><img src="../../img/carritorep.jpg"> </a></center></th>
  													<th><center><input type="image" src="../../img/industry66.png" data-sucursal="<?php echo $row['sucursal']; ?>"class="modalmapa" data-toggle="modal" data-target="#myModal"></a></center></th>
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
			    <style>
   					#modaldd{
      					width: 1024px !important;
      					height: 600px;
      					padding: -100px;
      					margin: 200px;
      					margin-left: -200px;
    				}
  			    </style>
  			 <center>
			<div class="container">
				<div class="col">
  				<!-- Trigger the modal with a button -->
  				<!-- Modal -->
  				<div class="col-xs-12">
  				<div class="modal fade" id="myModal" role="dialog">
   				 <div class="modal-dialog">
     				 <!-- Modal content-->
      				<div class="modal-content" id="modaldd">
        				<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Sucursal</h4>
        				</div>
        				<div class="modal-body">
        					<div id= "contenedor" ></div>
          					
        				</div>
        				<div class="modal-footer">
          				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          				
        				</div>
      				</div>
    				</div>
  				</div>
  				</div>
  				</div>
			</div>
			</center>
		</article>
		<script type="text/javascript" src="../../js/jquery-2.2.4.min.js"></script>						
		<script type="text/javascript" src="./js/scripts.js"></script>		
		<?php include '../../inc/footerua.php';?>
		<?php include '../../inc/footer_common.php';?>
	</body>
	</html>	