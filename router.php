<?php
// router.php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;

// Se a URL corresponder a um arquivo físico (imagem, CSS, JS, etc.) ou diretório existente, serve direto
if ($path !== '/' && file_exists($file)) {
    return false; // Retorna false para o servidor embutido entregar o arquivo estático
}

// Caso contrário, redireciona tudo para o seu index.php (comportamento padrão de frameworks/URL amigável)
require_once __DIR__ . '/index.php';