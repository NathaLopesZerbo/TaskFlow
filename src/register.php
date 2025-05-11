
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/build.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Login - TaskFlow</title>
</head>

<body class="bg-fundo">

    <div class="w-screen h-screen fixed top-0 left-0 flex items-center justify-center bg-opacity-60">
        <div class="flex max-w-4xl w-full h-auto bg-white rounded-xl shadow-lg overflow-hidden ">


            <div class="w-1/2 p-6">
                <h1 class="text-2xl font-bold text-center mb-3 font-pessoal cor-tit-auth mr-6">ENTRAR AO TASKFLOW</h1>

               <form class="flex flex-col" action="tarefa_controller.php?acao=register" method="POST">
    <label for="nome" class="sr-only">Nome:</label>
    <input
        id="nome"
        type="text"
        name="nome"
        placeholder="Nome:"
        class="w-5/6 p-2 mb-3 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs mt-5"
        required />

    <label for="email" class="sr-only">Email:</label>
    <input
        id="email"
        type="email"
        name="email"
        placeholder="Email:"
        class="w-5/6 p-2 mb-3 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs"
        required />

    <label for="senha" class="sr-only">Senha:</label>
    <input
        id="senha"
        type="password"
        name="senha"
        placeholder="Senha:"
        class="w-5/6 p-2 mt-2 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs"
        required />

    <button
        type="submit"
        class="font-bold font-pessoal flex justify-center mx-auto w-2/3 bg-auth text-white py-2 rounded-2xl mt-8 ml-14 bg-botoes cursor-pointer hover:bg-principal duration-200">
        CADASTRAR
    </button>
</form>



                <div class="mt-8 ml-20">
                    <p class="text-xs cor-txt-auth font-bold ml-5">
    Já possui uma conta? <a href="login.php" class="font-bold cursor-pointer">Clique aqui</a>
</p>

                </div>
            </div>

            <div class="w-1/2 text-white p-6 flex flex-col justify-center items-center auth bg-principal">
                <h2 class="text-5xl font-bold mb-10 flex">
                    <img src="../src/img/logo_task_flow.png" class="w-14">
                    TaskFlow
                </h2>
            </div>
        </div>
    </div>



</body>

</html>