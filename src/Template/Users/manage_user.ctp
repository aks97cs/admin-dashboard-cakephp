<h3>Manage User Role</h3>
<?php

// pr($res);
// die();
//$abc[];
$i=0;
foreach ($res as $row) {
	# code...
	$abc[$row['username']]=$row['username'];
	//$i++;
}
foreach ($rll as $value) {
	# code...
		$xyz[$value['roles']]=$value['roles'];

}
 ?>
<?= $this->Form->create('/new/admin/project1/manage_user/') ?>
<?= $this->Form->control('username',['options'=>$abc]) ?>
<?= $this->Form->control('roles',['options'=>$xyz]) ?>
<br>
<?= $this->Form->button('submit') ?>
<?= $this->Form->end() ?>