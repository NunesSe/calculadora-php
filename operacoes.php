<?php 
// Funções de operação
function mostrarOperacoes($num1, $num2, $operacao)
{
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

function fatorar($num1, $num2)
{
    if ($num1 >= 0) {
        $resultado = 1;
        for ($i = 1; $i <= $num1; $i++) {
            $resultado *= $i;
        }
        return "{$num1} ! {$num2} = {$resultado}";
    }
    return "Erro - Operação invalida!";
}
?>