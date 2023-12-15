<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campaigns Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ScenesTable&\Cake\ORM\Association\HasMany $Scenes
 *
 * @method \App\Model\Entity\Campaign newEmptyEntity()
 * @method \App\Model\Entity\Campaign newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Campaign> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campaign get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Campaign findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Campaign patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Campaign> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Campaign saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CampaignsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('campaigns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Scenes', [
            'foreignKey' => 'campaign_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->notEmptyString('current_chaos');

        $validator
            ->scalar('adventurelist_char_1_1')
            ->maxLength('adventurelist_char_1_1', 255)
            ->allowEmptyString('adventurelist_char_1_1');

        $validator
            ->scalar('adventurelist_char_1_3')
            ->maxLength('adventurelist_char_1_3', 255)
            ->allowEmptyString('adventurelist_char_1_3');

        $validator
            ->scalar('adventurelist_char_1_5')
            ->maxLength('adventurelist_char_1_5', 255)
            ->allowEmptyString('adventurelist_char_1_5');

        $validator
            ->scalar('adventurelist_char_1_7')
            ->maxLength('adventurelist_char_1_7', 255)
            ->allowEmptyString('adventurelist_char_1_7');

        $validator
            ->scalar('adventurelist_char_1_9')
            ->maxLength('adventurelist_char_1_9', 255)
            ->allowEmptyString('adventurelist_char_1_9');

        $validator
            ->scalar('adventurelist_char_3_1')
            ->maxLength('adventurelist_char_3_1', 255)
            ->allowEmptyString('adventurelist_char_3_1');

        $validator
            ->scalar('adventurelist_char_3_3')
            ->maxLength('adventurelist_char_3_3', 255)
            ->allowEmptyString('adventurelist_char_3_3');

        $validator
            ->scalar('adventurelist_char_3_5')
            ->maxLength('adventurelist_char_3_5', 255)
            ->allowEmptyString('adventurelist_char_3_5');

        $validator
            ->scalar('adventurelist_char_3_7')
            ->maxLength('adventurelist_char_3_7', 255)
            ->allowEmptyString('adventurelist_char_3_7');

        $validator
            ->scalar('adventurelist_char_3_9')
            ->maxLength('adventurelist_char_3_9', 255)
            ->allowEmptyString('adventurelist_char_3_9');

        $validator
            ->scalar('adventurelist_char_5_1')
            ->maxLength('adventurelist_char_5_1', 255)
            ->allowEmptyString('adventurelist_char_5_1');

        $validator
            ->scalar('adventurelist_char_5_3')
            ->maxLength('adventurelist_char_5_3', 255)
            ->allowEmptyString('adventurelist_char_5_3');

        $validator
            ->scalar('adventurelist_char_5_5')
            ->maxLength('adventurelist_char_5_5', 255)
            ->allowEmptyString('adventurelist_char_5_5');

        $validator
            ->scalar('adventurelist_char_5_7')
            ->maxLength('adventurelist_char_5_7', 255)
            ->allowEmptyString('adventurelist_char_5_7');

        $validator
            ->scalar('adventurelist_char_5_9')
            ->maxLength('adventurelist_char_5_9', 255)
            ->allowEmptyString('adventurelist_char_5_9');

        $validator
            ->scalar('adventurelist_char_7_1')
            ->maxLength('adventurelist_char_7_1', 255)
            ->allowEmptyString('adventurelist_char_7_1');

        $validator
            ->scalar('adventurelist_char_7_3')
            ->maxLength('adventurelist_char_7_3', 255)
            ->allowEmptyString('adventurelist_char_7_3');

        $validator
            ->scalar('adventurelist_char_7_5')
            ->maxLength('adventurelist_char_7_5', 255)
            ->allowEmptyString('adventurelist_char_7_5');

        $validator
            ->scalar('adventurelist_char_7_7')
            ->maxLength('adventurelist_char_7_7', 255)
            ->allowEmptyString('adventurelist_char_7_7');

        $validator
            ->scalar('adventurelist_char_7_9')
            ->maxLength('adventurelist_char_7_9', 255)
            ->allowEmptyString('adventurelist_char_7_9');

        $validator
            ->scalar('adventurelist_char_9_1')
            ->maxLength('adventurelist_char_9_1', 255)
            ->allowEmptyString('adventurelist_char_9_1');

        $validator
            ->scalar('adventurelist_char_9_3')
            ->maxLength('adventurelist_char_9_3', 255)
            ->allowEmptyString('adventurelist_char_9_3');

        $validator
            ->scalar('adventurelist_char_9_5')
            ->maxLength('adventurelist_char_9_5', 255)
            ->allowEmptyString('adventurelist_char_9_5');

        $validator
            ->scalar('adventurelist_char_9_7')
            ->maxLength('adventurelist_char_9_7', 255)
            ->allowEmptyString('adventurelist_char_9_7');

        $validator
            ->scalar('adventurelist_char_9_9')
            ->maxLength('adventurelist_char_9_9', 255)
            ->allowEmptyString('adventurelist_char_9_9');

        $validator
            ->scalar('adventurelist_thread_1_1')
            ->maxLength('adventurelist_thread_1_1', 255)
            ->allowEmptyString('adventurelist_thread_1_1');

        $validator
            ->scalar('adventurelist_thread_1_3')
            ->maxLength('adventurelist_thread_1_3', 255)
            ->allowEmptyString('adventurelist_thread_1_3');

        $validator
            ->scalar('adventurelist_thread_1_5')
            ->maxLength('adventurelist_thread_1_5', 255)
            ->allowEmptyString('adventurelist_thread_1_5');

        $validator
            ->scalar('adventurelist_thread_1_7')
            ->maxLength('adventurelist_thread_1_7', 255)
            ->allowEmptyString('adventurelist_thread_1_7');

        $validator
            ->scalar('adventurelist_thread_1_9')
            ->maxLength('adventurelist_thread_1_9', 255)
            ->allowEmptyString('adventurelist_thread_1_9');

        $validator
            ->scalar('adventurelist_thread_3_1')
            ->maxLength('adventurelist_thread_3_1', 255)
            ->allowEmptyString('adventurelist_thread_3_1');

        $validator
            ->scalar('adventurelist_thread_3_3')
            ->maxLength('adventurelist_thread_3_3', 255)
            ->allowEmptyString('adventurelist_thread_3_3');

        $validator
            ->scalar('adventurelist_thread_3_5')
            ->maxLength('adventurelist_thread_3_5', 255)
            ->allowEmptyString('adventurelist_thread_3_5');

        $validator
            ->scalar('adventurelist_thread_3_7')
            ->maxLength('adventurelist_thread_3_7', 255)
            ->allowEmptyString('adventurelist_thread_3_7');

        $validator
            ->scalar('adventurelist_thread_3_9')
            ->maxLength('adventurelist_thread_3_9', 255)
            ->allowEmptyString('adventurelist_thread_3_9');

        $validator
            ->scalar('adventurelist_thread_5_1')
            ->maxLength('adventurelist_thread_5_1', 255)
            ->allowEmptyString('adventurelist_thread_5_1');

        $validator
            ->scalar('adventurelist_thread_5_3')
            ->maxLength('adventurelist_thread_5_3', 255)
            ->allowEmptyString('adventurelist_thread_5_3');

        $validator
            ->scalar('adventurelist_thread_5_5')
            ->maxLength('adventurelist_thread_5_5', 255)
            ->allowEmptyString('adventurelist_thread_5_5');

        $validator
            ->scalar('adventurelist_thread_5_7')
            ->maxLength('adventurelist_thread_5_7', 255)
            ->allowEmptyString('adventurelist_thread_5_7');

        $validator
            ->scalar('adventurelist_thread_5_9')
            ->maxLength('adventurelist_thread_5_9', 255)
            ->allowEmptyString('adventurelist_thread_5_9');

        $validator
            ->scalar('adventurelist_thread_7_1')
            ->maxLength('adventurelist_thread_7_1', 255)
            ->allowEmptyString('adventurelist_thread_7_1');

        $validator
            ->scalar('adventurelist_thread_7_3')
            ->maxLength('adventurelist_thread_7_3', 255)
            ->allowEmptyString('adventurelist_thread_7_3');

        $validator
            ->scalar('adventurelist_thread_7_5')
            ->maxLength('adventurelist_thread_7_5', 255)
            ->allowEmptyString('adventurelist_thread_7_5');

        $validator
            ->scalar('adventurelist_thread_7_7')
            ->maxLength('adventurelist_thread_7_7', 255)
            ->allowEmptyString('adventurelist_thread_7_7');

        $validator
            ->scalar('adventurelist_thread_7_9')
            ->maxLength('adventurelist_thread_7_9', 255)
            ->allowEmptyString('adventurelist_thread_7_9');

        $validator
            ->scalar('adventurelist_thread_9_1')
            ->maxLength('adventurelist_thread_9_1', 255)
            ->allowEmptyString('adventurelist_thread_9_1');

        $validator
            ->scalar('adventurelist_thread_9_3')
            ->maxLength('adventurelist_thread_9_3', 255)
            ->allowEmptyString('adventurelist_thread_9_3');

        $validator
            ->scalar('adventurelist_thread_9_5')
            ->maxLength('adventurelist_thread_9_5', 255)
            ->allowEmptyString('adventurelist_thread_9_5');

        $validator
            ->scalar('adventurelist_thread_9_7')
            ->maxLength('adventurelist_thread_9_7', 255)
            ->allowEmptyString('adventurelist_thread_9_7');

        $validator
            ->scalar('adventurelist_thread_9_9')
            ->maxLength('adventurelist_thread_9_9', 255)
            ->allowEmptyString('adventurelist_thread_9_9');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
