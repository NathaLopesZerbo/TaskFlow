<?php
$acao = 'pendingTasks';
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
	<nav class="bg-principal p-4">
		<div class="container mx-auto flex items-center justify-between">
			<a href="index.php" class="flex items-center text-lg font-semibold">
				<img src="img/logo_task_flow.png" width="30" height="30" alt="Logo">
				<h1 class="text-white text-2xl pb-1">TaskFlow</h1>
			</a>

			<div class="relative text-gray-600">
				<input type="search" name="serch" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-xl text-sm focus:outline-none">
				<button type="submit" class="absolute right-0 bottom-2 mt-3 mr-4 cursor-pointer">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</div>

			<a href="#" class="text-white text-2xl">
				<i class="fa-solid fa-user"></i>
			</a>
		</div>
	</nav>

	<div class="container mx-auto mt-6">
		<div class="flex">
			<div class="w-1/4 bg-gray-200 p-4 rounded-md">
				<ul class="space-y-2">
					<li class="bg-green-500 text-white p-2 rounded-md"><a href="#">Tarefas pendentes</a></li>
					<li class="bg-gray-300 p-2 rounded-md"><a href="nova_tarefa.php">Nova tarefa</a></li>
					<li class="bg-gray-300 p-2 rounded-md"><a href="todas_tarefas.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="w-3/4 pl-6">
				<div class="container">
					<div class="space-y-6">
						<h4 class="text-xl font-semibold">Tarefas pendentes</h4>
						<hr />

						<?php foreach ($tarefas as $indice => $tarefa) { ?>
							<div class="flex items-center mb-3 tarefa">
								<div class="w-9/12" id="tarefa_<?= $tarefa->id ?>">
									<?= $tarefa->tarefa ?>
								</div>
								<div class="w-3/12 mt-2 flex justify-between">
									<i class="fas fa-trash-alt fa-lg text-red-500 cursor-pointer"
										onclick="remove(<?= $tarefa->id ?>)"></i>
									<i class="fas fa-edit fa-lg text-blue-500 cursor-pointer" onclick="edit(<?= $tarefa->id ?>,'<?= $tarefa->tarefa ?>')"></i>
									<i class="fas fa-check-square fa-lg text-green-500 cursor-pointer" onclick="marked(<?= $tarefa->id ?>)"></i>

								<?php } ?>

								</div>
							</div>
					</div>
				</div>
			</div>
			<script>
				function edit(id, txt_tarefa) {
					let form = document.createElement('form')
					form.action = 'index.php?pag=index&acao=atualizar'
					form.method = 'post'
					form.className = 'flex p-5'

					let inputTarefa = document.createElement('input')
					inputTarefa.type = 'text'
					inputTarefa.name = 'tarefa'
					inputTarefa.className = 'w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500'
					inputTarefa.value = txt_tarefa

					let inputId = document.createElement('input')
					inputId.type = 'hidden'
					inputId.name = 'id'
					inputId.value = id

					let button = document.createElement('button')
					button.type = 'submit'
					button.className = 'bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded'
					button.innerHTML = 'Atualizar'

					form.appendChild(inputTarefa)

					form.appendChild(inputId)

					form.appendChild(button)

					let tarefa = document.getElementById('tarefa_' + id)

					tarefa.innerHTML = "";

					tarefa.insertBefore(form, tarefa[0])

				}

				function remove(id) {
					location.href = 'index.php?pag=index&acao=remove&id=' + id;
				}

				function marked(id) {
					location.href = 'index.php?pag=index&acao=marked&id=' + id;
				}
			</script>
</body>

</html>