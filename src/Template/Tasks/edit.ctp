<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            //echo $this->Form->control('priority');
            echo $this->Form->radio('priority', [
                ['value' => '1', 'text' => '1'],
                ['value' => '2', 'text' => '2'],
                ['value' => '3', 'text' => '3'],
                ['value' => '4', 'text' => '4'],
                ['value' => '5', 'text' => '5']
            ]);
            //echo $this->Form->control('status');
            echo $this->Form->control('category_id', ['options' => $categories]);
            //echo $this->Form->control('created_by');
            //echo $this->Form->control('done_by');
            //echo $this->Form->control('task_file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
