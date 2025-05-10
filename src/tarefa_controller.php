<?php 

    require "../lista-de-tarefas-private/tarefa.php";
    require "../lista-de-tarefas-private/tarefa_service.php";
    require "../lista-de-tarefas-private/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);
        $tarefa->__set('titulo_tarefa', $_POST['titulo_tarefa']);

        
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->insert();

        header('Location: nova_tarefa.php?inclusao=1');

    } else if($acao == 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recover();
    } else if ($acao == 'atualizar'){

        print_r($_POST);

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id'])->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->update()){
            if (isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('location: index.php');
            }else {
                header('location: todas_tarefas.php');
            }
            
        }

    } else if ($acao == 'remove'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remove();

          if (isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('location: index.php');
            }else {
                header('location: todas_tarefas.php');
            }

    } else if($acao == 'marked'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marked();

          if (isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('location: index.php');
            }else {
                header('location: todas_tarefas.php');
            }

    } else if($acao == 'pendingTasks'){
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendingTasks();

    }
?>
