<?php
//register.php
//código do registro, em andamento... 
//sem estruturas condicionais nem testes realizados  

    $DATABASE_HOST = '192.168.1.11';
    $DATABASE_USER = $_POST['username'];
    $DATABASE_PASS = $_POST=['password'];
    $DATABASE_NAME = 'TESTLOGIN'; /*
    $USER_MAIL = $_POST=['email'];
    $USER_ID = $_POST=['id']; // cpf, cnpj
    $USER_PHONE = $_POST=['phone']; */

    //DB conn validation
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    //validação de username, mail e/ou id já existente 
    //adaptar à ordem do frontend
    $sql = "SELECT username, mail, id role FROM users WHERE username = '$DATABASE_USER', mail = '$USER_MAIL', id = $USER_ID ";
    //query exemplo, ainda nao fiz este teste

    //
    $sqlx = "INSERT INTO users (username, password, email) users VALUES "
    $sqlx .= "('$DATABASE_USER','$DATABASE_PASS', '$USER_MAIL' )";
    mysqli_query($con,$sqlx);// or die ("Erro ao tentar cadastrar usuário");
    //grant all privileges on TESTLOGIN.users to test@'%'; 
    //database.table - sem essa permissão, só loga localhost
    
    //podemos restringir mais, mas segurança não é exigência
    //o ideal é que isso seja um procedimento executado dentro do banco, chamado no momento do create user
         
    //tem que rolar uma msg ou pop-up de "user cadastrado"
    echo 'Parabéns, você está cadastrado no ParkingBR!';
    //header('Location: home-cliente.php'); - redirect após o usuário estar criado

    //Email Validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }

    //Invalid Characters Validation
    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }

    //Character Length Check
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
    
    //não precisamos validar se a conta está ativada...
    //se sim, será mais um campo boolean nas tables
?>
