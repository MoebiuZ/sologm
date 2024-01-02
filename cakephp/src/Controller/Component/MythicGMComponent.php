<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class MythicGMComponent extends Component
{
/*
    private $meaning_table_action1 = [
        __('Abandon'),
        __('Accompany'),
        __('Activate'),
        __('Agree'),
        __('Ambush'),
        __('Arrive'),
        __('Assist'),
        __('Attack'),
        __('Attain'),
        __('Bargain'),
        __('Befriend'),
        __('Bestow'),
        __('Betray'),
        __('Block'),
        __('Break'),
        __('Carry'),
        __('Celebrate'),
        __('Change'),
        __('Close'),
        __('Combine'),
        __('Communicate'),
        __('Conceal'),
        __('Continue'),
        __('Control'),
        __('Create'),
        __('Deceive'),
        __('Decrease'),
        __('Defend'),
        __('Delay'),
        __('Deny'),
        __('Depart'),
        __('Deposit'),
        __('Destroy'),
        __('Dispute'),
        __('Disrupt'),
        __('Distrust'),
        __('Divide'),
        __('Drop'),
        __('Easy'),
        __('Energize'),
        __('Escape'),
        __('Expose'),
        __('Fail'),
        __('Fight'),
        __('Flee'),
        __('Free'),
        __('Guide'),
        __('Harm'),
        __('Heal'),
        __('Hinder'),
        __('Imitate'),
        __('Imprison'),
        __('Increase'),
        __('Indulge'),
        __('Inform'),
        __('Inquire'),
        __('Inspect'),
        __('Invade'),
        __('Leave'),
        __('Lure'),
        __('Misuse'),
        __('Move'),
        __('Neglect'),
        __('Observe'),
        __('Open'),
        __('Oppose'),
        __('Overthrow'),
        __('Praise'),
        __('Proceed'),
        __('Protect'),
        __('Punish'),
        __('Pursue'),
        __('Recruit'),
        __('Refuse'),
        __('Release'),
        __('Relinquish'),
        __('Repair'),
        __('Repulse'),
        __('Return'),
        __('Reward'),
        __('Ruin'),
        __('Separate'),
        __('Start'),
        __('Stop'),
        __('Strange'),
        __('Struggle'),
        __('Succeed'),
        __('Support'),
        __('Suppress'),
        __('Take'),
        __('Threaten'),
        __('Transform'),
        __('Trap'),
        __('Travel'),
        __('Triumph'),
        __('Truce'),
        __('Trust'),
        __('Use'),
        __('Usurp'),
        __('Waste'),
    ];

    private $meaning_table_action2 = [
        __('Advantage'),
        __('Adversity'),
        __('Agreement'),
        __('Animal'),
        __('Attention'),
        __('Balance'),
        __('Battle'),
        __('Benefits'),
        __('Building'),
        __('Burden'),
        __('Bureaucracy'),
        __('Business '),
        __('Chaos'),
        __('Comfort'),
        __('Completion'),
        __('Conflict'),
        __('Cooperation'),
        __('Danger'),
        __('Defense'),
        __('Depletion'),
        __('Disadvantage'),
        __('Distraction'),
        __('Elements'),
        __('Emotion'),
        __('Enemy'),
        __('Energy'),
        __('Environment'),
        __('Expectation'),
        __('Exterior'),
        __('Extravagance'),
        __('Failure'),
        __('Fame'),
        __('Fear'),
        __('Freedom'),
        __('Friend'),
        __('Goal'),
        __('Group'),
        __('Health'),
        __('Hindrance'),
        __('Home'),
        __('Hope'),
        __('Idea'),
        __('Illness'),
        __('Illusion'),
        __('Individual'),
        __('Information'),
        __('Innocent'),
        __('Intellect'),
        __('Interior'),
        __('Investment'),
        __('Leadership'),
        __('Legal'),
        __('Location'),
        __('Military'),
        __('Misfortune'),
        __('Mundane'),
        __('Nature'),
        __('Needs'),
        __('News'),
        __('Normal'),
        __('Object'),
        __('Obscurity'),
        __('Official'),
        __('Opposition'),
        __('Outside'),
        __('Pain'),
        __('Path'),
        __('Peace'),
        __('People'),
        __('Personal'),
        __('Physical'),
        __('Plot'),
        __('Portal'),
        __('Possessions'),
        __('Poverty'),
        __('Power'),
        __('Prison'),
        __('Project'),
        __('Protection'),
        __('Reassurance'),
        __('Representative'),
        __('Riches'),
        __('Safety'),
        __('Strength'),
        __('Success'),
        __('Suffering'),
        __('Surprise'),
        __('Tactic'),
        __('Technology'),
        __('Tension'),
        __('Time'),
        __('Trial'),
        __('Value'),
        __('Vehicle'),
        __('Victory'),
        __('Vulnerability'),
        __('Weapon'),
        __('Weather'),
        __('Work'),
        __('Wound'),
        ];
*/

    public function fateRoll($odds, $chaos): string
    {
        $fate_chart = [
            [[10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98], [18, 90, 99], [19, 95, 100], [20, 99, 101], [20, 99 , 101], [20, 99, 101]],
            [[7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98], [18, 90, 99], [19, 95, 100], [20, 99 , 101], [20, 99, 101]],
            [[5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98], [18, 90, 99], [19, 95, 100], [20, 99 , 101]],
            [[3, 15, 84], [5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98], [18, 90, 99], [19, 95, 100]],
            [[2, 10, 83], [3, 15, 84],[5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98], [18, 90, 99]],
            [[1, 5, 82], [2, 10, 83], [3, 15, 84],[5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96], [17, 85, 98]],
            [[1, 1, 81], [1, 5, 82], [2, 10, 83], [3, 15, 84],[5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94], [15, 75, 96]],
            [[-1, 1, 81], [-1, 1, 81], [1, 5, 82], [2, 10, 83], [3, 15, 84],[5, 25, 86], [7, 35, 88], [10, 50, 91], [13, 65, 94]],
            [[-1, 1, 81], [-1, 1, 81], [-1, 1, 81], [1, 5, 82], [2, 10, 83], [3, 15, 84],[5, 25, 86], [7, 35, 88], [10, 50, 91]]
        ];

        // roll 1d100
        $roll = rand(1, 100);
        
        if ($roll < $fate_chart[$odds][$chaos][0]) {
            if ($fate_chart[$odds][$chaos][0] == -1) {
                return __("Yes");
            } else {
                return __("Exceptional yes");
            }
        } else if ($roll <= $fate_chart[$odds][$chaos][1]) {
            return __("Yes");
        } else if ($roll >= $fate_chart[$odds][$chaos][2]) {
            return __("Exceptional no");
        } else {
            return __("No");
        }

    }


    public function randomEventFocus() 
    {

    }


    public function sceneAdjustment()
    {
        /*

        __(Remove A Character
        2 Add A Character
        3 Reduce/Remove An Activity
        4 Increase An Activity
        5 Remove An Object
        6 Add An Object
        7-10 Make 2 Adjustments
        */

    }
}

?>