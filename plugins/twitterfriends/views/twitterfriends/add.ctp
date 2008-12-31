<div id="content">
    <div class="post">

        <div class="entry">
        <h2>Do you have most friends on Twitter!!!...</h2>

        <form id="TwitterfriendAddForm" method="post" action="<?php echo $this->here ?>">
        enter your twitter username: <input type="hidden" name="data[Twitter][key]" value="<?php //echo $userId; ?>" />
        <span><?php echo $form->input('Twitter.username', array('label' => false, 'div' => false, 'size' => 54)); ?></span>
        <p><input class="submitbutton" type="submit" value="and Prove it.."/></p>
        <?php echo $form->end(); ?>

        </div>
    </div>
</div>
