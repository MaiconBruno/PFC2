<?php
//Importa a validação da sessão para evitar acesso via URL
include('./php/validaPagina.php');
//verifica se a pagina pertence ao nivel do usuario logado 
if ($_SESSION['Logado'] = true && $_SESSION['usuarioNiveisAcessoId'] != "1") { // comparação para verificar o nivel do acesso
    session_start();
    unset($_SESSION['usuarioId'],
    $_SESSION['usuarioNome'],
    $_SESSION['usuarioNiveisAcessoId'],
    $_SESSION['usuarioLogin'],
    $_SESSION['usuarioSenha']);
    header("Location: index.php");
    $_SESSION['loginAcesso'] = "Acesso Negado!"; //mensagem exibida quando o acesso não e permitido 
    exit();
} else { }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONFIGURAÇÕES-DASHBOARD JCR</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/a917a1_d8844d4baaa443a7a31eeaf9b1c214c3%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/a917a1_d8844d4baaa443a7a31eeaf9b1c214c3%7Emv2.png" type="image/png">
 

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Configurações do administrador</h1>
                                    </div>
                                    <a style="text-decoration:none; " class="small" href="./PaginaDeCadastro.php"><button class="btn btn-success btn-user btn-block" style="margin-top:10px;">Cadastrar</button></a>
                                    <a style="text-decoration:none; " class="small" href="./busca.php"><button class="btn btn-info btn-user btn-block " style="margin-top:10px;">Buscar cadastro</button></a>
                                    <a style="text-decoration:none; " class="small" href="./PaginaAdministrador.php"><button class="btn btn-secondary btn-user btn-block " style="margin-top:10px;">Voltar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>