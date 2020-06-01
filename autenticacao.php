<?php
//este código está baseado no meu ambiente de testes, logo, deve ser editado em alguns pontos
//já foi testado e está funcional, faltando ser adaptado ao front end

//Conectar ao banco
session_start();
$DATABASE_HOST = '192.168.1.11';//editar de acordo com seu ip ou hostname 
$DATABASE_USER = $_POST['username'];//editar com as vars do front end
$DATABASE_PASS = $_POST['password'];//editar com as vars do front end
$DATABASE_NAME = 'TESTLOGIN';//editar de acordo com sua base

//verificar erro na conexão
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
  	// mostrar erro
    exit('Falha ao conectar ao banco de dados: ' . mysqli_connect_error());
}

//pendente:criar page pro erro!!
//segundo Rosana, não precisamos de muitas validações/segurança, essa deve bastar 

//select perfil do usuário (1= cliente, 2= gestor, 3= admin)
$sql = "SELECT role FROM users WHERE username = '$DATABASE_USER'";
$result = mysqli_query($con,$sql);

//a $var acima guarda resultado o da query feita pelo método
//sintaxe: $varResultado = método($varConexãoDB,$varDaQuery);

//as tables (no banco) deverão conter o campo "role" ("tipo", "perfil")
//1= cliente, 2= gestor, 3= admin. 
//A table dever ter role default =1 (no banco), para evitar termos trabalho
//logo, serão 3 arquivos de home page diferentes, 1 pra cada tipo de user

//redirects de acordo com perfil do user
switch($result){
    case 1:
        header('Location: home-cliente.php');//editar de acordo com seu server
        break;
    case 2://role int(1) = gestor
        header('Location: home-gestor.php');//editar de acordo com seu server
        break;
    case 3://role int(3) = admin
        header('Location: home-admin.php'); //editar de acordo com seu server
        break;    
}
?>
