<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ColaboradorTurma
 *
 * @ORM\Table(name="colaborador_turma")
 * @ORM\Entity
 */
class ColaboradorTurma
{
    /**
     * @var integer $idColaboradorTurma
     *
     * @ORM\Column(name="id_colaborador_turma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idColaboradorTurma;

    /**
     * @var datetime $dataCadastro
     *
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=false)
     */
    private $dataCadastro;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var Colaborador
     *
     * @ORM\ManyToOne(targetEntity="Colaborador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_colaborador", referencedColumnName="id_colaborador")
     * })
     */
    private $idColaborador;

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
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;


    /**
     * Get idColaboradorTurma
     *
     * @return integer 
     */
    public function getIdColaboradorTurma()
    {
        return $this->idColaboradorTurma;
    }

    /**
     * Set dataCadastro
     *
     * @param datetime $dataCadastro
     * @return ColaboradorTurma
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return datetime 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return ColaboradorTurma
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
     * Set idColaborador
     *
     * @param Colaborador $idColaborador
     * @return ColaboradorTurma
     */
    public function setIdColaborador(\Colaborador $idColaborador = null)
    {
        $this->idColaborador = $idColaborador;
        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return Colaborador 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set idTurma
     *
     * @param Turma $idTurma
     * @return ColaboradorTurma
     */
    public function setIdTurma(\Turma $idTurma = null)
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
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return ColaboradorTurma
     */
    public function setIdUsuario(\Usuario $idUsuario = null)
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