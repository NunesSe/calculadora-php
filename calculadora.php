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
    // Pegar variaveis
    if (isset($_POST["num1"])) {
        $num1 = $_POST["num1"];
    }

    if (isset($_POST["num2"])) {
        $num2 = $_POST["num2"];
    }

    if (isset($_POST["operacao"])) {
        $operacao = $_POST["operacao"];
    }


    // Funções de operação
    function somar($num1, $num2)
    {
        return $num1 + $num2;
    }

    function subtrair($num1, $num2)
    {
        return $num1 - $num2;
    }

    function dividir($num1, $num2)
    {
        if ($num2 == 0) {
            return "Erro - Operação invalida!";
        }
        return $num1 / $num2;
    }

    function multiplicar($num1, $num2)
    {
        return $num1 * $num2;
    }

    function elevar($num1, $num2)
    {
        return pow($num1,  $num2);
    }

    function fatorar($num1)
    {
        return gmp_fact($num1);
    }

    function mostarOperacoes($num1, $num2, $operacao) {
        return "{$num1} {$operacao} {$num2} = ";
    }

    // Criar h
    ?>
    <h2>Calculadora em php </h2>

    <form method="post" action="">
        <input type="text" name="num1" placeholder="Digite o primeiro numero: ">
        <select name="operacao">
            <option value="+"> + </option>
            <option value="-"> - </option>
            <option value="/"> / </option>
            <option value="*"> * </option>
            <option value="^"> ^ </option>
            <option value="!"> ! </option>
        </select>
        <label for="num2">Segundo numero: </label>
        <input type="text" name="num2" value="<?php echo $num2 = isset($num2) ? $num2 : 0;?>"><br>
        <input type="submit" value="Calcular">

        <div class="">
            <p>
                <?php
                if (isset($operacao)) {
                    switch ($operacao) {
                        case '+':
                            echo mostarOperacoes($num1, $num2, $operacao) . somar($num1, $num2);
                            break;
                        case '-':
                            echo subtrair($num1, $num2);
                            break;
                        case '/':
                            echo dividir($num1, $num2);
                            break;
                        case '*':
                            echo multiplicar($num1, $num2);
                            break;
                        case '^':
                            echo elevar($num1, $num2);
                            break;
                        case '!':
                            echo fatorar($num1);
                            break;
                        default:
                            echo "Resultado invalido!";
                            break;
                    }
                }
                ?>
            </p>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>