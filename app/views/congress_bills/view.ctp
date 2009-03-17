<div class="congressBills view">
<h2><?php  __('CongressBill');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Num'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_num']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Official Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_official_title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Last Action'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_last_action']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bill Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['bill_status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ts'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $congressBill['CongressBill']['ts']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit CongressBill', true), array('action'=>'edit', $congressBill['CongressBill']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete CongressBill', true), array('action'=>'delete', $congressBill['CongressBill']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $congressBill['CongressBill']['id'])); ?> </li>
		<li><?php echo $html->link(__('List CongressBills', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New CongressBill', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
