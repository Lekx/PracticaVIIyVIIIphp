<?php
	session_start();
	
	if(isset($_POST["usuario"]) && isset($_POST["contrasena"]))
		if($_POST["usuario"] == "root" && $_POST["contrasena"] == "admin")
			$_SESSION["sesion"] = $_POST["usuario"];
		
		require_once("InterfazBD7.php");
		$interfazBD = new InterfazBD7();
		if(isset($_POST["autor"]) && isset($_POST["titulo"]) && isset($_POST["contenido"]))
		$interfazBD->insertar("INSERT INTO practica7(autor, titulo, contenido) VALUES('".$_POST["autor"]."','".$_POST["titulo"]."','".$_POST["contenido"]."')");
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Practica VII
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilop7.css">
	</head>
	<body>
		<header style="text-align:center;">
			<?php if(isset($_SESSION["sesion"])){?>
				<br/>Bienvenido <?php echo $_SESSION["sesion"];?><br><small><a href="cerrarp7.php">cerrar sesión</a></small>
			<?php } ?>
		</header>
		<main>
			<?php if(!isset($_SESSION["sesion"])){ ?>
				<form action="" method="post">
					<fieldset class="login">
						<legend>
							LKXSTUDIO | Inicio de sesión
						</legend>
						<label>
							Usuario:<br /><input type="text" name="usuario" class="blue">
						</label>
						<br/>
						<label>
							Contraseña:<br /><input type="password" name="contrasena" class="blue">
						</label>
						<br/><br/>
						<input type="submit" value="Ingresar" class="blue button">
					</fieldset>
				</form>
			<?php }else{ ?>
					<form action="" method="post">
						<fieldset class="datos" >
							<legend>Ingreso de datos</legend>
							<label>
								Autor:<br /><input type="text" name="autor" class="blue">
							</label>
							<br/>
							<label>
								Titulo:<br /><input type="text" name="titulo" class="blue">
							</label>
							<br/>
							<label>
								Contenido:<br /><input type="text" name="contenido" class="blue">
							</label>
							<br/><br/>
							<input type="submit" value="Guardar" class="blue button">
						</fieldset>
					</form>
					<table ><tr><th>Id</th><th>Autor</th><th>Titulo</th><th>Contenido</th></tr>
						<?php 
						$resultado = $interfazBD->consulta("SELECT * FROM practica7");
						if(!empty($resultado))
							foreach($resultado as $arreglo)
							{
							?>
							<tr>
							<?php
								foreach($arreglo as $llave => $valor)
								{
							?>
							<td><?php echo $valor;?></td>
							<?php }?>
							</tr>
						<?php
							}
						else 
							echo "No hay resultados disponibles."; 
						?>
					</table>
			<?php } ?>
		</main>
		<footer>
		</footer>
	</body>
</html>
