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

    <?= $this->Html->css('vendor.bundle.base.css') ?>
    <?= $this->Html->css('vendor.bundle.addons.css') ?>
    <?= $this->Html->css('materialdesignicons.min.css') ?>
    <?= $this->Html->css('style.css') ?>    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background-image: url('../img/login_1.jpg');">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              
              <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
    <footer>
    </footer>
        <?= $this->Flash->render() ?>

    <?= $this->Html->script('vendor.bundle.base.js') ?>
    <?= $this->Html->script('vendor.bundle.addons.js') ?>
    <?= $this->Html->script('off-canvas.js') ?>
    <?= $this->Html->script('misc.js') ?>
</body>
</html>