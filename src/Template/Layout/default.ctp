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

$cakeDescription = 'Admin Dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('vendor.bundle.base.css') ?>
    <?= $this->Html->css('vendor.bundle.addons.css') ?>
    <?= $this->Html->css('materialdesignicons.min.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('style1.css') ?>



    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <?php
    //pr($user); die();
    //$user     = $this->Auth->user();
    //pr($user);die();
    //$username = $user['User']['username'];
   // echo $this->element('Navbar/default');

    //$xxx = $this->request->session()->read('User', $user);
    echo $this->element('Navbar/default', [
    "helptext" => $y
    ]);

      ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->Html->script('vendor.bundle.base.js') ?>
    <?= $this->Html->script('vendor.bundle.addons.js') ?>
    <?= $this->Html->script('off-canvas.js') ?>
    <?= $this->Html->script('misc.js') ?>
    <?= $this->Html->script('dashboard.js') ?>
    <?=$this->Html->script('chart.js') ?>
</body>
</html>
