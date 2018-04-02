<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * Turma
 *
 * @ORM\Table(name="turma")
 * @ORM\Entity
 */
class Turma
{
    /**
     * @var integer $idTurma
     *
     * @ORM\Column(name="id_turma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTurma;

    /**
     * @var datetime $dtInicio
     *
     * @ORM\Column(name="dt_inicio", type="datetime", nullable=false)
     */
    private $dtInicio;

    /**
     * @var datetime $dtFim
     *
     * @ORM\Column(name="dt_fim", type="datetime", nullable=false)
     */
    private $dtFim;

    /**
     * @var integer $nuIdadeMinima
     *
     * @ORM\Column(name="nu_idade_minima", type="integer", nullable=false)
     */
    private $nuIdadeMinima;

    /**
     * @var integer $nuIdadeMaxima
     *
     * @ORM\Column(name="nu_idade_maxima", type="integer", nullable=false)
     */
    private $nuIdadeMaxima;

    /**
     * @var integer $nuAno
     *
     * @ORM\Column(name="nu_ano", type="integer", nullable=false)
     */
    private $nuAno;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var text $noObs
     *
     * @ORM\Column(name="no_obs", type="text", nullable=true)
     */
    private $noObs;

    /**
     * @var Ciclo
     *
     * @ORM\ManyToOne(targetEntity="Ciclo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ciclo", referencedColumnName="id_ciclo")
     * })
     */
    private $idCiclo;

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
     * Get idTurma
     *
     * @return integer 
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * Set dtInicio
     *
     * @param datetime $dtInicio
     * @return Turma
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return datetime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param datetime $dtFim
     * @return Turma
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    /**
     * Get dtFim
     *
     * @return datetime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * Set nuIdadeMinima
     *
     * @param integer $nuIdadeMinima
     * @return Turma
     */
    public function setNuIdadeMinima($nuIdadeMinima)
    {
        $this->nuIdadeMinima = $nuIdadeMinima;
        return $this;
    }

    /**
     * Get nuIdadeMinima
     *
     * @return integer 
     */
    public function getNuIdadeMinima()
    {
        return $this->nuIdadeMinima;
    }

    /**
     * Set nuIdadeMaxima
     *
     * @param integer $nuIdadeMaxima
     * @return Turma
     */
    public function setNuIdadeMaxima($nuIdadeMaxima)
    {
        $this->nuIdadeMaxima = $nuIdadeMaxima;
        return $this;
    }

    /**
     * Get nuIdadeMaxima
     *
     * @return integer 
     */
    public function getNuIdadeMaxima()
    {
        return $this->nuIdadeMaxima;
    }

    /**
     * Set nuAno
     *
     * @param integer $nuAno
     * @return Turma
     */
    public function setNuAno($nuAno)
    {
        $this->nuAno = $nuAno;
        return $this;
    }

    /**
     * Get nuAno
     *
     * @return integer 
     */
    public function getNuAno()
    {
        return $this->nuAno;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Turma
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
     * Set noObs
     *
     * @param text $noObs
     * @return Turma
     */
    public function setNoObs($noObs)
    {
        $this->noObs = $noObs;
        return $this;
    }

    /**
     * Get noObs
     *
     * @return text 
     */
    public function getNoObs()
    {
        return $this->noObs;
    }

    /**
     * Set idCiclo
     *
     * @param Ciclo $idCiclo
     * @return Turma
     */
    public function setIdCiclo(\Core\Entity\BibliotecaInfantil\Ciclo $idCiclo = null)
    {
        $this->idCiclo = $idCiclo;
        return $this;
    }

    /**
     * Get idCiclo
     *
     * @return Ciclo 
     */
    public function getIdCiclo()
    {
        return $this->idCiclo;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return Turma
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
}