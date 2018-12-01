<?php

$base_dados = 'u223422362_adi';
$usuario_bd = 'u223422362_adi';
$senha_bd   = '1AtolIdeias@';
$host_db    = 'mysql.hostinger.com.br';
$charset_db = 'utf8';
$conexao_pdo = null;
 
/* Concatenação das variáveis para detalhes da classe PDO */
$detalhes_pdo  = 'mysql:host=' . $host_db;
$detalhes_pdo .= ';dbname='. $base_dados;
$detalhes_pdo .= ';charset='. $charset_db;
 
// Tenta conectar
try {
    // Cria a conexão PDO com a base de dados
    $conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
 } catch (PDOException $e) {
    // Se der algo errado, mostra o erro PDO
    print "Erro: " . $e->getMessage() . "<br/>";
    // Mata o script
    die();
}

$email   = $_POST['email'];

global $email; //função para validar a variável $email no script todo

// Prepara o envio
$prepara = $conexao_pdo->prepare(" INSERT INTO mailingemail values (:email)");

// Envia
$verifica = $prepara->execute(array(':email' => $email));

if ($verifica) {
	echo ("Obrigado!\nFique ligado no seu email, que em breve temos mais novidades incríveis para você!");
} else {
	echo 'Erro ao enviar dados.';
	exit;
}

?>

