<?= $this->layout("_theme", ["title" => "Profile User", "company" => $company]) ?>
<?= $company ?>
<h2>You Profile</h2>
<p>Hello, <?= $user ?></p>

<h3>Skills</h3>
<?= $this->widget("widgets::list", [
    $this->child("widgets::item", ["content" => "PHP"]),

    $this->children("widgets::list2", [
        $this->child("widgets::item", ["content" => "Jquery"]),

        $this->children("widgets::list2", [
            $this->child("widgets::item", ["content" => "ReactJs"]),
            $this->child("widgets::item", ["content" => "AngularJs"]),
        ], ["label" => "NodeJs"]),

    ], ["label" => "JavaScript"]),

    $this->child("widgets::item", ["content" => "MySql"]),
]) ?>

<br>
<p>To learn more visit <a target="_blank" href="https://platesphp.com/">PlatesPHP</a></p>

<!-- Comment -->
<script js-mix>
    // Comment
    alert('deu certo');
</script>