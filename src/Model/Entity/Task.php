<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $priority
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $category_id
 * @property int $created_by
 * @property int $done_by
 * @property int $task_file
 *
 * @property \App\Model\Entity\Category $category
 */
class Task extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'priority' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'category_id' => true,
        'created_by' => true,
        'done_by' => true,
        'task_file' => true,
        'category' => true
    ];
}
