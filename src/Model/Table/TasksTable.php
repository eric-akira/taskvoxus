<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;
	use Cake\Validation\Validator;

	class TasksTable extends Table {

		public function initialize (array $config) {
			$this->addBehavior('Timestamp', [
				'events' => [
					'Model.beforeSave' => [
						'created' => 'new',
						'modified' => 'always'
					]
				]
			]);
		}

		public function validationDefault(Validator $validator) {
			$validator
				->notEmpty('title')
				->notEmpty('description')
				->notEmpty('priority');

			return $validator;
		}
	}
?>