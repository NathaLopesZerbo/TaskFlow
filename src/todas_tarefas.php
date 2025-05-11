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

	<nav class="bg-principal p-4">
		<div class="container mx-auto flex items-center justify-between">
			<div>
				<a href="nova_tarefa.php" class="flex items-center text-lg font-semibold">
					<img src="img/logo_task_flow.png" width="30" height="30" alt="Logo">
					<h1 class="text-white text-2xl pb-1">TaskFlow</h1>
				</a>
			</div>

			<div class="relative text-gray-600">
				<div class="absolute flex flex-col">
					<button id="dropdownButton" class="border-x text-sm border-gray-300 text-gray-600 h-10 px-4 bg-white hover:border-gray-400 focus:outline-none flex items-center justify-between rounded-tl-xl rounded-bl-xl w-40 overflow-hidden truncate whitespace-nowrap">
						<span id="selectedOption" class="cursor-pointer">Tarefas</span>
						<i class="fa-solid fa-caret-down"></i>
					</button>
					<div id="dropdownMenu" class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
				</div>

				<input type="text" name="search" placeholder="Search" class="bg-white h-10 px-[11rem] pr-80 rounded-xl text-sm focus:outline-none">
				<button type="submit" class="absolute right-0 bottom-2 mt-3 mr-4 cursor-pointer">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</div>

			<a href="login.php" class="text-white text-2xl">
				<i class="fa-solid fa-user"></i>
			</a>
		</div>
	</nav>

	<div class="container mx-auto mt-6">
		<div class="flex">
			<div class="w-full px-4">
				<div class="space-y-6">
					<h4 class="text-xl font-semibold">Todas Tarefas</h4>
					<hr class="border-gray-300" />

					<?php if (count($tarefas) === 0): ?>
						<p class="text-gray-500 text-center mt-4">Nenhuma tarefa cadastrada.</p>
					<?php endif; ?>

					<?php foreach ($tarefas as $tarefa) { ?>
						<div class="flex items-center justify-between bg-white p-4 rounded shadow-sm tarefa" id="tarefa_<?= $tarefa->id ?>">
							<div class="w-9/12 text-gray-800">
								<div class="titulo_tarefa font-bold"><?= ($tarefa->titulo_tarefa) ?></div>
								<div class="descricao_tarefa"><?= ($tarefa->tarefa) ?></div>

								<div class="status_tarefa mt-2">
									<?php if ($tarefa->status == 'pendente'): ?>
										<span class="text-yellow-500 font-semibold">Pendente</span>
									<?php elseif ($tarefa->status == 'realizado'): ?>
										<span class="text-green-500 font-semibold">Realizado</span>
									<?php else: ?>
										<span class="text-gray-500 font-semibold">Status desconhecido</span>
									<?php endif; ?>
								</div>
								<div class="text-sm text-gray-500 mt-1">
								Data cadastrada: <?= date('d/m/Y H:i', strtotime($tarefa->data_cadastrado)) ?>
							</div>
						</div>

							


							<div class="w-3/12 flex items-center justify-end gap-4 mt-1">
								<i class="fas fa-edit fa-lg text-blue-500 hover:text-blue-600 cursor-pointer editar-btn"
									data-id="<?= $tarefa->id ?>"></i>

								<i class="fas fa-trash-alt fa-lg text-red-500 hover:text-red-600 cursor-pointer"
									onclick="remove(<?= $tarefa->id ?>)"></i>

								<i class="fas fa-check-square fa-lg text-green-500 hover:text-green-600 cursor-pointer"
									onclick="marked(<?= $tarefa->id ?>)"></i>
							</div>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_GET['removido']) && $_GET['removido'] == 1): ?>
		<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<script>
			Toastify({
				text: "Tarefa removida com sucesso!",
				duration: 3000,
				close: true,
				gravity: "top",
				position: "right",
				style: {
					background: "#c81010",
				},
			}).showToast();
		</script>
	<?php endif; ?>

	<script>
		document.querySelectorAll('.editar-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				const tarefaId = btn.getAttribute('data-id');
				const tarefaDiv = document.getElementById(`tarefa_${tarefaId}`);
				const formEditar = tarefaDiv.querySelector('.form-editar');
				formEditar.classList.toggle('hidden');
				tarefaDiv.querySelector('.titulo_tarefa').classList.toggle('hidden');
				tarefaDiv.querySelector('.descricao_tarefa').classList.toggle('hidden');
			});
		});

		document.querySelectorAll('.cancelar-edicao').forEach(btn => {
			btn.addEventListener('click', function() {
				const tarefaDiv = btn.closest('.tarefa');
				tarefaDiv.querySelector('.form-editar').classList.add('hidden');
				tarefaDiv.querySelector('.titulo_tarefa').classList.remove('hidden');
				tarefaDiv.querySelector('.descricao_tarefa').classList.remove('hidden');
			});
		});
	</script>


	<script src="../src/js/index.js"></script>
</body>

</html>