<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\CampaignsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CampaignsController Test Case
 *
 * @uses \App\Controller\CampaignsController
 */
class CampaignsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Campaigns',
        'app.Users',
        'app.Scenes',
    ];

 
    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\CampaignsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\CampaignsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\CampaignsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
