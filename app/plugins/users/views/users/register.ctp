<div id="content">
    <div class="post">

        <div class="entry">
<div class="user">
<?php echo $form->create('User', array('plugin' => 'users', 'controller' => 'users', 'action' => 'register'));?>
<fieldset>
<legend><?php __('Register');?></legend>
<?php
        echo $form->input('username');
        echo $form->input('email');
    ?>
</fieldset>
<?php echo $form->end(__('Register',true));?>
</div>
        </div>
    </div>
</div>
