<?php

require_once("config.php");

/*$root = new Usuario();          //carrega somente um usuario
$root->loadById(3);
echo $root;*/

/*  $lista = Usuario::getList();    //carrega lista de usuario
echo json_encode($lista);   */ 

/*  $search = Usuario::search("jo");
echo json_encode($search);  */

/*  $pesquisa = new Sql();   
$usuarios = $pesquisa->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>4));
echo json_encode($usuarios);   */

//$usuario = new Usuario();  // carrega o usuario por login e senha
//$usuario->login("jose","123445678");
//echo $usuario;


/*  $aluno = new Usuario();
$aluno->insert();
echo $aluno;   */

$usuario = new Usuario();
$usuario->loadById(8);
$usuario->update("professor","ij434534jk");
echo $usuario;



?>