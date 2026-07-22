<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ExpressTask - Builds & Files</title>
</head>
<?php
echo "<body><center><h3>ExpressTask & API {$versao} {$timestamp}</h3><hr>";

// Diretório do ExpressTask (ver pra usar do Settings.conf)
$dirExpress = GetConfig("APP_EXPRESSPATH");

if( !is_file( $dirExpress . "/ExpressTask.ini") ) {
   // Não temos os arquivos ..
   echo "O ExpressTask e/ou suas configurações não foram localizados neste Servidor<br/><br/>";
   echo "</center></body></html>";
   die();
}

// Log dos erros PHP
@ini_set('log_errors', 1);
@ini_set('error_log', $dirExpress . '/Logs/php_error.log');

// Visualizar um dos arquivos
if( isset( $_GET['view'] ) ) {
   // Tenta ver no Temp
   $viewFile = $dirExpress . "/Temp/" . $_GET['view'];
   if( !is_file( $viewFile ) ) {
      // e quem sabe nos Logs
      $viewFile = $dirExpress . "/Logs/" . $_GET['view'];
   }
   if( is_file( $viewFile ) ) {
      // Exibir o conteúdo do arquivo
      echo "Exibindo o conteúdo do arquivo: {$viewFile}<br/><br/></center><pre>";
      echo file_get_contents( $viewFile );
      // Na tentativa de deixar "certinho" com os caracteres acentuados, mas não ficou 100% bom
      // echo mb_convert_encoding(file_get_contents( $viewFile ), 'ISO-8859-1', 'UTF-8');
      echo "</pre></body></html>";
   } else {
      // Não temos o arquivo ..
      echo "O arquivo solicitado não existe mais neste Servidor<br/><br/>";
      echo "</center></body></html>";
   }
   die();
}

// Arquivos do ExpressTask
echo "Lista dos arquivos existentes no servidor<br/><br/>";

// Abre a tabela, cria títulos
echo "<table><tr><th>Nome do Arquivo</th><th>Tamanho</th><th>Modificação</th></tr>";
dirToTable( $dirExpress );
// Fecha a tabela
echo "</table>";

// Adminer
if( is_file("adminer.php") ) {
   echo '<br/><br/><br/>Acesse o <a href="adminer.php">Adminer</a> neste servidor clicando <a href="adminer.php">aqui</a></br>';
}

// InfoExpress - Adelino Alves
//  só vai funcionar se o Apache estiver
//  rodando como "Administrador", pois aplica-se
//  limites de acesso por padrão
if( is_file("S:/InfoAdelino/ExpressFlex") ) {
   echo "<hr>Lista dos arquivos ExpressFlex (Base de Produção) instalados no servidor<br/><br/>";

   // Abre a tabela, cria títulos
   echo "<table><tr><th>Nome do Arquivo</th><th>Tamanho</th><th>Modificação</th></tr>";
   dirToTable( "S:/InfoAdelino/ExpressFlex" );
   // Fecha a tabela
   echo "</table>";
}

echo "</center></body></html>";