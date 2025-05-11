<?php

require "../lista-de-tarefas-private/tarefa.php";
require "../lista-de-tarefas-private/tarefa_service.php";
require "../lista-de-tarefas-private/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

// Ação de login
if ($acao === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verificar se o email e a senha foram fornecidos
        if (empty($email) || empty($senha)) {
            header('Location: login.php?erro=2'); // Caso o campo de email ou senha esteja vazio
            exit;
        }

        // Conexão com o banco de dados
        $conexao = new Conexao();
        $pdo = $conexao->connect();

        // Verificar se o usuário existe no banco de dados
        $sql = "SELECT * FROM tb_usuarios WHERE email = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        // Verificar se o usuário foi encontrado
        if ($stmt->rowCount() > 0) {
            // Pegar os dados do usuário
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar se a senha fornecida é válida
            if ($senha === $usuario['senha']) {
                session_start();
                $_SESSION['usuario'] = $usuario['nome'];
                $_SESSION['usuario_id'] = $usuario['id'];  // Armazenar o ID do usuário para referência futura
                header('Location: todas_tarefas.php');
                exit;
            } else {
                header('Location: login.php?erro=1'); // Senha incorreta
                exit;
            }
        } else {
            header('Location: login.php?erro=1'); // E-mail não encontrado
            exit;
        }
    }
}

// Ação de registro
if ($acao === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha']; // Senha em texto simples

        $conexao = new Conexao();
        $pdo = $conexao->connect();

        $sql = "INSERT INTO tb_usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([$nome, $email, $senha]); // Armazenando a senha em texto simples
            header("Location: login.php?sucesso=1");
            exit;
        } catch (PDOException $e) {
            header("Location: register.php?erro=" . urlencode("Erro ao cadastrar: " . $e->getMessage()));
            exit;
        }
    }
}

// Ação de inserir tarefa
if ($acao == 'inserir') {
    if (empty($_POST['tarefa']) || empty($_POST['titulo_tarefa'])) {
        header('Location: nova_tarefa.php?erro=1');
        exit;
    }

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa'])
           ->__set('titulo_tarefa', $_POST['titulo_tarefa'])
           ->__set('id_usuario', $_SESSION['usuario_id']); // Associar a tarefa ao usuário logado

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->insert();

    header('Location: nova_tarefa.php?inclusao=1');
}

// Ação de recuperar tarefas
else if ($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recover();
}

// Ação de atualizar tarefa
else if ($acao == 'atualizar') {
    if (empty($_POST['tarefa']) || empty($_POST['titulo_tarefa'])) {
        header('Location: todas_tarefas.php?erro=1');
        exit;
    }

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id'])
           ->__set('tarefa', $_POST['tarefa'])
           ->__set('titulo_tarefa', $_POST['titulo_tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->update()) {
        header('location: todas_tarefas.php');
    }
}

// Ação de remover tarefa
else if ($acao == 'remove') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remove();

    header('location: todas_tarefas.php');
}

// Ação de marcar tarefa como concluída
else if ($acao == 'marked') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->marked();

    header('location: todas_tarefas.php');
}

// Ação para recuperar tarefas pendentes de um usuário
else if ($acao == 'pendingTasks') {
    $tarefa = new Tarefa();
    $tarefa->__set('id_status', 1);
    $tarefa->__set('id_usuario', $_SESSION['usuario_id']); // Filtrar tarefas para o usuário logado
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->pendingTasks();
}

?>
