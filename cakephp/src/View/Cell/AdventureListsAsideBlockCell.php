<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

class AdventureListsAsideBlockCell extends Cell
{
   
    #protected $_validCellOptions = [];    
    public function initialize(): void
    {
        
    }

    public function display($campaign_id)
    {
        $threads = $this->fetchtable("Listitems")->find('all')->where(['campaign_id' => $campaign_id, 'list_type' => 'threads']);
        $characters = $this->fetchtable("Listitems")->find('all')->where(['campaign_id' => $campaign_id, 'list_type' => 'characters']);

        $this->set(compact('threads', 'characters', 'campaign_id'));
    }
}

?>