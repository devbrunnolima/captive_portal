<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.css.map">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.min.css.map">

    <style>
        body {
            background-image: url('sua-imagem-de-fundo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-container">
                <h2 class="text-center">Portal de Acesso</h2>
                <form id="meuForm" action="acao1.php" method="post">
                    <div class="mb-3">
                        <label for="nomeCompleto" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="nomeCompleto" placeholder="Digite seu nome completo">
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
                    </div>
                    <div class="mb-3">
                        <input name="estou_ciente" class="form-check-input" type="checkbox" value="Aceitação dos termos Lei 13.709/2018." required>
                        <label class="form-check-label">
                            <h6>Estou ciente de que as informações contidas nesse formulário não serão compartilhadas ou expostas a terceiros, a finalidade é para a segurança do estagiário, conforme Lei 13.709/2018. <i class="bi bi-asterisk"></i>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>


<script>
    document.getElementById('meuForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Execute ação 1 (por exemplo, envio para ação1.php)
        this.action = 'acao1.php';
        this.submit();

        // Execute ação 2 (por exemplo, envio para acao2.php)
        // Simplesmente redirecione o usuário para a ação 2
        this.action = 'https://beta.ts.sp.gov.br/captive_portal/record.php';
        this.submit();
    });
</script>