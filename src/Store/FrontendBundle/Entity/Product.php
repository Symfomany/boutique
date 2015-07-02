<?php

namespace Store\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", uniqueConstraints={@ORM\UniqueConstraint(name="uk_product_id", columns={"id"}), @ORM\UniqueConstraint(name="uk_product_title", columns={"title"})}, indexes={@ORM\Index(name="new_foreign_key_421874400675231", columns={"category_id"})})
 * @ORM\Entity(repositoryClass="Store\FrontendBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="product")
     * @ORM\JoinTable(name="product_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;


    /**
     * @var
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set title
     *
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Product
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set category
     *
     * @param \Store\FrontendBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Store\FrontendBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Store\FrontendBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tag
     *
     * @param \Store\FrontendBundle\Entity\Tag $tag
     * @return Product
     */
    public function addTag(\Store\FrontendBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Store\FrontendBundle\Entity\Tag $tag
     */
    public function removeTag(\Store\FrontendBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
