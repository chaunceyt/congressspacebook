<div id="content">
    <div class="post">

        <div class="entry">

<?php
    echo $form->create('User', array('url' => '/users/login'));
    echo $form->hidden('redirect', array('value' => $session->read('Auth.redirect')));
?>
    <fieldset>
        <legend><?php __('Login') ?></legend>
<?php
    foreach($loginFields as $label => $field):
        $after = null;
        if ($label == 'password') {
            $after = '<p>' . $html->link(__('Forgot your password?', true), array('admin'=> false, 'action' => 'reset')) .'</p>';
        }
        echo $form->input($field, array('label' => Inflector::humanize($label), 'after' => $after));
    endforeach;
?>
    </fieldset>
<?php
    echo $form->end(__('Login', true));
?>
        </div><!-- end thumbnails -->


      </div><!-- end entry -->
    </div>

</div>
        <!-- end #content -->

