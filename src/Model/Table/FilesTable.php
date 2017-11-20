<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Josegonzalez\CakeQueuesadilla\Queue\Queue;
use Aws\S3\S3Client;
use Cake\ORM\TableRegistry;


/**
 * Files Model
 *
 * @method \App\Model\Entity\File get($primaryKey, $options = [])
 * @method \App\Model\Entity\File newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\File[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\File|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\File patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\File[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\File findOrCreate($search, callable $callback = null, $options = [])
 */
class FilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'location' => [
                        'path' => 'upload/location/:y/:m/:md5',
                        'prefix' => '../'
                    ]
                ]
            ]
        );
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('file_name')
            ->requirePresence('file_name', 'create')
            ->notEmpty('file_name');

        $validator
            ->allowEmpty('ext_location', 'create');

        /*$validator
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->integer('file_of')
            ->requirePresence('file_of', 'create')
            ->notEmpty('file_of');*/

        return $validator;
    }

    public function uploadAWS($job) {

        $filelocationp1 = 'C:\xampp\htdocs\taskvoxus\webroot';
        $filelocationp2 = substr($job->data('location'), 2);
        $filelocationp2 = str_replace('/', "\\", $filelocationp2);
        $filelocationp1 .= $filelocationp2;

        $filekey = substr($job->data('location'), -4);
        $filekey = $job->data('id') . $filekey;

        $clientS3 = S3Client::factory(array(
            'credentials' => array(
                'key'    => 'AKIAI3JOBW534QFI4SCA',
                'secret' => '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'
            ),
            'region' => 'us-west-2'
        ));
        
        $response = $clientS3->putObject(array(
            'Bucket' => "taskvoxus",
            'Key'    => $filekey,
            'SourceFile' => $filelocationp1,
            'ACL' => 'public-read'
        ));

        $data = ['status' => 'processed', 'ext_location' => $response['ObjectURL']];

        $files = TableRegistry::get('Files');
        $file = $files->get($job->data('id'));
        $file = $files->patchEntity($file, $data);
        
        if ($files->save($file)) {
            unlink($filelocationp1);
        }
    }

    public function afterSave($event, $entity, $options) {
        if($entity->isNew()) {
            Queue::push(['\App\Model\Table\FilesTable','uploadAWS'], [
                'id' => $entity['id'],
                'file_name' => $entity['file_name'],
                'location' => $entity['location'],
                'file_of' => $entity['file_of'],
            ]);
        }
    }
}