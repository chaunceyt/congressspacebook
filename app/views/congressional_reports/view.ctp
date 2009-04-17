<div class="congressionalReports view">
<h2><?php  __('CongressionalReport');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressionalReport['CongressionalReport']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressionalReport['CongressionalReport']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Filename'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressionalReport['CongressionalReport']['filename']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressionalReport['CongressionalReport']['location']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressionalReport['CongressionalReport']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit CongressionalReport', true), array('action'=>'edit', $congressionalReport['CongressionalReport']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete CongressionalReport', true), array('action'=>'delete', $congressionalReport['CongressionalReport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $congressionalReport['CongressionalReport']['id'])); ?> </li>
		<li><?php echo $html->link(__('List CongressionalReports', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New CongressionalReport', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
