<?php
    //Inclusão de um arquivo php chamado para conexão com autenticação para o banco de dados e suas configurações
    include_once("conexao.php");

    //Declaração da variável "pessoa" para atribuir o valor do "name" do input do formulário
    $pessoa= filter_input(INPUT_POST,'pessoa',FILTER_SANITIZE_STRING);
    //Declaração da variável "nome" para atribuir o valor do "name" do input do formulário
    $nome= filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
    //Declaração da variável "sobrenome" para atribuir o valor do "name" do input do formulário
    $sobrenome= filter_input(INPUT_POST,'sobrenome',FILTER_SANITIZE_STRING);
    //Declaração da variável "nomecompleto" para concatenar o nome e sobrenome
    $nomecompleto= $nome . '' . $sobrenome;
    //Declaração da variável "cpf" para atribuir o valor do "name" do input do formulário
    $cpf= filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
    //Declaração da variável "cnpj" para atribuir o valor do "name" do input do formulário
    $cnpj= filter_input(INPUT_POST,'cnpj',FILTER_SANITIZE_STRING);
    //Declaração da variável "razaosocial" para atribuir o valor do "name" do input do formulário
    $razaosocial= filter_input(INPUT_POST,'razaosocial',FILTER_SANITIZE_STRING);
    //Declaração da variável "email" para atribuir o valor do "name" do input do formulário
    $email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    //Declaração da variável "telefone" para atribuir o valor do "name" do input do formulário
    $telefone= filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
    //Declaração da variável "senha" para atribuir o valor do "name" do input do formulário
    $senha= filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
    //Declaração da variável "decisaoopcao" para atribuir o valor do "name" do input do formulário
    $decisaoopcao= filter_input(INPUT_POST,'decisaoopcao',FILTER_SANITIZE_STRING);
    //Declaração da variável "decisaoveiculo" para atribuir o valor do "name" do input do formulário
    $decisaoveiculo= filter_input(INPUT_POST,'decisaoveiculo',FILTER_SANITIZE_STRING);
    //Declaração da variável "placa" para atribuir o valor do "name" do input do formulário
    $placa= filter_input(INPUT_POST,'placa',FILTER_SANITIZE_STRING);
    //Declaração da variável "modelo" para atribuir o valor do "name" do input do formulário
    $modelo= filter_input(INPUT_POST,'modelo',FILTER_SANITIZE_STRING);
    //Declaração da variável "ano" para atribuir o valor do "name" do input do formulário
    $ano= filter_input(INPUT_POST,'ano',FILTER_SANITIZE_STRING);
    //Declaração da variável "fabricante" para atribuir o valor do "name" do input do formulário
    $fabricante= filter_input(INPUT_POST,'fabricante',FILTER_SANITIZE_STRING);
    //Declaração da variável "cor" para atribuir o valor do "name" do input do formulário
    $cor= filter_input(INPUT_POST,'cor',FILTER_SANITIZE_STRING);

    //Condição "if" aplicada para uma conexão que dê erro, retornando assim uma página php informando que deu problema na conexão
    if($conn->connect_error){
        die("Conexão Abortada".$conn->connect_error);
    }

    if($pessoa == 'pessoaFisica') {
        $insert_usuario="insert into pessoafisica (pessoa, nome, sobrenome, cpf, email, telefone, senha, decisaoopcao, decisaoveiculo, placa, modelo, ano, fabricante, cor) values ('$pessoa', '$nome', '$sobrenome', '$cpf', '$email', '$telefone', '$senha', '$decisaoopcao', '$decisaoveiculo', '$placa', '$modelo', '$ano', '$fabricante', '$cor')";
    }
    elseif($pessoa == 'pessoaJuridica'){
        $insert_usuario="insert into pessoajuridica (pessoa, cnpj, razaosocial, email, telefone, senha, decisaoopcao, decisaoveiculo, placa, modelo, ano, fabricante, cor) values ('$pessoa', '$cnpj', '$razaosocial', '$email', '$telefone', '$senha', '$decisaoopcao', '$decisaoveiculo', '$placa', '$modelo', '$ano', '$fabricante', '$cor')";
    }
    
    //Condição "if" aplicada para uma conexão que foi concluída, retornando uma página php informando que foi enviado ao banco de dados
    if($conn->query($insert_usuario) === true) {
        echo "linha inserida";
    } else {
      echo "Erro: "."<br>".$conn->error;
    }

    //Fechar conexão com banco
    $conn->close();
?>