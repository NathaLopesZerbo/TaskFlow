<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/build.css">
	<title>TaskFlow</title>
</head>

<body>
		<nav class="bg-principal p-4">
			<div class="container mx-auto flex items-center justify-between">
				<div>
					<a href="index.php" class="flex items-center text-lg font-semibold">
						<img src="img/logo_task_flow.png" width="30" height="30" alt="Logo">
						<h1 class="text-white text-2xl pb-1">TaskFlow</h1>
					</a>
				</div>

				<div class="relative text-gray-600">
					<div class="absolute flex flex-col">
						<button id="dropdownButton" class="border-x text-sm border-gray-300 text-gray-600 h-10 px-4 bg-white hover:border-gray-400 focus:outline-none flex items-center justify-between rounded-tl-xl rounded-bl-xl w-40 overflow-hidden truncate whitespace-nowrap">
							<span id="selectedOption" class="cursor-pointer">
								Tarefas
							</span>
							<i class="fa-solid fa-caret-down"></i>
						</button>

						<div id="dropdownMenu" class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
					</div>

					<input type="text" name="serch" placeholder="Search" class="bg-white h-10 px-[11rem] pr-80 rounded-xl text-sm focus:outline-none">

					<button type="submit" class="absolute right-0 bottom-2 mt-3 mr-4 cursor-pointer">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</div>




				<a href="#" class="text-white text-2xl">
					<i class="fa-solid fa-user"></i>
				</a>
			</div>
		</nav>

<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Toastify({
                text: "Tarefa inserida com sucesso!",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "#5C88A2",
                },
            }).showToast();
        });
    </script>
<?php endif; ?>

		

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
								<h1>Título</h1>
								<input type="text" name="name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Exemplo: Lavar o carro" >
								<h1>Descrição</h1>
								<input type="text" name="tarefa" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Exemplo: Lavar o carro" >
							</div>

							<button class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../src/js/index.js"></script>
</body>

</html>