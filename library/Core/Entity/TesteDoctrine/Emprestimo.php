<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Emprestimo
 *
 * @ORM\Table(name="emprestimo")
 * @ORM\Entity
 */
class Emprestimo
{
    /**
     * @var integer $idEmprestimo
     *
     * @ORM\Column(name="id_emprestimo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmprestimo;

    /**
     * @var datetime $dtEmprestimo
     *
     * @ORM\Column(name="dt_emprestimo", type="datetime", nullable=false)
     */
    private $dtEmprestimo;

    /**
     * @var datetime $dtPrevDevolucao
     *
     * @ORM\Column(name="dt_prev_devolucao", type="datetime", nullable=false)
     */
    private $dtPrevDevolucao;

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
     * @var datetime $dtDevolucao
     *
     * @ORM\Column(name="dt_devolucao", type="datetime", nullable=true)
     */
    private $dtDevolucao;

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
     * @var EvangelizandoTurma
     *
     * @ORM\ManyToOne(targetEntity="EvangelizandoTurma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evangelizando_turma", referencedColumnName="id_evangelizando_turma")
     * })
     */
    private $idEvangelizandoTurma;

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
     * Get idEmprestimo
     *
     * @return integer 
     */
    public function getIdEmprestimo()
    {
        return $this->idEmprestimo;
    }

    /**
     * Set dtEmprestimo
     *
     * @param datetime $dtEmprestimo
     * @return Emprestimo
     */
    public function setDtEmprestimo($dtEmprestimo)
    {
        $this->dtEmprestimo = $dtEmprestimo;
        return $this;
    }

    /**
     * Get dtEmprestimo
     *
     * @return datetime 
     */
    public function getDtEmprestimo()
    {
        return $this->dtEmprestimo;
    }

    /**
     * Set dtPrevDevolucao
     *
     * @param datetime $dtPrevDevolucao
     * @return Emprestimo
     */
    public function setDtPrevDevolucao($dtPrevDevolucao)
    {
        $this->dtPrevDevolucao = $dtPrevDevolucao;
        return $this;
    }

    /**
     * Get dtPrevDevolucao
     *
     * @return datetime 
     */
    public function getDtPrevDevolucao()
    {
        return $this->dtPrevDevolucao;
    }

    /**
     * Set nuAno
     *
     * @param integer $nuAno
     * @return Emprestimo
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
     * @return Emprestimo
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
     * Set dtDevolucao
     *
     * @param datetime $dtDevolucao
     * @return Emprestimo
     */
    public function setDtDevolucao($dtDevolucao)
    {
        $this->dtDevolucao = $dtDevolucao;
        return $this;
    }

    /**
     * Get dtDevolucao
     *
     * @return datetime 
     */
    public function getDtDevolucao()
    {
        return $this->dtDevolucao;
    }

    /**
     * Set idColaborador
     *
     * @param Colaborador $idColaborador
     * @return Emprestimo
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
     * Set idEvangelizandoTurma
     *
     * @param EvangelizandoTurma $idEvangelizandoTurma
     * @return Emprestimo
     */
    public function setIdEvangelizandoTurma(\EvangelizandoTurma $idEvangelizandoTurma = null)
    {
        $this->idEvangelizandoTurma = $idEvangelizandoTurma;
        return $this;
    }

    /**
     * Get idEvangelizandoTurma
     *
     * @return EvangelizandoTurma 
     */
    public function getIdEvangelizandoTurma()
    {
        return $this->idEvangelizandoTurma;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return Emprestimo
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

    /**
     * Set idLivro
     *
     * @param Livro $idLivro
     * @return Emprestimo
     */
    public function setIdLivro(\Livro $idLivro = null)
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