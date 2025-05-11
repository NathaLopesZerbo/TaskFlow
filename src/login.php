<?php
$modalType = $_GET['modalType'] ?? 'login'; // Pode ser 'login' ou 'register'
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
?>
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

                <form class="flex flex-col">
                    <input type="text" placeholder="Nome:" class="w-5/6 p-2 mb-3 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs mt-5" />

                    <input type="email" placeholder="Email:" class="w-5/6 p-2 mb-3 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs" />

                    <input type="password" placeholder="Senha:" class="w-5/6 p-2 mt-2 ml-5 bg-input border rounded-lg placeholder:text-place placeholder:font-extrabold placeholder:text-xs" />

                    <button type="submit" class="font-bold font-pessoal flex justify-center mx-auto w-2/3 bg-auth text-white py-2 rounded-2xl mt-8 ml-14 bg-botoes cursor-pointer hover:bg-principal duration-200">
                        ENTRAR
                    </button>
                </form>


                <div class="mt-8 ml-20">
                    <p class="text-xs cor-txt-auth font-bold">
                        Ainda não possui uma conta? <button class="font-bold cursor-pointer "><u>Clique aqui</u></button>
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