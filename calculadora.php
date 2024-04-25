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
    function mostrarOperacoes($num1, $num2, $operacao) {
        return "{$num1} {$operacao} {$num2} = ";
    }

    function somar($num1, $num2)
    {
        return mostrarOperacoes($num1, $num2, "+") . $num1 + $num2;
    }
    
    function subtrair($num1, $num2)
    {
        return mostrarOperacoes($num1, $num2, "-") . $num1 - $num2;
    }

    function dividir($num1, $num2)
    {
        if ($num2 == 0) {
            return "Erro - Operação invalida!";
        }
        return mostrarOperacoes($num1, $num2, "/") . $num1 / $num2;
    }

    function multiplicar($num1, $num2)
    {
        return mostrarOperacoes($num1, $num2, "*") . $num1 *  $num2;
    }

    function elevar($num1, $num2)
    {
        return  mostrarOperacoes($num1, $num2, "^") . pow($num1,  $num2);
    }

    function fatorar($num1)
    {
        if($num1 >= 0) {
            $resultado = 1;
            for ($i=1; $i <= $num1; $i++) { 
                $resultado *= $i;
            }
            return "{$num1}! = {$resultado}";
        }
        return "ERRO";
    }


    // TODO Criar historico e suas funcoes
    session_start();
    if (!isset($_SESSION['historico'])) {
        $_SESSION['historico'] = [];
    }
    
    $historico = $_SESSION['historico'];

    if(isset($_POST["limpar"])) {
        $historico = [];
        $_SESSION["historico"] = [];
    }


    // TODO Criar salvar conta e voltar a conta salva
    ?>
    <h2>Calculadora em php </h2>

    <form method="post" action="">
        <label for="num2">Primeiro numero: </label>
        <input type="text" name="num1" value="<?php echo $num1 = isset($num1) ? $num1 : 0;?>">
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
    </form>

        <div class="">
            <p>
                <?php
                if (isset($operacao)) {
                    switch ($operacao) {
                        case '+':
                            $resultado = somar($num1, $num2);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        case '-':
                            $resultado = subtrair($num1, $num2);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        case '/':
                            $resultado = dividir($num1, $num2);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        case '*':
                            $resultado = multiplicar($num1, $num2);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        case '^':
                            $resultado = elevar($num1, $num2);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        case '!':
                            $resultado = fatorar($num1);
                            echo $resultado;
                            array_push($historico, $resultado);
                            $_SESSION['historico'] = $historico;
                            break;
                        default:
                            echo "Resultado invalido!";
                            break;
                    }
                }
                ?>
            </p>
        </div>
        <div>
            <form method="post">
                <input type="submit" value="Limpar Historico" name="limpar">
            </form>
        </div>
        <div>
            <h2>Historico</h2>
            <ul>
                <?php 
                foreach ($historico as $conta) {
                    echo  "<li>" . $conta . "<br></li>";
                }
                ?>
            </ul>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>