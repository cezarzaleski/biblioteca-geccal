<?php
namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoBioma
 *
 * @ORM\Table(name="corporativo.vw_bioma")
 * @ORM\Entity
 */
class CorporativoBioma
{
    /**
     * @var integer $sqBioma
     *
     * @ORM\Column(name="sq_bioma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqBioma;

    /**
     * @var string $noBioma
     *
     * @ORM\Column(name="no_bioma", type="string", length=50, nullable=false)
     */
    private $noBioma;

    /**
     * Get sqBioma
     *
     * @return integer 
     */
    public function getSqBioma()
    {
        return $this->sqBioma;
    }

    /**
     * Set noBioma
     *
     * @param string $noBioma
     * @return CorporativoBioma
     */
    public function setNoBioma($noBioma)
    {
        $this->noBioma = $noBioma;
        return $this;
    }

    /**
     * Get noBioma
     *
     * @return string 
     */
    public function getNoBioma()
    {
        return $this->noBioma;
    }
}