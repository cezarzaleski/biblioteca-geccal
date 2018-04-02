<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Telefone
 *
 * @ORM\Table(name="telefone")
 * @ORM\Entity
 */
class Telefone
{
    /**
     * @var integer $idTelefone
     *
     * @ORM\Column(name="id_telefone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTelefone;

    /**
     * @var integer $nuTelefone
     *
     * @ORM\Column(name="nu_telefone", type="integer", nullable=false)
     */
    private $nuTelefone;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;

    /**
     * @var TipoTelefone
     *
     * @ORM\ManyToOne(targetEntity="TipoTelefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_telefone", referencedColumnName="id_tipo_telefone")
     * })
     */
    private $idTipoTelefone;


    /**
     * Get idTelefone
     *
     * @return integer 
     */
    public function getIdTelefone()
    {
        return $this->idTelefone;
    }

    /**
     * Set nuTelefone
     *
     * @param integer $nuTelefone
     * @return Telefone
     */
    public function setNuTelefone($nuTelefone)
    {
        $this->nuTelefone = $nuTelefone;
        return $this;
    }

    /**
     * Get nuTelefone
     *
     * @return integer 
     */
    public function getNuTelefone()
    {
        return $this->nuTelefone;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Telefone
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

    /**
     * Set idPessoa
     *
     * @param Pessoa $idPessoa
     * @return Telefone
     */
    public function setIdPessoa(\Pessoa $idPessoa = null)
    {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    /**
     * Get idPessoa
     *
     * @return Pessoa 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * Set idTipoTelefone
     *
     * @param TipoTelefone $idTipoTelefone
     * @return Telefone
     */
    public function setIdTipoTelefone(\TipoTelefone $idTipoTelefone = null)
    {
        $this->idTipoTelefone = $idTipoTelefone;
        return $this;
    }

    /**
     * Get idTipoTelefone
     *
     * @return TipoTelefone 
     */
    public function getIdTipoTelefone()
    {
        return $this->idTipoTelefone;
    }
}