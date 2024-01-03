<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listitem Entity
 *
 * @property int $id
 * @property string $content
 * @property string $Listitemtype
 * @property float $pos
 * @property bool $hidden
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $scene_id
 *
 * @property \App\Model\Entity\Scene $scene
 */
class Listitem extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'content' => true,
        'list_type' => true,
        'created' => true,
        'modified' => true,
        'campaign_id' => true,
        'campaign' => true,
    ];
}
