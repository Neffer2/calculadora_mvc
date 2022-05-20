<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
	<title></title>
	<style type="text/css">
		body{
			font-family: 'Kanit';font-size: 22px;
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
	</style>
</head> 
<body> 
	<div class="container w-25 border p-4 mt-4">
		<?php
			if (isset($alert['succsess'])){
				echo "<div class='alert alert-success' role='alert'>";
				echo $alert['succsess'];
				echo "</div>";
			}
			elseif(isset($alert['Error'])){
				?>
					<div class="alert alert-danger" role='alert'>
						<?php echo $alert['Error']; ?>
					</div>
				<?php
			}
  		?>
		<form class="row gy-2" id="form_calulator" method="POST">
			<div class="col-md-12 mb-2"><center>Prueba Calculadora en PHP</center></div>
			<div class="col-md-12">
				<div class="form-group">
					<input type="number" class="form-control" id="primer_numero" placeholder="Primer número" required>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<input type="number" class="form-control" id="segundo_numero" placeholder="Segundo número" required>
				</div>
			</div>
			<div class="col-md-12">
				<select class="form-select" id="operacion" name="operacion" required>
					<option value="sumar">Suma</option>
					<option value="restar">Restar</option>
					<option value="multiplicar">Multiplicación</option>
					<option value="dividir">División</option>
				</select>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<input type="number" class="form-control" id="resultado" placeholder="Resultado" name="resultado" disabled>
				</div>
			</div>
			<div class="d-grid gap-2">
				<button id="btn_submit" type="button" class="btn btn-primary">Calcular</button>
			</div>
			<div class="d-grid gap-2">
				<button class="btn btn-danger">Limpiar</button>
			</div>
		</form>
	</div>
	 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript">	
		let btn_submit = document.getElementById('btn_submit');
		btn_submit.addEventListener("click", calculate);

		function calculate(){
			let num1 = document.getElementById('primer_numero').value;
			let num2 = document.getElementById('segundo_numero').value;
			let operacion = document.getElementById('operacion').value;
			let resultado = document.getElementById('resultado');

			var url = '?c=calculadora&a=operacion';
			data = {
				num1: num1,
				num2: num2,
				operacion: operacion
			}

			fetch(url, {
			  method: 'POST',
			  body: JSON.stringify(data),
			  headers:{
			    'Content-Type': 'application/json'
			  }
			}).then(res => res.json())
			.catch(error => console.error('Error:', error))
			.then(function (response){
				if (response['Error']){
					window.alert(response['Error']);
				}else{
					resultado.value = response;
				}
			});
		}
	</script>
</body>
</html>