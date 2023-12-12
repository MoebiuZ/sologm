<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdventurelistsFixture
 */
class AdventurelistsFixture extends TestFixture
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
                'created' => 1702382957,
                'modified' => 1702382957,
                'campaign_id' => 1,
            ],
        ];
        parent::init();
    }
}
