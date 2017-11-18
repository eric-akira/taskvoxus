<h1>Tarefas!!!</h1>

<?= $this->Html->link('Nova Tarefa', ['action' => 'add']) ?>

<table>
	<tr>
		<th>ID</th>
		<th>Título</th>
		<th>Descrição</th>
		<th>Prioridade</th>
		<th>Status</th>
		<th>Criada por</th>
		<th>Completa por</th>
		<th>Criada em</th>
		<th>Modificada em</th>
		<th>Ver</th>
		<th>Editar</th>
		<th>Deletar</th>
	</tr>

	<?php foreach ($tasks as $task): ?>
	<tr>
		<td><?= $task->Id ?></td>
		<td><?= $task->title ?></td>
		<td><?= $task->description ?></td>
		<td><?= $task->priority ?></td>
		<td><?= $task->status ?></td>
		<td><?= $task->created_by ?></td>
		<td><?= $task->done_by ?></td>
		<td><?= $task->created ?></td>
		<td><?= $task->modified ?></td>
		<td><?= $this->Html->link('Ver Tarefa', ['action' => 'view', $task->Id]) ?></td>
		<td><?= $this->Html->link('Editar Tarefa', ['action' => 'edit', $task->Id]) ?></td>
		<td><?= $this->Form->postLink('Deletar Tarefa', ['action' => 'delete', $task->Id], ['confirm' => 'Tem certeza?!'])?></td>
	</tr>
	<?php endforeach; ?>

</table>