<?php 
session_start();

//verifica se a variavel se sessão CNPJ está populada, se nao, o usuario nao entrou, entao será redirecionado para login/acesso
//vide htaccess
// if (!isset($_SESSION['CNPJ']))
// {	
// 	unset($_SESSION['CNPJ']);
// 	header("location: login/acesso");
// }