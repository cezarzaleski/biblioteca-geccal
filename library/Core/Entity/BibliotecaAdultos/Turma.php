<?php



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
     * @var GrupoEstudo
     *
     * @ORM\ManyToOne(targetEntity="GrupoEstudo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grupo_estudo", referencedColumnName="id_grupo_estudo")
     * })
     */
    private $idGrupoEstudo;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_pessoa")
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
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Turma
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
     * Set idGrupoEstudo
     *
     * @param GrupoEstudo $idGrupoEstudo
     * @return Turma
     */
    public function setIdGrupoEstudo(\GrupoEstudo $idGrupoEstudo = null)
    {
        $this->idGrupoEstudo = $idGrupoEstudo;
        return $this;
    }

    /**
     * Get idGrupoEstudo
     *
     * @return GrupoEstudo 
     */
    public function getIdGrupoEstudo()
    {
        return $this->idGrupoEstudo;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return Turma
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