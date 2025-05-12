<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
	header('Location: login.php');
	exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/build.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>TaskFlow</title>
</head>

<body class="bg-fundo">
	<nav class="bg-principal p-4">
		<div class="flex flex-wrap items-center justify-between lg:justify-around">

			<!-- Logo -->
			<div class="flex items-center">
				<a href="nova_tarefa.php" class="flex items-center text-lg font-semibold">
					<img src="img/logo_task_flow.png" width="30" height="30" alt="Logo">
					<h1 class="text-white text-2xl pb-1">TaskFlow</h1>
				</a>
			</div>

			<!-- Botão hamburguer -->
			<div class="block lg:hidden">
				<button id="nav-toggle" class="text-white focus:outline-none">
					<i class="fa-solid fa-bars text-2xl"></i>
				</button>
			</div>

			<!-- Filtro + busca (sempre centralizado) -->
			<div class="relative text-gray-600 w-full lg:w-auto flex justify-center mt-4 lg:mt-0">
				<div class="absolute flex flex-col z-10 left-0">
					<button id="dropdownButton" class="border-x text-sm border-gray-300 text-gray-600 h-10 px-4 bg-white hover:border-gray-400 focus:outline-none flex items-center justify-between rounded-tl-xl rounded-bl-xl w-40 overflow-hidden truncate whitespace-nowrap">
						<span id="selectedOption" class="cursor-pointer">Tarefas</span>
						<i class="fa-solid fa-caret-down"></i>
					</button>
					<div id="dropdownMenu" class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
				</div>

				<input type="text" name="search" placeholder="Search" class="bg-white h-10 px-[11rem]  rounded-xl text-sm focus:outline-none w-full lg:w-auto">
				<button type="submit" class="absolute right-0 bottom-2 mt-3 mr-4 cursor-pointer">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</div>

			<!-- Área do usuário (mostrada apenas se nav aberto no mobile ou direto no desktop) -->
			<div id="nav-content" class="w-full lg:w-auto hidden lg:flex justify-center mt-4 lg:mt-0">
				<div class="relative inline-block" id="user-dropdown">
					<?php if (isset($_SESSION['usuario'])): ?>
						<div class="flex items-center text-white text-lg font-medium cursor-pointer gap-2" id="dropdownToggle">
							<span>Olá, <?php echo $_SESSION['usuario']; ?></span>
						</div>

						<div id="dropdown" class="absolute left-0 mt-2 w-32 bg-white rounded-b-xl shadow-lg hidden">
							<!-- Adicionamos "group" aqui -->
							<div class="relative group">
								<!-- Setinha: reage ao hover do grupo -->
								<div class="absolute -top-2 left-4 w-4 h-4 bg-white rotate-45 z-0 group-hover:bg-gray-200 "></div>

								<!-- Link: pertence ao grupo -->
								<a href="logout.php" class="block px-4 py-2 text-red-500 hover:text-red-800 hover:bg-gray-200 rounded-b-xl relative z-10">
									Sair
								</a>
							</div>
						</div>


					<?php else: ?>
						<a href="login.php" class="text-white text-2xl">
							<i class="fa-solid fa-user"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>

	<?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				Toastify({
					text: "Campo Vazio",
					duration: 3000,
					close: true,
					gravity: "top",
					position: "right",
					stopOnFocus: true,
					style: {
						background: "#c81010",
					},
				}).showToast();
			});
		</script>
	<?php endif; ?>

	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1): ?>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
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
		<div class="flex justify-center">
			<div class="w-3/4 pl-6">
				<div class="container">
					<div class="space-y-6">
						<h4 class="text-xl font-semibold text-center">Nova Tarefa</h4>
						<hr class="border-gray-300" />
						<form method="post" action="tarefa_controller.php?acao=inserir">
							<div class="mb-4">
								<h1 class="text-lg font-semibold text-gray-700">Título</h1>
								<input type="text" name="titulo_tarefa" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Mercado">

								<h1 class="text-lg font-semibold text-gray-700 mt-4">Descrição</h1>
								<input type="text" name="tarefa" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Exemplo: Comprar frutas">
							</div>

							<button class="bg-botoes text-white p-2 rounded-md hover:bg-principal transition duration-200 w-full cursor-pointer	">
								Cadastrar
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="../src/js/index.js"></script>
	
</body>

</html>