<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listitems Model
 *
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\BelongsTo $Campaigns
 *
 * @method \App\Model\Entity\Listitem newEmptyEntity()
 * @method \App\Model\Entity\Listitem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Listitem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Listitem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Listitem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Listitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Listitem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Listitem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Listitem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Listitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Listitem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Listitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Listitem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Listitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Listitem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Listitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Listitem> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ListitemsTable extends Table
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

        $this->setTable('listitems');
        $this->setDisplayField('id');
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
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->scalar('list_type')
            ->inList('list_type', ['threads','characters'])
            ->requirePresence('list_type', 'create')
            ->notEmptyString('list_type');

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
