<?php

namespace Tripwer\SocialNetworkingBundle\Exception\Friendship;

use Tripwer\SocialNetworkingBundle\Entity\Member;

class MembersAreNotFriendsException extends \Exception{
    public function __construct(Member $member1, Member $member2){
        parent::__construct("Member ".$member1->getId()." and member ".$member2->getId()." are not friends");
    }
}