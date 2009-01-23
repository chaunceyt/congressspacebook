<div class="AddAccount"  style="padding-left:90px; width="100%"">
<form id="AccountAddForm" method="post" action="<?php echo $this->here ?>">
        <p><legend>Help me manage my social networking accounts</legend></p>
        <p><label>Service</label>
        <?php echo $form->hidden( 'Account.lawmaker_id', array( 'value' => $member_id ) ); ?>
        <span><?php echo $form->input('Account.service_id', array('label' => false,'empty' => '(select service)' )); ?></span></p>
        <p><span><?php  echo $form->input('Account.service_type_id', array('label' => 'Service Type:<br/>','empty' => '(select type)')); ?></span></p>
        <p>
        <?php echo $form->input('Account.username', array('error' => 'Could not detect a service or a feed', 'label' => 'Account id / Username<br/>', 'size' => 50)); ?>
         <?php
            echo $form->input('account_url');
            echo $form->input('feed_url');
         ?>

        </p>
        <p><input class="submitbutton" type="submit" value="Save Social Account"/></p>
<?php echo $form->end(); ?>
</div>
