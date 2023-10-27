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
                'role' => 'Lorem ipsum dolor ',
                'name' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'enabled' => 1,
                'created_date' => '2023-10-27 11:53:21',
                'modified_date' => '2023-10-27 11:53:21',
                'last_login' => '2023-10-27 11:53:21',
                'pref_theme' => 'Lorem ipsum dolor sit amet',
                'pref_language' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
