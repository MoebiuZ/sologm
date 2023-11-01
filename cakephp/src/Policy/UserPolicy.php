<?php
namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;


class UserPolicy
{

    public function canView(IdentityInterface $identity, User $user) 
    {
        return $this->isAdmin($identity); //$this->isOwner($identity, $user) || $this->isAdmin($identity);
    }

    public function canAdd(IdentityInterface $identity, User $user) 
    {
        return $this->isAdmin($identity);
    }

    public function canEdit(IdentityInterface $identity, User $user) 
    {
        return $this->isOwner($identity, $user) || $this->isAdmin($identity) ;
    }

    public function canDelete(IdentityInterface $identity, User $user) 
    {
        return $this->isOwner($identity, $user) || $this->isAdmin($identity);  
    }

    public function isOwner(IdentityInterface $identity, User $user) 
    {
        return $user->role === $identity->getIdentifier();
    }

    public function isAdmin(IdentityInterface $identity) 
    {
        return $identity->getOriginalData()->role === "admin";

    }

}

?>