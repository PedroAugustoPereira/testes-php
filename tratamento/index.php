
<?php


error_reporting(E_ALL & ~ E_NOTICE & ~ E_WARNING);

$nome = $_GET['nome'];

if(!$nome){
    echo "não tem nome";
}
else{
    echo "nome: $nome";
}




?>