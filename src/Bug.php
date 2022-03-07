<?php
//src/Bug.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="BugRepository")
 * @ORM\Table(name="bugs")
 */
class Bug
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $description;
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $status;

    /**
     * @ORM\ManyToMany(targetEntity="Product")
     */
    protected $products;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;
    
    public function __construct(){
        $this->products = new ArrayCollection();
    }
    public function assignToProduct(Product $product){
        $this->products[] = $product;
    }
    public function getProducts(){
        return $this->products;
    }
    public function getId(){
        return $this->id;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getCreated(){
        return $this->created;
    }
    public function setCreated($created){
        $this->created = $created;
    }
    public function setStatus($status){
        $this->status = $status;
    }

    public function getReporter(){
        return $this->reporter;
    }

    public function setReporter($reporter){
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer(){
        return $this->engineer;
    }

    public function setEngineer($engineer){
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }
    public function close()
    {
        $this->status = "CLOSE";
    }
}

