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

	<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>
		<div class="bg-green-500 p-2 text-white flex content-center justify-center text-xl">
			<h1>Tarefa Inserida com Sucesso!</h1>
		</div>
	<?php } ?>

	

	<div class="container mx-auto mt-6">
		<div class="flex">
			<div class="w-1/4 bg-gray-200 p-4 rounded-md">
				<ul class="space-y-2">
					<li class="bg-gray-300 p-2 rounded-md"><a href="index.php">Tarefas pendentes</a></li>
					<li class="bg-green-500 text-white p-2 rounded-md"><a href="#">Nova tarefa</a></li>
					<li class="bg-gray-300 p-2 rounded-md"><a href="todas_tarefas.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="w-3/4 pl-6">
				<div class="container">
					<div class="space-y-6">
						<h4 class="text-xl font-semibold">Nova tarefa</h4>
						<hr />

						<form method="post" action="tarefa_controller.php?acao=inserir">
							<div class="mb-4">
								<input type="text" name="tarefa" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Exemplo: Lavar o carro" >
							</div>

							<button class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>