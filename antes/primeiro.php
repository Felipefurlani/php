<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="post">
       nome:<br>
       <input type="text" name="nome" size="30">
       <br><br>

       idade: <br>
       <input type="text" name="idade" size="30">
       <br><br>

       Cor: <br>
       <input type="text" name="cor">
        <br><br>
        <input type="submit" value="cadastrar">
    </form>
    
</body>
</html>

<?php
if(!isset($_COOKIE['nome'])){
    $msg = "Você não é cadastrado em nosso site! Para ter acesso ao conteudo exclusivo do assinante, <a href='cadastra.php'> clique aqui ! </a>";

} else{
    $nome = $_COOKIE["nome"];
    $idade = $_COOKIE["idade"];
    $contaVisitas = $_COOKIE["ContaVisitas"];
}
if($idade < 18 ){
    $msg = "<span style = 'color:red;'> Você não tem idade para acessar esse site! <span>";
}
else{
    $cor =$_COOKIE["Cor"];

    if($contaVisitas >0){
        $msg = "olá" . $nome . "Bem vindo de volta ao nosso site ...";
    } else{
        $msg = "olá " . $nome . "! Bem vindo ao nosso site ...";
        $contaVisitas++;
        setcookie("contasVisitas",$contaVisitas, time()+3600,"/"); 
    }
} /*setcookie("nome",0, time()-3600, "/");
setcookie("idade",0, time()-3600, "/");
setcookie("cor",0, time()-3600, "/");
setcookie("ContaVisitas",0, time()-3600, "/");
*/
//Resultado: zera os valores e seta data para expirar para 1 hora atras...
 