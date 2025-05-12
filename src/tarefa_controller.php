    <?php

    require "../lista-de-tarefas-private/tarefa.php";
    require "../lista-de-tarefas-private/tarefa_service.php";
    require "../lista-de-tarefas-private/conexao.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


    if ($acao === 'login') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (empty($email) || empty($senha)) {
                header('Location: login.php?erro=2'); 
                exit;
            }

            $conexao = new Conexao();
            $pdo = $conexao->connect();

            $sql = "SELECT * FROM tb_usuarios WHERE email = ? LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($senha === $usuario['senha']) {
                    $_SESSION['usuario'] = $usuario['nome'];
                    $_SESSION['usuario_id'] = $usuario['id'];
                    header('Location: nova_tarefa.php');
                    exit;
                } else {
                    header('Location: login.php?erro=1');
                    exit;
                }
            } else {
                header('Location: login.php?erro=1');
                exit;
            }
        }
    }

    // Ação de registro
    if ($acao === 'register') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $conexao = new Conexao();
            $pdo = $conexao->connect();

            $sql = "INSERT INTO tb_usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            try {
                $stmt->execute([$nome, $email, $senha]);
                header("Location: login.php?sucesso=1");
                exit;
            } catch (PDOException $e) {
                header("Location: register.php?erro=" . urlencode("Erro ao cadastrar: " . $e->getMessage()));
                exit;
            }
        }
    }

    // Inserir tarefa
    if ($acao == 'inserir') {
        if (empty($_POST['tarefa']) || empty($_POST['titulo_tarefa'])) {
            header('Location: nova_tarefa.php?erro=1');
            exit;
        }

        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa'])
            ->__set('titulo_tarefa', $_POST['titulo_tarefa'])
            ->__set('id_usuario', $_SESSION['usuario_id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->insert();

        header('Location: nova_tarefa.php?inclusao=1');
    }

    // Recuperar tarefas
    else if ($acao == 'recuperar') {
        $tarefa = new Tarefa();
        $tarefa->__set('id_usuario', $_SESSION['usuario_id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recover();
    }

    // Atualizar tarefa
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

    // Remover tarefa
    else if ($acao == 'remove') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remove();

        header('location: todas_tarefas.php');
    }

    // Marcar tarefa como concluída
    else if ($acao == 'marked') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marked();

        header('location: todas_tarefas.php');
    }

    // Recuperar tarefas pendentes
    else if ($acao == 'pendingTasks') {
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1)
            ->__set('id_usuario', $_SESSION['usuario_id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendingTasks();
    }



    ?>
