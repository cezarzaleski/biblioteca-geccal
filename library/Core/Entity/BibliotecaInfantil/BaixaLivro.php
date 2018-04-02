<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * BaixaLivro
 *
 * @ORM\Table(name="baixa_livro")
 * @ORM\Entity
 */
class BaixaLivro
{
    /**
     * @var integer $idBaixaLivro
     *
     * @ORM\Column(name="id_baixa_livro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBaixaLivro;

    /**
     * @var datetime $dtBaixa
     *
     * @ORM\Column(name="dt_baixa", type="datetime", nullable=false)
     */
    private $dtBaixa;

    /**
     * @var text $noMotivoBaixa
     *
     * @ORM\Column(name="no_motivo_baixa", type="text", nullable=false)
     */
    private $noMotivoBaixa;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var datetime $dtRetorno
     *
     * @ORM\Column(name="dt_retorno", type="datetime", nullable=true)
     */
    private $dtRetorno;

    /**
     * @var text $noMotivoRetorno
     *
     * @ORM\Column(name="no_motivo_retorno", type="text", nullable=true)
     */
    private $noMotivoRetorno;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    /**
     * @var Livro
     *
     * @ORM\ManyToOne(targetEntity="Livro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livro", referencedColumnName="id_livro")
     * })
     */
    private $idLivro;


    /**
     * Get idBaixaLivro
     *
     * @return integer 
     */
    public function getIdBaixaLivro()
    {
        return $this->idBaixaLivro;
    }

    /**
     * Set dtBaixa
     *
     * @param datetime $dtBaixa
     * @return BaixaLivro
     */
    public function setDtBaixa($dtBaixa)
    {
        $this->dtBaixa = $dtBaixa;
        return $this;
    }

    /**
     * Get dtBaixa
     *
     * @return datetime 
     */
    public function getDtBaixa()
    {
        return $this->dtBaixa;
    }

    /**
     * Set noMotivoBaixa
     *
     * @param text $noMotivoBaixa
     * @return BaixaLivro
     */
    public function setNoMotivoBaixa($noMotivoBaixa)
    {
        $this->noMotivoBaixa = $noMotivoBaixa;
        return $this;
    }

    /**
     * Get noMotivoBaixa
     *
     * @return text 
     */
    public function getNoMotivoBaixa()
    {
        return $this->noMotivoBaixa;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return BaixaLivro
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
     * Set dtRetorno
     *
     * @param datetime $dtRetorno
     * @return BaixaLivro
     */
    public function setDtRetorno($dtRetorno)
    {
        $this->dtRetorno = $dtRetorno;
        return $this;
    }

    /**
     * Get dtRetorno
     *
     * @return datetime 
     */
    public function getDtRetorno()
    {
        return $this->dtRetorno;
    }

    /**
     * Set noMotivoRetorno
     *
     * @param text $noMotivoRetorno
     * @return BaixaLivro
     */
    public function setNoMotivoRetorno($noMotivoRetorno)
    {
        $this->noMotivoRetorno = $noMotivoRetorno;
        return $this;
    }

    /**
     * Get noMotivoRetorno
     *
     * @return text 
     */
    public function getNoMotivoRetorno()
    {
        return $this->noMotivoRetorno;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return BaixaLivro
     */
    public function setIdUsuario(\Core\Entity\BibliotecaInfantil\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idLivro
     *
     * @param Livro $idLivro
     * @return BaixaLivro
     */
    public function setIdLivro(\Core\Entity\BibliotecaInfantil\Livro $idLivro = null)
    {
        $this->idLivro = $idLivro;
        return $this;
    }

    /**
     * Get idLivro
     *
     * @return Livro 
     */
    public function getIdLivro()
    {
        return $this->idLivro;
    }
}