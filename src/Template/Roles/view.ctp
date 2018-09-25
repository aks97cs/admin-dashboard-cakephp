<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="roles view large-9 medium-8 columns content">
   <br>
   <br>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Roles') ?></th>
            <td><?= h($role->roles) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($role->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($role->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
    </table>
</div>
