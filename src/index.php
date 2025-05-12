<?php

session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
	exit;
}

$acao = 'pendingTasks';
require 'tarefa_controller.php';
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TaskFlow</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
	<link rel="stylesheet" href="css/build.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>

<nav class="bg-principal p-4">
		<div class="flex flex-wrap items-center justify-between lg:justify-around">

			
			<div class="flex items-center">
				<a href="nova_tarefa.php" class="flex items-center text-lg font-semibold">
					<img src="img/logo_task_flow.png" width="30" height="30" alt="Logo">
					<h1 class="text-white text-2xl pb-1">TaskFlow</h1>
				</a>
			</div>

			
			<div class="block lg:hidden">
				<button id="nav-toggle" class="text-white focus:outline-none">
					<i class="fa-solid fa-bars text-2xl"></i>
				</button>
			</div>

		
			<div class="relative text-gray-600 w-full lg:w-auto flex justify-center mt-4 lg:mt-0">
				<div class="absolute flex flex-col z-10 left-0">
					<button id="dropdownButton" class="border-x text-sm border-gray-300 text-gray-600 h-10 px-4 bg-white hover:border-gray-400 focus:outline-none flex items-center justify-between rounded-tl-xl rounded-bl-xl w-40 overflow-hidden truncate whitespace-nowrap">
						<span id="selectedOption" class="cursor-pointer">Tarefas</span>
						<i class="fa-solid fa-caret-down"></i>
					</button>
					<div id="dropdownMenu" class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
				</div>

		<input type="text" id="search" name="search" placeholder="Search" class="bg-white h-10 px-[11rem] rounded-xl text-sm focus:outline-none w-full lg:w-auto">
<button type="button" id="searchBtn" class="absolute right-0 bottom-2 mt-3 mr-4 cursor-pointer">
  <i class="fa-solid fa-magnifying-glass"></i>
</button>


			</div>

			
			<div id="nav-content" class="w-full lg:w-auto hidden lg:flex justify-center mt-4 lg:mt-0">
				<div class="relative inline-block" id="user-dropdown">
					<?php if (isset($_SESSION['usuario'])): ?>
						<div class="flex items-center text-white text-lg font-medium cursor-pointer gap-2" id="dropdownToggle">
							<span>Olá, <?php echo $_SESSION['usuario']; ?></span>
						</div>

						<div id="dropdown" class="absolute left-0 mt-2 w-32 bg-white rounded-b-xl shadow-lg hidden">
							
							<div class="relative group">
								
								<div class="absolute -top-2 left-4 w-4 h-4 bg-white rotate-45 z-0 group-hover:bg-gray-200 "></div>

								
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







	<!-- Toastify mensagens -->
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
		<div class="flex">
			<div class="w-full px-4">
				<h4 class="text-xl font-semibold mb-4">Tarefas Pendentes</h4>
				<hr class="border-gray-300 mb-6" />

				<?php if (empty($tarefas)): ?>
					<p class="text-gray-500 text-center">Nenhuma tarefa pendente.</p>
				<?php endif; ?>

				<?php foreach ($tarefas as $tarefa): ?>
					<div class="flex items-center justify-between bg-white p-4 rounded shadow-sm mb-3">
						<div class="w-9/12 text-gray-800" id="tarefa_<?= $tarefa->id ?>">
							<strong><?= ($tarefa->titulo_tarefa ?? 'Sem título') ?></strong><br>
							<?= ($tarefa->tarefa) ?>
							<div class="text-sm text-gray-500 mt-1">
								Data cadastrada: <?= date('d/m/Y H:i', strtotime($tarefa->data_cadastrado)) ?>
							</div>
						</div>
						<div class="w-3/12 flex items-center justify-end gap-4">
							<i class="fas fa-trash-alt text-red-500 hover:text-red-600 cursor-pointer" onclick="remove(<?= $tarefa->id ?>)"></i>
							<i class="fas fa-edit text-blue-500 hover:text-blue-600 cursor-pointer" onclick="edit(<?= $tarefa->id ?>, '<?= addslashes($tarefa->titulo_tarefa) ?>', '<?= addslashes($tarefa->tarefa) ?>')"></i>
							<i class="fas fa-check-square text-green-500 hover:text-green-600 cursor-pointer" onclick="marked(<?= $tarefa->id ?>)"></i>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script src="../src/js/index.js" defer></script>
</body>

</html>