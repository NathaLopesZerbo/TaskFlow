<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/build.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Cadastro - TaskFlow</title>
</head>

<body class="bg-fundo">

    <div class="w-screen h-screen fixed top-0 left-0 flex items-center justify-center bg-opacity-60">
        <div class="flex flex-row max-sm:flex-col-reverse max-w-4xl w-full h-auto bg-white rounded-xl shadow-lg overflow-hidden m-5">

     
            

            
            <div class="w-1/2 max-sm:w-full p-6">
                <h1 class="text-2xl font-bold text-center mb-3 font-pessoal cor-tit-auth">CRIAR CONTA</h1>

                <form class="flex flex-col" action="tarefa_controller.php?acao=register" method="POST">
                    <input
                        id="nome"
                        type="text"
                        name="nome"
                        placeholder="Nome:"
                        class="w-5/6 max-w-sm mx-auto p-2 mb-3 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs mt-5"
                        required />

                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Email:"
                        class="w-5/6 max-w-sm mx-auto p-2 mb-3 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs"
                        required />

                    <input
                        id="senha"
                        type="password"
                        name="senha"
                        placeholder="Senha:"
                        class="w-5/6 max-w-sm mx-auto p-2 mb-3 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs"
                        required />

                    <button
                        type="submit"
                        class="w-2/3 max-w-sm mx-auto bg-botoes text-white font-bold py-2 rounded-2xl mt-6 hover:bg-principal transition duration-200">
                        CADASTRAR
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs cor-txt-auth font-bold">
                        Já possui uma conta?
                        <a href="login.php" class="font-bold cursor-pointer text-botoes underline">Clique aqui</a>
                    </p>
                </div>
            </div>
            <div class="w-1/2 max-sm:w-full text-white p-6 flex flex-col justify-center items-center bg-principal">
                <h2 class="text-5xl font-bold mb-10 max-sm:mb-0 flex items-center gap-3">
                    <img src="../src/img/logo_task_flow.png" class="w-14">
                    TaskFlow
                </h2>
            </div>

        </div>
    </div>

</body>

</html>
