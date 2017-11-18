<h1>Criar Nova Tarefa</h1>
<?php
	echo $this->Form->create($task);
	echo $this->Form->input('title');
	echo $this->Form->input('description', ['rows' => '5']);
	echo $this->Form->radio('priority', [
		['value' => '1', 'text' => '1'],
		['value' => '2', 'text' => '2'],
		['value' => '3', 'text' => '3'],
		['value' => '4', 'text' => '4'],
		['value' => '5', 'text' => '5']
	]);
	echo $this->Form->button(__('Criar Tarefa'));
	echo $this->Form->end();
?>