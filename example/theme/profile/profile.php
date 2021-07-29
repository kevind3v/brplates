<?php

$this->layout("_theme", ["title" => "Profile User", "company" => $company]) ?>
<?= $company ?>
<h2>You Profile</h2>
<p>Hello, <?= $user ?></p>
<br>
<p>To learn more visit <a target="_blank" href="https://platesphp.com/">PlatesPHP</a></p>
<script>
    alert('deu certo');
</script>