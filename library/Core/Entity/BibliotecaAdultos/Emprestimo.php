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
     * @ORM\Column(name="dt_emprestimo", type="datetime", nullable=true)
     */
    private $dtEmprestimo;

    /**
     * @var integer $nuAno
     *
     * @ORM\Column(name="nu_ano", type="integer", nullable=true)
     */
    private $nuAno;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=true)
     */
    private $stAtivo;

    /**
     * @var datetime $dtPrevDevolucao
     *
     * @ORM\Column(name="dt_prev_devolucao", type="datetime", nullable=true)
     */
    private $dtPrevDevolucao;

    /**
     * @var datetime $dtDevolucao
     *
     * @ORM\Column(name="dt_devolucao", type="datetime", nullable=true)
     */
    private $dtDevolucao;

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
     * @var Midia
     *
     * @ORM\ManyToOne(targetEntity="Midia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_midia", referencedColumnName="id_midia")
     * })
     */
    private $idMidia;

    /**
     * @var PessoaFisica
     *
     * @ORM\ManyToOne(targetEntity="PessoaFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;

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

    /**
     * Set idMidia
     *
     * @param Midia $idMidia
     * @return Emprestimo
     */
    public function setIdMidia(\Midia $idMidia = null)
    {
        $this->idMidia = $idMidia;
        return $this;
    }

    /**
     * Get idMidia
     *
     * @return Midia 
     */
    public function getIdMidia()
    {
        return $this->idMidia;
    }

    /**
     * Set idPessoa
     *
     * @param PessoaFisica $idPessoa
     * @return Emprestimo
     */
    public function setIdPessoa(\PessoaFisica $idPessoa = null)
    {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    /**
     * Get idPessoa
     *
     * @return PessoaFisica 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
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
}