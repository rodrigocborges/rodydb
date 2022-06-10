
# RodyDB

A ideia central é criar um banco de dados simples para 
projetos que queiram salvar desde informações simples 
como uma cor de fundo da página até mesmo dados mais sensíveis, 
tudo isso diretamente em arquivos locais criptogrados, sem a 
necessidade de ter um servidor a parte. Um exemplo interessante 
seriam em hospedagens compartilhadas, onde esses dados criptogrados serão incluídos em um local privado, fora da pasta "public_html", evitando acesso indesejado.

## Como surgiu a ideia
Muitas vezes passei por situações que queria apenas testar simples ideias
ou até mesmo fazer um CRUD básico e tinha que estar indo no navegador
ou em um terminal realizar comandos SQL ou usar uma interface gráfica
para criar tabelas e bancos de dados, configurando conexões, entre outras coisas, mesmo o projeto sendo
o mais simples possível. 

Além disso, gostaria de me introduzir ao mundo do open-source para
criar meu próprio projeto e discutir ideias. Talvez uns achem o projeto
tosco ou sem noção, mas essa ideia surgiu muito forte em minha mente
e eu pensei: "preciso urgentemente testar isso". E estou aqui,
para testar, aprender e trocar ideias com todos que queiram participar. Obrigado!
## Uso/Exemplos

```php
<?php
	
	require_once('autoload.php');

	use RodyDB\Core\RodyDatabase;

	$db = new RodyDatabase('senha-do-db');

  //Primeiro parâmetro: chave
  //Segundo parâmetro: valor
  $db->create('users', [
		[ 'id' => 1, 'name' => 'john'],
		[ 'id' => 2, 'name' => 'bill'],
		[ 'id' => 3, 'name '=> 'steve'],
					 
	]);

	$db->create('config', [
		'theme' => 'blue',
		'darkMode' => true
	]);

	echo '<pre>';
	print_r(
    //retorna os dados da chave 'users' e se passado a senha (segundo parametro)
    //exibe os dados descriptografados
		$db->show('users', '1234') 
	);
	echo '</pre>';
?>
}
```


## Autores

- [Rodrigo Borges](https://www.github.com/rodrigocborges)

