<?php
namespace Store\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class CategoryRepository
 * @package Store\FrontendBundle\Repository
 */
class CategoryRepository extends EntityRepository
{


    public function getCategoryHomepage()
    {

    return $this->getEntityManager()
        ->createQuery(
        'SELECT  c.title, c.description
          FROM StoreFrontendBundle:Category c
          ORDER BY c.title ASC'
        )
    ->setMaxResults(5)
    ->getResult();
    }
}



