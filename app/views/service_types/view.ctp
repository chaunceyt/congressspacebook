<div class="serviceTypes view">
<h2><?php  __('ServiceType');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Token'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['token']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Intro'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['intro']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceType['ServiceType']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ServiceType', true), array('action'=>'edit', $serviceType['ServiceType']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ServiceType', true), array('action'=>'delete', $serviceType['ServiceType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $serviceType['ServiceType']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ServiceTypes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ServiceType', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
