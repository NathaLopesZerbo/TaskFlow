<?php 

    require "../../lista-de-tarefas-private/tarefa.php";
    require "../../lista-de-tarefas-private/tarefa_service.php";
    require "../../lista-de-tarefas-private/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']); 
        
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->insert();

        header('Location: nova_tarefa.php?inclusao=1');

    } else if($acao == 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recover();
    }
?>
