<?php
$items = [
    'Facebook' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Google' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Microsoft' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Github' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Moodle' => ['login' => 'abcde', 'senha' => 'senha123'],
    'UTFPR' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Instagram' => ['login' => 'fghij', 'senha' => 'pass345']
];

// DEVERIAM FUNCIONAR PARA ADICIONAR
//array_push($items, ['novaconta' => ['login' => 'aaaaaa', 'senha' => 'aaaa']]);
//$items[] = adicionar('Spotify', 'matheus', 'senhaa');

//$items = array_merge($items, novaConta('Spotify', 'matheus', 'senhaa')); //Adiciona 
unset($items['UTFPR']); //Exclui

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
