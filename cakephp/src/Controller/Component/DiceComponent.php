<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class DiceComponent extends Component
{
    public function roll($qty, $facets)
    {
        $roll = 0;
        foreach(range(1, $qty) as $n) 
        {
            $roll += random_int(0, $facets);
        }
        return $roll;
    }
}

?>