<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

class CampaignsSidebarBlockCell extends Cell
{
   
    #protected $_validCellOptions = [];    
    public function initialize(): void
    {
        
    }

    public function display($user_id, $currentScene)
    {
        #$this->loadModel('Campaigns');
        
        $campaigns = $this->fetchtable("Campaigns")->find('all')->where(['user_id' => $user_id]);
        
        $this->set(compact('campaigns', 'currentScene'));
    }
}

?>