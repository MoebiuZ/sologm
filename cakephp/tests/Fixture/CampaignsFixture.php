<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CampaignsFixture
 */
class CampaignsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'current_chaos' => 1,
                'created' => 1702383132,
                'modified' => 1702383132,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
