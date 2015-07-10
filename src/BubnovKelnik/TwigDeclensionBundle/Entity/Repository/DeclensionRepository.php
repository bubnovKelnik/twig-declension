<?php

namespace BubnovKelnik\TwigDeclensionBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DeclensionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DeclensionRepository extends EntityRepository
{
    /**
     * @param array $formData
     * @return QueryBuilder
     */
    public function getListQB($formData = [])
    {
        $qb = $this->createQueryBuilder('d')
            ->select('d')
            ->orderBy('d.infinitive', 'ASC')
        ;
        
        foreach($formData as $name => $value){
            if(empty($value)){
                continue;
            }

            $qb
                ->where('d.' . $name . ' = :'. $name)
                ->setParameter(':'. $name, $value)
            ;
        }
        
        return $qb;
    }
    
    /**
     * 
     * @param type $infinitive
     */
    public function findOneByInfinitive($infinitive = '')
    {
        return $this->findOneBy(['infinitive' => mb_strtolower($infinitive, 'UTF-8')]);
    }
}