<?php $this->layout("_theme"); ?>

<div class="error">
   <h2>Ops! erro <?= $error; ?></h2>
   <p>Ocorreu algo de estranho e não foi legal ...<p>
   <p>Vamos tentar de novo?<p>
</div>

<?php $this->start("sidebar"); ?>
<a href="<?= url(); ?>" title="Volta ao inicio!">Voltar</a>
<?php $this->end(); ?>