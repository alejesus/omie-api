<?php $this->layout("_theme",[ "title" => "Home" ]); ?>

<h1>Iniciar</h1>
<div class="users">
   <?php if (isset($users)):
      foreach ($users as $user): ?>
         <article class="users_user ">
            <h4><?= ($user->desenvolv ? "(d) " : "") . utf_trim($user->nome_compl); ?></h4>
         </article>
      <?php
      endforeach;
   else:
      ?>
      <h2>Não existem dados cadastrados...</h2>
   <?php
   endif; ?>
</div>