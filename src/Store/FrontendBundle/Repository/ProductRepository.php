<?php
namespace Store\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository
 * @package Store\FrontendBundle\Repository
 */
class ProductRepository extends EntityRepository
{

    /**
     * Retourne les produits visibles
     * et crées antérieurement
     */
    public function getProductHomepage()
    {

    return $this->getEntityManager()
        ->createQuery(
        'SELECT  p.title, p.description, c.title AS  cat
          FROM StoreFrontendBundle:Product p
          JOIN p.category c
          WHERE p.visible = :visible
          AND p.created < :today
          ORDER BY p.title ASC'
        )
    ->setParameter('visible', 1)
    ->setParameter('today', new \DateTime('now'))
    ->getResult();
    }
}



