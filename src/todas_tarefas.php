<?php
$acao = 'recuperar';
require 'tarefa_controller.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/build.css">
	<title>TaskFlow</title>
</head>

<body>


	<nav class="bg-gray-100 p-4">
		<div class="container mx-auto flex items-center">
			<a class="flex items-center text-lg font-semibold" href="#">
				<img src="img/logo.png" width="30" height="30" class="mr-2" alt="Logo">
				App Lista Tarefas
			</a>
		</div>
	</nav>

	<div class="container mx-auto mt-6">
		<div class="flex">
			<div class="w-1/4 bg-gray-200 p-4 rounded-md">
				<ul class="space-y-2">
					<li class="bg-gray-300 p-2 rounded-md"><a href="index.php">Tarefas pendentes</a></li>
					<li class="bg-gray-300 p-2 rounded-md"><a href="nova_tarefa.php">Nova tarefa</a></li>
					<li class="bg-green-500 text-white p-2 rounded-md"><a href="#">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="w-3/4 pl-6">
				<div class="container">
					<div class="space-y-6">
						<h4 class="text-xl font-semibol	d">Todas tarefas</h4>
						<hr />

					<?php foreach ($tarefas as $indice => $tarefa) { ?>
	<div class="flex items-center mb-3 tarefa">
		<div class="w-9/12" id="tarefa_<?= $tarefa->id ?>">
			<?= $tarefa->tarefa ?> (<?= $tarefa->status?>)	
		</div>
		<div class="w-3/12 mt-2 flex justify-between">
			<i class="fas fa-trash-alt fa-lg text-red-500 cursor-pointer"></i>
			<i class="fas fa-edit fa-lg text-blue-500 cursor-pointer" onclick="edit(<?= $tarefa->id ?>,'<?= $tarefa->tarefa ?>')"></i>
			<i class="fas fa-check-square fa-lg text-green-500 cursor-pointer"></i>
		</div>
	</div>
<?php } ?>








					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="../src/js/todas_tarefas.js"></script>
</body>

</html>