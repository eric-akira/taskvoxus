<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= $this->Html->link($currentUsername, ['controller' => 'Users', 'action' => 'view', $currentId], ['style' => 'padding: 0;']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <li class="heading"><?= __('User Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li class="heading"><?= __('Task Actions') ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
        <li class="heading"><?= __('Categories') ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($task->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($task->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $task->has('category') ? $this->Html->link($task->category->name, ['controller' => 'Categories', 'action' => 'view', $task->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $this->Number->format($task->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Html->link($task->created_by, ['controller' => 'Users', 'action' => 'view', $task->created_by_id]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Done By') ?></th>
            <?php if ($task->done_by !== 0): ?>
                <td><?= $this->Html->link($task->done_by, ['controller' => 'Users', 'action' => 'view', $task->done_by_id]) ?></td>
            <?php else: ?>
                <td>Not done yet.</td>
            <?php endif; ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Task File') ?></th>
            <td><?= $this->Number->format($task->task_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($task->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($task->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($task->description)); ?>
    </div>

    <?php if ($task->status !== 'done'): ?>
        <?= $this->Form->postLink(__('Mark Task as Done'), ['action' => 'markDone', $task->id], ['confirm' => __('Did you really finished {0}?', $task->title)]) ?>
        <br>
    <?php endif; ?>
    <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?>
    <br>
    <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete {0}?', $task->title)]) ?>

</div>
