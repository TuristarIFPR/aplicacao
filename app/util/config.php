<?php
#Nome do arquivo: config.php
#Objetivo: define constantes para serem utilizadas no projeto

//Mostrar erros do PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Banco de dados: conexão MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'turistar');
define('DB_USER', 'root');
define('DB_PASSWORD', 'bancodedados');

// Caminho base para controllers e administrador
define('BASEURL', '/turistar/aplicacao/app');

// Caminho para as páginas do visitante
define('BASE_URL_VISITANTE', '/turistar/aplicacao/app/view/area_visitante');

// Caminho correto da pasta de imagens pública (FORA do app)
define('BASE_URL_PUBLICA', '/turistar/publica');

//Nome do sistema
define('APP_NAME', 'Template do Projeto Integrador');

//Página de login e logout
define('LOGIN_PAGE', BASEURL . '/controller/LoginController.php?action=login');
define('LOGOUT_PAGE', BASEURL . '/controller/LoginController.php?action=logout');

//Página home do sistema
define('HOME_PAGE', BASEURL . '/controller/SiteController.php?action=home');

//Sessão do usuário
define('SESSAO_USUARIO_ID', "usuarioLogadoId");
define('SESSAO_USUARIO_NOME', "usuarioLogadoNome");
define('SESSAO_USUARIO_PAPEL', "usuarioLogadoPapel");

//Arquivos
define('PATH_ARQUIVOS', __DIR__ . "/../../arquivos");
define('BASEURL_ARQUIVOS', BASEURL . "/../arquivos");
