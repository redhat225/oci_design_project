<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$pageDescription = 'Orange Security Projects';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('favicon.png','/img/favicon.png',['type'=>'icon']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->Html->css('../node_modules/bulma/custom_bulma') ?>
    <?= $this->Html->css('main') ?>
    <!-- Another Css -->
    <?= $this->Html->css('../node_modules/toastr/build/toastr.min') ?>
    <?= $this->Html->css('../node_modules/hover.css/css/hover-min.css') ?>
    <?= $this->Html->css('../node_modules/angular-colorbox/themes/dark/colorbox-darktheme') ?>
    <?= $this->Html->css('loading-bar-custom') ?>
    <?= $this->Html->css('../js/fliptimer/fliptimer/fliptimer') ?>

    <?= $this->fetch('css') ?>

</head>
<body>
    <?= $this->fetch('content') ?>
    <?= $this->fetch('script') ?>
</body>
</html>


