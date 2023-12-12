<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;
class CampaignsBlockCell extends Cell
{
   
    #protected $_validCellOptions = [];    
    public function initialize(): void
    {
        
    }

    public function display()
    {
        #$this->loadModel('Campaigns');
        
        $campaigns = $this->fetchtable("Campaigns")->find('all'); #->where(['is_published' => true])->order(['lft' => 'ASC']);
        $this->set(compact('campaigns'));
    }
}

?>