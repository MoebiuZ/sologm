<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'enabled' => 1,
                'created' => 1698607155,
                'modified' => 1698607155,
                'last_login' => 1698607155,
                'pref_theme' => 'Lorem ipsum dolor sit amet',
                'pref_language' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
