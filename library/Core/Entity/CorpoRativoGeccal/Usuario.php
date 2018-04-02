<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string $noUsuario
     *
     * @ORM\Column(name="no_usuario", type="string", length=45, nullable=false)
     */
    private $noUsuario;

    /**
     * @var text $noSenha
     *
     * @ORM\Column(name="no_senha", type="text", nullable=false)
     */
    private $noSenha;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var datetime $dtUltVisita
     *
     * @ORM\Column(name="dt_ult_visita", type="datetime", nullable=false)
     */
    private $dtUltVisita;

    /**
     * @var PessoaFisica
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="PessoaFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;


    /**
     * Set noUsuario
     *
     * @param string $noUsuario
     * @return Usuario
     */
    public function setNoUsuario($noUsuario)
    {
        $this->noUsuario = $noUsuario;
        return $this;
    }

    /**
     * Get noUsuario
     *
     * @return string 
     */
    public function getNoUsuario()
    {
        return $this->noUsuario;
    }

    /**
     * Set noSenha
     *
     * @param text $noSenha
     * @return Usuario
     */
    public function setNoSenha($noSenha)
    {
        $this->noSenha = $noSenha;
        return $this;
    }

    /**
     * Get noSenha
     *
     * @return text 
     */
    public function getNoSenha()
    {
        return $this->noSenha;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Usuario
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
     * Set dtUltVisita
     *
     * @param datetime $dtUltVisita
     * @return Usuario
     */
    public function setDtUltVisita($dtUltVisita)
    {
        $this->dtUltVisita = $dtUltVisita;
        return $this;
    }

    /**
     * Get dtUltVisita
     *
     * @return datetime 
     */
    public function getDtUltVisita()
    {
        return $this->dtUltVisita;
    }

    /**
     * Set idPessoa
     *
     * @param PessoaFisica $idPessoa
     * @return Usuario
     */
    public function setIdPessoa(\PessoaFisica $idPessoa)
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
}