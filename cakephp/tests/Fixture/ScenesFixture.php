<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ScenesFixture
 */
class ScenesFixture extends TestFixture
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
                'pos' => 1,
                'chaos' => 1,
                'created' => 1702382737,
                'modified' => 1702382737,
                'campaign_id' => 1,
            ],
        ];
        parent::init();
    }
}
