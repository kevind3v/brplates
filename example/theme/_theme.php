<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?= $title ?> | <?= $company ?></title>
    <!-- Using function declared in the setFunction method -->
    <link rel="stylesheet" href="<?= $this->asset("style.css") ?>">
</head>
<body>
   <?= $this->section('content') ?>
</body>
</html>