<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="main-panel" style="width:100%;">
        <div class="content-wrapper" >
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-md-12">
                  <div class="card">
                    
                  </div>
                </div>
                
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>

    <?= $this->Form->create('/new/admin/project1/users/add',['type'=>'file','class'=>'forms-sample']) ?>
    <div class="form-group">

        <?= $this->Form->control('username',['class'=>'form-control']) ?>
      </div>
      <div class="form-group">
         <?= $this->Form->control('email',['class'=>'form-control']) ?>
       </div>
       <div class="form-group">
        <?= $this->Form->control('password',['class'=>'form-control']) ?>
      </div>
      <div class="form-group">         
      <?= $this->Form->control('image_name',['type'=>'file','class'=>'file-upload-browse btn btn-info']) ?>    
      </div>
      <div class="form-group">
          <?= $this->Form->control('city',['class'=>'form-control']) ?>
        </div>
          <?= $this->Form->control('description',['class'=>'form-control']) ?>
          <?= $this->Form->control('roles',['class'=>'form-control']) ?>
    </fieldset>
    <?= $this->Form->button('Submit',['class'=>'btn btn-success mr-2']) ?>
    <?= $this->Form->end() ?>


             </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
