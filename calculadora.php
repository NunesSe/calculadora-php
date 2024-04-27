<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <?php
    // Iniciar sessao
    session_start();

    // Inicializacao de variaveis
    $_SESSION["num1"] = 0;
    $_SESSION["num2"] = 0;
    // Impoprtar as operaçoes
    require_once("operacoes.php");

    // Criação do historico
    if (!isset($_SESSION['historico'])) {
        $_SESSION['historico'] = [];
    }
    $historico = $_SESSION['historico'];

    // Criacao da funcao limpar historico
    if (isset($_POST["limpar"])) {
        $_SESSION["historico"] = [];
        $historico = [];
    }

    
    // Verifica se calcular foi clicado 
    if (isset($_POST["calcular"])) {
        // Pega as variaveis
        $_SESSION["num1"] = trim($_POST["num1"]);
        $_SESSION["num2"] = trim($_POST["num2"]);
        $_SESSION["operacao"] = $_POST["operacao"];
        // Verifica qual operação foi selecionada e faz as operações
        switch ($_SESSION["operacao"]) {
            case '+':
                $_SESSION["resultado"] = somar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '-':
                $_SESSION["resultado"] = subtrair($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '/':
                $_SESSION["resultado"] = dividir($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '*':
                $_SESSION["resultado"] = multiplicar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '^':
                $_SESSION["resultado"] = elevar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '!':
                $_SESSION["resultado"] = fatorar($_SESSION["num1"]);
                break;
        }
        // Atualizando o historico
        array_push($historico, $_SESSION["resultado"]);
        $_SESSION['historico'] = $historico;
    }

    // Criação da função salvar operação
    if (isset($_POST["salvar"])) {
        $_SESSION["num1"] = trim($_POST["num1"]);
        $_SESSION["num2"] = trim($_POST["num2"]);
        $_SESSION["operacao"] = $_POST["operacao"];
        // Verifica qual operação foi selecionada e faz as operações
        switch ($_SESSION["operacao"]) {
            case '+':
                $_SESSION["contaSalva"] = somar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '-':
                $_SESSION["contaSalva"] = subtrair($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '/':
                $_SESSION["contaSalva"] = dividir($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '*':
                $_SESSION["contaSalva"] = multiplicar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '^':
                $_SESSION["contaSalva"] = elevar($_SESSION["num1"], $_SESSION["num2"]);
                break;
            case '!':
                $_SESSION["contaSalva"] = fatorar($_SESSION["num1"]);
                break;
        }
    }

    if (isset($_SESSION["contaSalva"])) {
        $contaSalva = $_SESSION["contaSalva"];
    } else {
        $contaSalva = "";
    }

    // Criação da função recupear operação

    ?>

    <h2>Calculadora em php </h2>
    <form method="post" action="">
        <label for="num1">Primeiro numero: </label>
        <input type="text" name="num1" value="
        <?php
        // Manter o valor após realizar operação 
        echo $_SESSION['num1'];
        ?>">
        <select name="operacao">
            <option value="+"> + </option>
            <option value="-"> - </option>
            <option value="/"> / </option>
            <option value="*"> * </option>
            <option value="^"> ^ </option>
            <option value="!"> ! </option>
        </select>
        <label for="num2">Segundo numero: </label>
        <input type="text" name="num2" value="
        <?php
        // Manter o valor após realizar operação 
        echo $_SESSION["num2"];
        ?>">
        <br>
        <input type="submit" value="Calcular" name="calcular">
        <input type="submit" value="Salvar Operação" name="salvar">
    </form>
    <form method="post">
        <input type="submit" value="Recuperar Operação" name="recuperar">
        <input type="submit" value="Limpar Historico" name="limpar">
    </form>
    <div class="">
        <p>
            <?php
            // Mostrar resultado da operação
            echo $_SESSION["resultado"];
            ?>
        </p>
    </div>





    <div>
        <p>Operação salva:
            <?php
            // Mostra a conta salva
            echo $_SESSION["contaSalva"];
            ?>
        </p>
    </div>
    <div>
        <h2>Historico</h2>
        <ul>
            <?php
            // Mostar os itens dentro de historico
            foreach ($historico as $conta) {
                echo  "<li>" . $conta . "<br></li>";
            }
            ?>
        </ul>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>