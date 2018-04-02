<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Midia
 *
 * @ORM\Table(name="midia")
 * @ORM\Entity
 */
class Midia
{
    /**
     * @var integer $idMidia
     *
     * @ORM\Column(name="id_midia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMidia;

    /**
     * @var string $noTitulo
     *
     * @ORM\Column(name="no_titulo", type="string", length=45, nullable=false)
     */
    private $noTitulo;

    /**
     * @var datetime $dataPublicacao
     *
     * @ORM\Column(name="data_publicacao", type="datetime", nullable=false)
     */
    private $dataPublicacao;

    /**
     * @var integer $nuVolume
     *
     * @ORM\Column(name="nu_volume", type="integer", nullable=false)
     */
    private $nuVolume;

    /**
     * @var integer $nuExemplar
     *
     * @ORM\Column(name="nu_exemplar", type="integer", nullable=false)
     */
    private $nuExemplar;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var TipoMidia
     *
     * @ORM\ManyToOne(targetEntity="TipoMidia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_midia", referencedColumnName="id_tipo_midia")
     * })
     */
    private $idTipoMidia;


    /**
     * Get idMidia
     *
     * @return integer 
     */
    public function getIdMidia()
    {
        return $this->idMidia;
    }

    /**
     * Set noTitulo
     *
     * @param string $noTitulo
     * @return Midia
     */
    public function setNoTitulo($noTitulo)
    {
        $this->noTitulo = $noTitulo;
        return $this;
    }

    /**
     * Get noTitulo
     *
     * @return string 
     */
    public function getNoTitulo()
    {
        return $this->noTitulo;
    }

    /**
     * Set dataPublicacao
     *
     * @param datetime $dataPublicacao
     * @return Midia
     */
    public function setDataPublicacao($dataPublicacao)
    {
        $this->dataPublicacao = $dataPublicacao;
        return $this;
    }

    /**
     * Get dataPublicacao
     *
     * @return datetime 
     */
    public function getDataPublicacao()
    {
        return $this->dataPublicacao;
    }

    /**
     * Set nuVolume
     *
     * @param integer $nuVolume
     * @return Midia
     */
    public function setNuVolume($nuVolume)
    {
        $this->nuVolume = $nuVolume;
        return $this;
    }

    /**
     * Get nuVolume
     *
     * @return integer 
     */
    public function getNuVolume()
    {
        return $this->nuVolume;
    }

    /**
     * Set nuExemplar
     *
     * @param integer $nuExemplar
     * @return Midia
     */
    public function setNuExemplar($nuExemplar)
    {
        $this->nuExemplar = $nuExemplar;
        return $this;
    }

    /**
     * Get nuExemplar
     *
     * @return integer 
     */
    public function getNuExemplar()
    {
        return $this->nuExemplar;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Midia
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
     * Set idTipoMidia
     *
     * @param TipoMidia $idTipoMidia
     * @return Midia
     */
    public function setIdTipoMidia(\TipoMidia $idTipoMidia = null)
    {
        $this->idTipoMidia = $idTipoMidia;
        return $this;
    }

    /**
     * Get idTipoMidia
     *
     * @return TipoMidia 
     */
    public function getIdTipoMidia()
    {
        return $this->idTipoMidia;
    }
}