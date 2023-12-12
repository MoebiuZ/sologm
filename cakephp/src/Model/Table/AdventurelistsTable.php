<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adventurelists Model
 *
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\BelongsTo $Campaigns
 *
 * @method \App\Model\Entity\Adventurelist newEmptyEntity()
 * @method \App\Model\Entity\Adventurelist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Adventurelist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adventurelist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Adventurelist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Adventurelist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Adventurelist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adventurelist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Adventurelist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Adventurelist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adventurelist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adventurelist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adventurelist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adventurelist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adventurelist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Adventurelist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Adventurelist> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdventurelistsTable extends Table
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

        $this->setTable('adventurelists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn('campaign_id', 'Campaigns'), ['errorField' => 'campaign_id']);

        return $rules;
    }
}
