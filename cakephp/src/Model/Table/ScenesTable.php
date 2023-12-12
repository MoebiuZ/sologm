<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scenes Model
 *
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\BelongsTo $Campaigns
 * @property \App\Model\Table\BlocksTable&\Cake\ORM\Association\HasMany $Blocks
 *
 * @method \App\Model\Entity\Scene newEmptyEntity()
 * @method \App\Model\Entity\Scene newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Scene> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scene get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Scene findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Scene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Scene> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scene|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Scene saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Scene>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scene>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scene>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scene> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scene>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scene>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scene>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scene> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScenesTable extends Table
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

        $this->setTable('scenes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Blocks', [
            'foreignKey' => 'scene_id',
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
            ->numeric('pos')
            ->requirePresence('pos', 'create')
            ->notEmptyString('pos')
            ->add('pos', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('chaos', 'create')
            ->notEmptyString('chaos');

        $validator
            ->nonNegativeInteger('campaign_id')
            ->notEmptyString('campaign_id');

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
        $rules->add($rules->isUnique(['pos']), ['errorField' => 'pos']);
        $rules->add($rules->existsIn('campaign_id', 'Campaigns'), ['errorField' => 'campaign_id']);

        return $rules;
    }
}
