<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Scene;
use Authorization\IdentityInterface;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Scene policy
 */
class ScenePolicy
{

    use LocatorAwareTrait;
    /**
     * Check if $user can add Scene
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Scene $scene
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Scene $scene)
    {
        return true;
    }

    /**
     * Check if $user can edit Scene
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Scene $scene
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Scene $scene)
    {
        return $this->isOwner($user, $scene);
    }

    /**
     * Check if $user can delete Scene
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Scene $scene
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Scene $scene)
    {
        return $this->isOwner($user, $scene);
    }

    /**
     * Check if $user can view Scene
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Scene $scene
     * @return bool
     */
    public function canView(IdentityInterface $user, Scene $scene)
    {
        return $this->isOwner($user, $scene);
    }

    protected function isOwner(IdentityInterface $user, Scene $scene)
    {
        $campaign_user_id = $this->fetchtable("Campaigns")->find('all')->where(['id' => $scene->campaign_id])->toArray()[0]['user_id'];
        return $campaign_user_id === $user->id;
    }
}
