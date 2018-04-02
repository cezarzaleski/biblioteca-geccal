<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoCategoriaAtividade
 *
 * @ORM\Table(name="corporativo.vw_categoria_atividade")
 * @ORM\Entity
 */
class CorporativoCategoriaAtividade
{
    /**
     * @var integer $sqCategoriaAtividade
     *
     * @ORM\Column(name="sq_categoria_atividade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqCategoriaAtividade;

    /**
     * @var string $noCategoriaAtividade
     *
     * @ORM\Column(name="no_categoria_atividade", type="string", length=50, nullable=false)
     */
    private $noCategoriaAtividade;

    /**
     * @var boolean $stRegistroAtivo
     *
     * @ORM\Column(name="st_registro_ativo", type="boolean", nullable=true)
     */
    private $stRegistroAtivo;


    /**
     * Get sqCategoriaAtividade
     *
     * @return integer 
     */
    public function getSqCategoriaAtividade()
    {
        return $this->sqCategoriaAtividade;
    }

    /**
     * Set noCategoriaAtividade
     *
     * @param string $noCategoriaAtividade
     * @return CorporativoCategoriaAtividade
     */
    public function setNoCategoriaAtividade($noCategoriaAtividade)
    {
        $this->noCategoriaAtividade = $noCategoriaAtividade;
        return $this;
    }

    /**
     * Get noCategoriaAtividade
     *
     * @return string 
     */
    public function getNoCategoriaAtividade()
    {
        return $this->noCategoriaAtividade;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param boolean $stRegistroAtivo
     * @return CorporativoCategoriaAtividade
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
        return $this;
    }

    /**
     * Get stRegistroAtivo
     *
     * @return boolean 
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }
}