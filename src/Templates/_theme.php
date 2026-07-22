<!doctype html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie*edge">
   <title>API | <?= $this->e($title); ?></title>

   <link rel="stylesheet" href="<?= url("assets/style.min.css"); ?>"/>
   <style>
   table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
   }
   th, td {
      padding-top: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      padding-right: 10px;
   }
   </style>
</head>
<body>

<nav class="main_nav">
   <?php if($this->section("sidebar")):
      echo $this->section("sidebar");
   else: ?>
      <a title="" href="<?= url("home"); ?>">Home</a>
      <a title="" href="<?= url("info"); ?>">Informações</a>
      <a title="" href="<?= url("testes"); ?>">Testes</a>
      <a title="" href="<?= url("contato"); ?>">Contato</a>
   <?php
   endif; ?>
</nav>

<main class="main_content">
  <?= $this->section("content"); ?>
</main>

<footer class="main_footer">
   APIs - Todos os Direitos Reservados
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?= $this->section("scripts"); ?>
</body></html>