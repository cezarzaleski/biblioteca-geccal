<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * OrigemLivro
 *
 * @ORM\Table(name="origem_livro")
 * @ORM\Entity
 */
class OrigemLivro
{
    /**
     * @var integer $idOrigemLivro
     *
     * @ORM\Column(name="id_origem_livro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrigemLivro;

    /**
     * @var text $noOrigem
     *
     * @ORM\Column(name="no_origem", type="text", nullable=false)
     */
    private $noOrigem;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idOrigemLivro
     *
     * @return integer 
     */
    public function getIdOrigemLivro()
    {
        return $this->idOrigemLivro;
    }

    /**
     * Set noOrigem
     *
     * @param text $noOrigem
     * @return OrigemLivro
     */
    public function setNoOrigem($noOrigem)
    {
        $this->noOrigem = $noOrigem;
        return $this;
    }

    /**
     * Get noOrigem
     *
     * @return text 
     */
    public function getNoOrigem()
    {
        return $this->noOrigem;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return OrigemLivro
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return boolean 
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }
}