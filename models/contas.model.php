<?php

function criarArray() {
    $items = [
        'Facebook' => ['login' => 'a23213bcde', 'senha' => 'dsadsa'],
        'Google' => ['login' => '2121abcde', 'senha' => 'senhadasdas123'],
        'Microsoft' => ['login' => 'abc3213de', 'senha' => 'senhasdad123'],
        'Github' => ['login' => 'abcddsade', 'senha' => 'senha1dada23'],
        'Moodle' => ['login' => 'abe2222dacde', 'senha' => 'senha123'],
        'UTFPR' => ['login' => 'ab32131cdeqwee', 'senha' => 'senhaadsa123'],
        'Instagram' => ['login' => '1f/ghij', 'senha' => 'pass345']
    ];
    return $items;
}

// CRIAR ARRAY
if(!isset($items)){
    criarArray();
    $items = criarArray();
}

// ADD CONTA
if (!empty($_POST['novoNome'])) {
    $n = $_POST['novoNome'];
    $l = $_POST['novoLogin'];
    $s = $_POST['novaSenha'];
    $items = array_merge($items, novaConta($n, $l, $s));
}

function novaConta($nomeConta, $loginConta, $senhaConta)
{
    $array = [
        $nomeConta => [
            'login' => $loginConta,
            'senha' => $senhaConta
        ]
    ];
    return $array;
}

// DEVERIAM FUNCIONAR PARA ADICIONAR
//array_push($items, ['novaconta' => ['login' => 'aaaaaa', 'senha' => 'aaaa']]);
//$items[] = adicionar('Spotify', 'matheus', 'senhaa');

//$items = array_merge($items, novaConta('Spotify', 'matheus', 'senhaa')); //Adiciona 
//unset($items['UTFPR']); //Exclui
