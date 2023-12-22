<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Campaign;
use Authorization\IdentityInterface;

/**
 * Campaign policy
 */
class CampaignPolicy
{
    /**
     * Check if $user can add Campaign
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Campaign $campaign
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Campaign $campaign)
    {
        return true;
    }

    /**
     * Check if $user can edit Campaign
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Campaign $campaign
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Campaign $campaign)
    {
        return $this->isOwner($user, $campaign);
    }

    /**
     * Check if $user can delete campaign
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Campaign $campaign
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Campaign $campaign)
    {
        return $this->isOwner($user, $campaign);
    }

  
    protected function isOwner(IdentityInterface $user, Campaign $campaign)
    {
        return $campaign->user_id === $user->getIdentifier();
    }
}
