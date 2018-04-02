<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * EvangelizandoTurma
 *
 * @ORM\Table(name="evangelizando_turma")
 * @ORM\Entity
 */
class EvangelizandoTurma
{
    /**
     * @var integer $idEvangelizandoTurma
     *
     * @ORM\Column(name="id_evangelizando_turma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvangelizandoTurma;

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
     * @var Turma
     *
     * @ORM\ManyToOne(targetEntity="Turma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_turma", referencedColumnName="id_turma")
     * })
     */
    private $idTurma;

    /**
     * @var Evangelizando
     *
     * @ORM\ManyToOne(targetEntity="Evangelizando")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evangelizando", referencedColumnName="id_evangelizando")
     * })
     */
    private $idEvangelizando;

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
     * Get idEvangelizandoTurma
     *
     * @return integer 
     */
    public function getIdEvangelizandoTurma()
    {
        return $this->idEvangelizandoTurma;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return EvangelizandoTurma
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
     * @return EvangelizandoTurma
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
     * Set idTurma
     *
     * @param Turma $idTurma
     * @return EvangelizandoTurma
     */
    public function setIdTurma(\Core\Entity\BibliotecaInfantil\Turma $idTurma = null)
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    /**
     * Get idTurma
     *
     * @return Turma 
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * Set idEvangelizando
     *
     * @param Evangelizando $idEvangelizando
     * @return EvangelizandoTurma
     */
    public function setIdEvangelizando(\Core\Entity\BibliotecaInfantil\Evangelizando $idEvangelizando = null)
    {
        $this->idEvangelizando = $idEvangelizando;
        return $this;
    }

    /**
     * Get idEvangelizando
     *
     * @return Evangelizando 
     */
    public function getIdEvangelizando()
    {
        return $this->idEvangelizando;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return EvangelizandoTurma
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