<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Block;
use Authorization\IdentityInterface;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Block policy
 */
class BlockPolicy
{

    use LocatorAwareTrait;
    /**
     * Check if $user can add Block
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Block $block
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Block $block)
    {
        return true;
    }

    /**
     * Check if $user can edit Block
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Block $block
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Block $block)
    {
        return $this->isOwner($user, $block);
    }

    /**
     * Check if $user can delete Block
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Block $block
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Block $block)
    {
        return $this->isOwner($user, $block);
    }

   
    protected function isOwner(IdentityInterface $user, Block $block)
    {
        $scene_campaign_id = $this->fetchtable("Scenes")->find('all')->where(['id' => $block->scene_id])->toArray()[0]['campaign_id'];
        $campaign_user_id = $this->fetchtable("Campaigns")->find('all')->where(['id' => $scene_campaign_id])->toArray()[0]['user_id'];
        return $campaign_user_id === $user->id;
    }
}
