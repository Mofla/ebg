<?php
$cakeDescription = 'Ebrigade';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-theme.css') ?>
    <?= $this->Html->css('styles.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('jquery-3.1.0.min.js')?>
    <?= $this->Html->script('bootstrap.min.js')?>


</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Ebrigade v2</a>
        </div>
        <ul class="nav navbar-nav">
            <?= $this->element('navigation')?>
        </ul>
        <?php $notif = $this->cell('Notifications');
        echo $notif; ?>
    </div>
</nav>
<?= $this->Flash->render() ?>
<?php $cell = $this->cell('Login');
echo $cell; ?>

<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>