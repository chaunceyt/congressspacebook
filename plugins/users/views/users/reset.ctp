<div id="content">
    <div class="post">

        <div class="entry">
<?php
    echo $form->create('User', array('action' => 'reset'));
    echo $form->inputs(array('email','legend' => 'Reset Password'));
    echo $form->end('Submit');
?>

      </div><!-- end entry -->
    </div>

</div>

