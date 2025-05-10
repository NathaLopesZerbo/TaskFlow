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

<body class="bg-fundo">

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
						<span id="selectedOption" class="cursor-pointer">
							Tarefa
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


	<div class="container mx-auto mt-6">
    <div class="flex">
        <div class="w-full px-4">
            <div class="space-y-6">
                <h4 class="text-xl font-semibold">Tarefas Pendentes</h4>
                <hr class="border-gray-300" />

                <?php foreach ($tarefas as $indice => $tarefa) { ?>
                    <div class="flex items-center justify-between bg-white p-4 rounded shadow-sm tarefa">
                        <!-- Conteúdo da Tarefa -->
                        <div class="text-gray-800 w-8/12" id="tarefa_<?= $tarefa->id ?>">
                            <div class="font-semibold text-lg text-indigo-600">
                                <?= $tarefa->titulo_tarefa ?>
                            </div>
                            <?= $tarefa->tarefa ?>
                            <span class="text-sm text-gray-500">(<?= $tarefa->status ?>)</span>
                        </div>

                        <!-- Ações -->
                        <div class="flex items-center gap-4">
                            <i class="fas fa-trash-alt text-red-500 hover:text-red-600 cursor-pointer"
                               onclick="remove(<?= $tarefa->id ?>)"></i>

                            <?php if ($tarefa->status == 'pendente') { ?>
                                <i class="fas fa-edit text-blue-500 hover:text-blue-600 cursor-pointer"
                                   onclick="edit(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
                                <i class="fas fa-check-square text-green-500 hover:text-green-600 cursor-pointer"
                                   onclick="marked(<?= $tarefa->id ?>)"></i>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>






	<script src="../src/js/index.js"></script>
</body>

</html>