<?php

namespace Tripwer\SocialNetworkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="socialnetworking_notifications")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "friend_request_notification" = "Tripwer\SocialNetworkingBundle\Entity\FriendRequestNotification"
 * })
 */
abstract class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="datetime")
     */
    private $createDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="viewed", type="boolean")
     */
    private $viewed;

    /**
     * @var Member
     * @ORM\ManyToOne(targetEntity="Member")
     *
     */
    private $receiver;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return Notification
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    
        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set viewed
     *
     * @param boolean $viewed
     * @return Notification
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    
        return $this;
    }

    /**
     * Get viewed
     *
     * @return boolean 
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * @param \Tripwer\SocialNetworkingBundle\Entity\Member $receiver
     * @return Notification
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return \Tripwer\SocialNetworkingBundle\Entity\Member
     */
    public function getReceiver()
    {
        return $this->receiver;
    }


}