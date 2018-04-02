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
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var datetime $dtUltVisita
     *
     * @ORM\Column(name="dt_ult_visita", type="datetime", nullable=true)
     */
    private $dtUltVisita;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Perfil", inversedBy="idPessoa")
     * @ORM\JoinTable(name="usuario_perfil",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_perfil", referencedColumnName="id_perfil")
     *   }
     * )
     */
    private $idPerfil;

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

    public function __construct()
    {
        $this->idPerfil = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Usuario
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
     * Add idPerfil
     *
     * @param Perfil $idPerfil
     * @return Usuario
     */
    public function addPerfil(\Perfil $idPerfil)
    {
        $this->idPerfil[] = $idPerfil;
        return $this;
    }

    /**
     * Get idPerfil
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
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