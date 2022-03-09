<?php

// Conexão ao banco de dados --- falta colocar a proteção da senha, não colocar (md5) porque não é segura para banco de dados//

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

//Verificação se vai existir erro na conexão com banco de dodos//
if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}