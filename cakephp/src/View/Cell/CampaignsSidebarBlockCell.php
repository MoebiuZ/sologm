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

    public function display($user_id)
    {
        #$this->loadModel('Campaigns');
        
        $campaigns = $this->fetchtable("Campaigns")->find('all')->where(['user_id' => $user_id]); #->where(['is_published' => true])->order(['lft' => 'ASC']);
        $this->set(compact('campaigns'));
    }
}

?>