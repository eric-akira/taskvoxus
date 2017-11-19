<li class="heading"><?= $this->Html->link($currentUsername, ['controller' => 'Users', 'action' => 'view', $currentId], ['style' => 'padding: 0;']) ?></li>
<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
<li class="heading"><?= __('User Actions') ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<li class="heading"><?= __('Task Actions') ?></li>
<li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
<li class="heading"><?= __('Categories') ?></li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>