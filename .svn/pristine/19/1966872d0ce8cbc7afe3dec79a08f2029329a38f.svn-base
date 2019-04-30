<?php
include_once 'antiInjecao.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $indice = isset($_GET['indice'])? retirarInjecao($_GET['indice']) : '';
    
    switch($indice){
        case '1': echo "<div class='alert alert-success'>Pessoa cadastrada com sucesso!</div>";
            break;
        case '2': echo "<div class='alert alert-success'>Cadastro alterado com sucesso!</div>";
            break;
        case '3': echo "<div class='alert alert-success'>Cadastro removido com sucesso!</div>";
            break;
        case '4': echo "<div class='alert alert-success'>Usu&aacute;rio cadastrado com sucesso!</div>";
            break;
        case '5': echo "<div class='alert alert-warning'>CPF inv&aacute;lido.</div>";
            break;
        case '6': echo "<div class='alert alert-danger'>Erro ao cadastrar pessoa.</div>";
            break;
        case '7': echo "<div class='alert alert-danger'>Erro ao atualizar pessoa.</div>";
            break;
        case '8': echo "<div class='alert alert-danger'>Erro ao excluir pessoa.</div>";
            break;
        case '9': echo "<div class='alert alert-danger'>Erro ao excluir usu&aacute;rio</div>";
            break;
        case '10': echo "<div class='alert alert-danger'>Login e/ou senha inv&aacute;lidos!</div>";
            break;
        case '11': echo "<div class='alert alert-danger'>CPF Já cadastrado!</div>";
            break;
    }
}