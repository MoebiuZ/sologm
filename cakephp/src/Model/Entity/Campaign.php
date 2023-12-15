<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity
 *
 * @property int $id
 * @property string $name
 * @property int $current_chaos
 * @property string|null $adventurelist_char_1_1
 * @property string|null $adventurelist_char_1_3
 * @property string|null $adventurelist_char_1_5
 * @property string|null $adventurelist_char_1_7
 * @property string|null $adventurelist_char_1_9
 * @property string|null $adventurelist_char_3_1
 * @property string|null $adventurelist_char_3_3
 * @property string|null $adventurelist_char_3_5
 * @property string|null $adventurelist_char_3_7
 * @property string|null $adventurelist_char_3_9
 * @property string|null $adventurelist_char_5_1
 * @property string|null $adventurelist_char_5_3
 * @property string|null $adventurelist_char_5_5
 * @property string|null $adventurelist_char_5_7
 * @property string|null $adventurelist_char_5_9
 * @property string|null $adventurelist_char_7_1
 * @property string|null $adventurelist_char_7_3
 * @property string|null $adventurelist_char_7_5
 * @property string|null $adventurelist_char_7_7
 * @property string|null $adventurelist_char_7_9
 * @property string|null $adventurelist_char_9_1
 * @property string|null $adventurelist_char_9_3
 * @property string|null $adventurelist_char_9_5
 * @property string|null $adventurelist_char_9_7
 * @property string|null $adventurelist_char_9_9
 * @property string|null $adventurelist_thread_1_1
 * @property string|null $adventurelist_thread_1_3
 * @property string|null $adventurelist_thread_1_5
 * @property string|null $adventurelist_thread_1_7
 * @property string|null $adventurelist_thread_1_9
 * @property string|null $adventurelist_thread_3_1
 * @property string|null $adventurelist_thread_3_3
 * @property string|null $adventurelist_thread_3_5
 * @property string|null $adventurelist_thread_3_7
 * @property string|null $adventurelist_thread_3_9
 * @property string|null $adventurelist_thread_5_1
 * @property string|null $adventurelist_thread_5_3
 * @property string|null $adventurelist_thread_5_5
 * @property string|null $adventurelist_thread_5_7
 * @property string|null $adventurelist_thread_5_9
 * @property string|null $adventurelist_thread_7_1
 * @property string|null $adventurelist_thread_7_3
 * @property string|null $adventurelist_thread_7_5
 * @property string|null $adventurelist_thread_7_7
 * @property string|null $adventurelist_thread_7_9
 * @property string|null $adventurelist_thread_9_1
 * @property string|null $adventurelist_thread_9_3
 * @property string|null $adventurelist_thread_9_5
 * @property string|null $adventurelist_thread_9_7
 * @property string|null $adventurelist_thread_9_9
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Adventurelist[] $adventurelists
 * @property \App\Model\Entity\Scene[] $scenes
 */
class Campaign extends Entity
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
        'current_chaos' => true,
        'adventurelist_char_1_1' => true,
        'adventurelist_char_1_3' => true,
        'adventurelist_char_1_5' => true,
        'adventurelist_char_1_7' => true,
        'adventurelist_char_1_9' => true,
        'adventurelist_char_3_1' => true,
        'adventurelist_char_3_3' => true,
        'adventurelist_char_3_5' => true,
        'adventurelist_char_3_7' => true,
        'adventurelist_char_3_9' => true,
        'adventurelist_char_5_1' => true,
        'adventurelist_char_5_3' => true,
        'adventurelist_char_5_5' => true,
        'adventurelist_char_5_7' => true,
        'adventurelist_char_5_9' => true,
        'adventurelist_char_7_1' => true,
        'adventurelist_char_7_3' => true,
        'adventurelist_char_7_5' => true,
        'adventurelist_char_7_7' => true,
        'adventurelist_char_7_9' => true,
        'adventurelist_char_9_1' => true,
        'adventurelist_char_9_3' => true,
        'adventurelist_char_9_5' => true,
        'adventurelist_char_9_7' => true,
        'adventurelist_char_9_9' => true,
        'adventurelist_thread_1_1' => true,
        'adventurelist_thread_1_3' => true,
        'adventurelist_thread_1_5' => true,
        'adventurelist_thread_1_7' => true,
        'adventurelist_thread_1_9' => true,
        'adventurelist_thread_3_1' => true,
        'adventurelist_thread_3_3' => true,
        'adventurelist_thread_3_5' => true,
        'adventurelist_thread_3_7' => true,
        'adventurelist_thread_3_9' => true,
        'adventurelist_thread_5_1' => true,
        'adventurelist_thread_5_3' => true,
        'adventurelist_thread_5_5' => true,
        'adventurelist_thread_5_7' => true,
        'adventurelist_thread_5_9' => true,
        'adventurelist_thread_7_1' => true,
        'adventurelist_thread_7_3' => true,
        'adventurelist_thread_7_5' => true,
        'adventurelist_thread_7_7' => true,
        'adventurelist_thread_7_9' => true,
        'adventurelist_thread_9_1' => true,
        'adventurelist_thread_9_3' => true,
        'adventurelist_thread_9_5' => true,
        'adventurelist_thread_9_7' => true,
        'adventurelist_thread_9_9' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true,
        'adventurelists' => true,
        'scenes' => true,
    ];
}
