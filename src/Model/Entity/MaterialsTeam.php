<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaterialsTeam Entity
 *
 * @property int $team_id
 * @property int $material_id
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Material $material
 */
class MaterialsTeam extends Entity
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
        '*' => true,
        'team_id' => false,
        'material_id' => false
    ];
}
