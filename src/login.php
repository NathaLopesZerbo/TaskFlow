<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/build.css" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <title>Login - TaskFlow</title>
</head>

<body class="bg-fundo min-h-screen flex items-center justify-center p-4">
    <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
        <div class="absolute top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 py-2 rounded shadow">
            E-mail ou senha incorretos.
        </div>
    <?php endif; ?>

    <div class="flex flex-row max-sm:flex-col-reverse w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- Lado Esquerdo: Login -->
        <div class="w-1/2 max-sm:w-full p-8 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-center mb-6 font-pessoal cor-tit-auth">
                Entrar no TaskFlow
            </h1>

            <form method="POST" action="tarefa_controller.php?acao=login" class="flex flex-col items-center gap-4">
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                    class="w-5/6 p-2 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs" />

                <input
                    id="senha"
                    type="password"
                    name="senha"
                    placeholder="Senha"
                    required
                    class="w-5/6 p-2 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs" />

                <!-- <button
          type="submit"
          class="w-2/3 bg-auth text-white font-bold py-2 rounded-2xl mt-4 hover:bg-principal">
          ENTRAR
        </button> -->

                <button
                    type="submit"
                    class="w-2/3 bg-botoes text-white font-bold py-2 rounded-2xl mt-4 hover:bg-principal transition-all duration-200 cursor-pointer">
                    ENTRAR
                </button>

            </form>

            <div class="mt-6 text-center text-xs font-bold text-gray-700">
                Ainda não possui uma conta?
                <a href="register.php" class="text-botoes underline">Clique aqui</a>
            </div>
        </div>

        <!-- Lado Direito: TaskFlow Logo -->
        <div class="w-1/2 max-sm:w-full bg-principal text-white flex flex-col justify-center items-center p-8">
            <h2 class="text-4xl sm:text-5xl font-bold mb-6 flex items-center gap-4">
                <img src="../src/img/logo_task_flow.png" class="w-14" alt="Logo TaskFlow" />
                TaskFlow
            </h2>
        </div>

    </div>
</body>

</html>