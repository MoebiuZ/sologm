<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdventurelistsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdventurelistsTable Test Case
 */
class AdventurelistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdventurelistsTable
     */
    protected $Adventurelists;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Adventurelists',
        'app.Campaigns',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Adventurelists') ? [] : ['className' => AdventurelistsTable::class];
        $this->Adventurelists = $this->getTableLocator()->get('Adventurelists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Adventurelists);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdventurelistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdventurelistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
