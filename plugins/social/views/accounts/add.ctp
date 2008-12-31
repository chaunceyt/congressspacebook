<div id="content">
    <div class="post">

        <div class="entry">
<form id="AccountAddForm" method="post" action="<?php echo $this->here ?>">
        <p><h3>Select service and enter account username</h3></p>
        <input type="hidden" name="data[Account][identity_id]" value="<?php echo $userId; ?>" />
        <span><?php echo $form->input('Account.service_id', array('label' => false, 'div' => false)); ?></span>
        <span><?php echo $form->input('Account.username', array('error' => 'Could not detect a service or a feed', 'label' => false, 'div' => false, 'size' => 54)); ?></span>
        <p><input class="submitbutton" type="submit" value="Add Account"/></p>
<?php echo $form->end(); ?>
        </div>
    </div>
</div>
