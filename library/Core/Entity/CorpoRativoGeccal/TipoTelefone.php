<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TipoTelefone
 *
 * @ORM\Table(name="tipo_telefone")
 * @ORM\Entity
 */
class TipoTelefone
{
    /**
     * @var integer $idTipoTelefone
     *
     * @ORM\Column(name="id_tipo_telefone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoTelefone;

    /**
     * @var string $noTipoTelefone
     *
     * @ORM\Column(name="no_tipo_telefone", type="string", length=45, nullable=false)
     */
    private $noTipoTelefone;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idTipoTelefone
     *
     * @return integer 
     */
    public function getIdTipoTelefone()
    {
        return $this->idTipoTelefone;
    }

    /**
     * Set noTipoTelefone
     *
     * @param string $noTipoTelefone
     * @return TipoTelefone
     */
    public function setNoTipoTelefone($noTipoTelefone)
    {
        $this->noTipoTelefone = $noTipoTelefone;
        return $this;
    }

    /**
     * Get noTipoTelefone
     *
     * @return string 
     */
    public function getNoTipoTelefone()
    {
        return $this->noTipoTelefone;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return TipoTelefone
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