<?php
    require_once("autoload.php")
    //gera o token de controle para remover o cliente
    $_SESSION['TOKEN']= Util::GeraToken();
    
    $query= "SELECT idadmin 
             FROM admin";
    $db= new DB();
    $db->Sql($query);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CADASTRO DE CLIENTES</title>
<style type="text/css">
<!--
.style1 {
color: #FF0000;
font-size: x-small;
}
.style3 {color: #0000FF; font-size: x-small; }
</style>
<script type="text/javascript">
function validaCampo()
{
if(document.cadastro.nome.value=="")
{
alert("O Campo nome é obrigatório!");
return false;
}
else
if(document.cadastro.email.value=="")
{
alert("O Campo email é obrigatório!");
return false;
}
else
if(document.cadastro.login.value=="")
{
alert("O Campo Login é obrigatório!");
return false;
}
else
if(document.cadastro.senha.value=="")
{
alert("Digite uma senha!");
return false;
}
else
return true;
}
</script>
</head>
 
<body>
<form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;">
  <table width="625" border="0">
    <tr>
      <td width="69">Nome:</td>
      <td width="546"><input name="nome" type="text" id="nome" size="70" maxlength="60" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input name="email" type="text" id="email" size="70" maxlength="60" />
      <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Login:</td>
      <td><input name="login" type="text" id="login" maxlength="12" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Senha:</td>
      <td><input name="senha" type="password" id="senha" maxlength="12" />
          <span class="style1">*</span></td>
    </tr>
    <tr>
      <td colspan="2"><input name="news" type="checkbox" id="news" value="ATIVO" checked="checked" />
Desejo receber novidades e informações sobre o conteúdo deste site. </td>
    </tr>
    <tr>
      <td colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" />
       
 
          <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />
         
 
          <span class="style1">* Campos com * são obrigatórios!          </span></p>
      <p>  </p></td>
    </tr>
  </table>
</form>
</body>
</html>