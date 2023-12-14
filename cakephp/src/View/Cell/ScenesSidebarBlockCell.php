<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

class ScenesSidebarBlockCell extends Cell
{
   
    #protected $_validCellOptions = [];    
    public function initialize(): void
    {
        
    }

    public function display($campaign_id)
    {
        $scenes = $this->fetchtable("Scenes")->find('all')->where(['campaign_id' => $campaign_id]); #->where(['is_published' => true])->order(['lft' => 'ASC']);
        $this->set(compact('scenes'));
    }
}

?>