<?php

include_once 'conexaoBD.php';
include_once 'util.php';
session_start(); //necessário até mesmo no logout
salvarLog('Q', '', $_SESSION['IDUsuario'], '');
unset($_SESSION['NomeUsuario']);
unset($_SESSION['IDUsuario']);
unset($_SESSION['DataHora']);
unset($_SESSION['Privilegio']);
session_destroy();

header('Location: ' . getURLPadrao() . '/login.php');
die();
