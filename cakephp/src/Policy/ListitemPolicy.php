<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Listitem;
use Authorization\IdentityInterface;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Listitem policy
 */
class ListitemPolicy
{

    use LocatorAwareTrait;
    /**
     * Check if $user can add Listitem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Listitem $listitem
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Listitem $listitem)
    {
        return true;
    }

    /**
     * Check if $user can edit Listitem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Listitem $listitem
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Listitem $listitem)
    {
        return $this->isOwner($user, $listitem);
    }

    /**
     * Check if $user can delete Listitem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Listitem $listitem
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Listitem $listitem)
    {
        return $this->isOwner($user, $listitem);
    }

    public function canFateroll(IdentityInterface $user, Listitem $listitem)
    {
        return true;
    }
   
    protected function isOwner(IdentityInterface $user, Listitem $listitem)
    {
        $campaign_user_id = $this->fetchtable("Campaigns")->find('all')->where(['id' => $user->campaign_id])->toArray()[0]['user_id'];
        return $campaign_user_id === $user->id;
    }
}
