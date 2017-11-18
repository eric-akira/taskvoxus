<?php
	namespace App\Controller;

	use App\Controller\AppController;

	class TasksController extends AppController {
		
		public function initialize() {
			parent::initialize();

			$this->loadComponent('Flash');
		}

		public function index() {
			$tasks = $this->Tasks->find('all');

			foreach ($tasks as $task) {
				$task['created'] = $this->formatDatesToDisplay($task['created']);
				$task['modified'] = $this->formatDatesToDisplay($task['modified']);
			}

			$this->set(compact('tasks'));
		}

		public function view($id = null) {
			$task = $this->Tasks->get($id);

			$task['created'] = $this->formatDatesToDisplay($task['created']);
			$task['modified'] = $this->formatDatesToDisplay($task['modified']);

			$this->set(compact('task'));
		}

		public function add() {
			$task = $this->Tasks->newEntity();

			if ($this->request->is('post')) {
				$task = $this->Tasks->patchEntity($task, $this->request->getData());

				if ($this->Tasks->save($task)) {
					$this->Flash->success(__('Tarefa criada!'));
					return $this->redirect(['action' => 'index']);
				}

				$this->Flash->error(__('Erro na criação da tarefa. =('));
			}

			$this->set('task', $task);
		}

		public function edit($id = null) {
			$task = $this->Tasks->get($id);

			if($this->request->is(['post', 'put'])) {
				$this->Tasks->patchEntity($task, $this->request->getData());

				if ($this->Tasks->save($task)) {
					$this->Flash->success(__('Tarefa atualizada!'));
					return $this->redirect(['action' => 'index']);
				}

				$this->Flash->error(__('Houve um erro na criação da tarefa. =('));
			}

			$this->set('task', $task);
		}

		public function delete($id) {
			$this->request->allowMethod(['post', 'delete']);

			$task = $this->Tasks->get($id);
			if ($this->Tasks->delete($task)) {
				$this->Flash->success(__('A tarefa {0} foi deletada', h($task['title'])));
				return $this->redirect(['action' => 'index']);
			}
		}

		//funcao para formatar horarios das tasks antes de exibicao
		private function formatDatesToDisplay($dateToDisplay) {
			
			if ($dateToDisplay == null) {
				$dateToDisplay = '--';
			} else {
				$dateToDisplay = $dateToDisplay->format('H:i:s d-m-Y');
			}

			return $dateToDisplay;
		}
		
	}
?>