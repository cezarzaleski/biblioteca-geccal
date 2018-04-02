<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EmprestimoEvangelizando
 *
 * @ORM\Table(name="emprestimo_evangelizando")
 * @ORM\Entity
 */
class EmprestimoEvangelizando
{
    /**
     * @var integer $idEmpEvangelizando
     *
     * @ORM\Column(name="id_emp_evangelizando", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpEvangelizando;

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
     * @var EvangelizandoTurma
     *
     * @ORM\ManyToOne(targetEntity="EvangelizandoTurma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evangelizando_turma", referencedColumnName="id_evangelizando_turma")
     * })
     */
    private $idEvangelizandoTurma;

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
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;


    /**
     * Get idEmpEvangelizando
     *
     * @return integer 
     */
    public function getIdEmpEvangelizando()
    {
        return $this->idEmpEvangelizando;
    }

    /**
     * Set dtEmprestimo
     *
     * @param datetime $dtEmprestimo
     * @return EmprestimoEvangelizando
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
     * @return EmprestimoEvangelizando
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
     * @return EmprestimoEvangelizando
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
     * @return EmprestimoEvangelizando
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
     * @return EmprestimoEvangelizando
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
     * Set idEvangelizandoTurma
     *
     * @param EvangelizandoTurma $idEvangelizandoTurma
     * @return EmprestimoEvangelizando
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
     * Set idLivro
     *
     * @param Livro $idLivro
     * @return EmprestimoEvangelizando
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

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return EmprestimoEvangelizando
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