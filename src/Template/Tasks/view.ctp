<h1><?= h($task->title) ?> - ID: <?= h($task->Id) ?></h1>
<p>Descrição: <?= h($task->description) ?></p>
<p>Prioridade: <?= $task->priority ?></p>
<p>Status: <?= $task->status ?></p>
<p>Criada por: <small><?= $task->created_by ?></small></p>
<p>Completa por: <small><?= $task->done_by ?></small></p>
<p>Criada em: <small><?= $task->created ?></small></p>
<p>Modificada em: <small><?= $task->modified ?></small></p>
<p><?= $this->Html->link('Voltar para Lista de Tarefas', ['action' => 'index']) ?></p>