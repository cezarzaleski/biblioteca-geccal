<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Sistema
 *
 * @ORM\Table(name="sistema")
 * @ORM\Entity
 */
class Sistema
{
    /**
     * @var integer $idSistema
     *
     * @ORM\Column(name="id_sistema", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSistema;

    /**
     * @var string $noSistema
     *
     * @ORM\Column(name="no_sistema", type="string", length=45, nullable=false)
     */
    private $noSistema;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var string $sgSistema
     *
     * @ORM\Column(name="sg_sistema", type="string", length=45, nullable=false)
     */
    private $sgSistema;

    /**
     * @var text $noDescricao
     *
     * @ORM\Column(name="no_descricao", type="text", nullable=false)
     */
    private $noDescricao;


    /**
     * Get idSistema
     *
     * @return integer 
     */
    public function getIdSistema()
    {
        return $this->idSistema;
    }

    /**
     * Set noSistema
     *
     * @param string $noSistema
     * @return Sistema
     */
    public function setNoSistema($noSistema)
    {
        $this->noSistema = $noSistema;
        return $this;
    }

    /**
     * Get noSistema
     *
     * @return string 
     */
    public function getNoSistema()
    {
        return $this->noSistema;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Sistema
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
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Sistema
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return datetime 
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * Set sgSistema
     *
     * @param string $sgSistema
     * @return Sistema
     */
    public function setSgSistema($sgSistema)
    {
        $this->sgSistema = $sgSistema;
        return $this;
    }

    /**
     * Get sgSistema
     *
     * @return string 
     */
    public function getSgSistema()
    {
        return $this->sgSistema;
    }

    /**
     * Set noDescricao
     *
     * @param text $noDescricao
     * @return Sistema
     */
    public function setNoDescricao($noDescricao)
    {
        $this->noDescricao = $noDescricao;
        return $this;
    }

    /**
     * Get noDescricao
     *
     * @return text 
     */
    public function getNoDescricao()
    {
        return $this->noDescricao;
    }
}