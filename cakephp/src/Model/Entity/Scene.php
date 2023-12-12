<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scene Entity
 *
 * @property int $id
 * @property string $name
 * @property float $pos
 * @property int $chaos
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int $campaign_id
 *
 * @property \App\Model\Entity\Campaign $campaign
 * @property \App\Model\Entity\Block[] $blocks
 */
class Scene extends Entity
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
        'name' => true,
        'pos' => true,
        'chaos' => true,
        'created' => true,
        'modified' => true,
        'campaign_id' => true,
        'campaign' => true,
        'blocks' => true,
    ];
}
