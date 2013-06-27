<?php

namespace Tripwer\SocialNetworkingBundle\Service;

use Doctrine\ORM\EntityManager;
use Tripwer\SocialNetworkingBundle\Entity\Member;

class FriendshipRequestService{


    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function createRequest(Member $from,Member $to){
        if ($from->hasFriend($to)){

        }


    }

    public function requestExists(Member $from, Member $to){
        $qb = $this->em->createQueryBuilder();
        $requests = $qb->select("r")
            ->from("Tripwer\SocialNetworkingBundle\Entity\FriendshipRequest","r")
            ->where("r.from = :fromMember AND r.to = :toMember")
            ->orderBy("r.createDate DESC")
            ->setMaxResults(1)
            ->setParameters(array(
                "fromMember" => $from,
                "toMember" => $to
            ))
            ->getQuery()->getResult();

        //a request exist only if the latest request is not answered yet
        if (count($requests) && !$requests[0]->isAnswered()){
            return true;
        }

        return false;
    }

}