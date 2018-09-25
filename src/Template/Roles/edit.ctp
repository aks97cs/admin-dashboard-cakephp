<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Edit Role') ?></legend>
        <?php
            echo $this->Form->control('roles');
            //echo $this->Form->control('controller');
            echo $this->Form->control('controller', ['options' => $xyz]);
           //echo $this->Form->control('controller',['type'=>'select','options'=>$xyz,'value' => $xyz]);
            //echo $this->Form->control('action');

            echo $this->Form->control('action', ['options' => $www]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <?php
    // pr($xyz);
    // die();
$i=0;
//pr($www);
//die();
        foreach($www as $row)
        {
            echo $row."<br>";
            $i++;
        }

     ?>
</div>
