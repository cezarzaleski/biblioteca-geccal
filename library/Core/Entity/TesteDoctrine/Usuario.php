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
     * @var integer $idUsuario
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

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
     * @var datetime $dtDesativacao
     *
     * @ORM\Column(name="dt_desativacao", type="datetime", nullable=true)
     */
    private $dtDesativacao;

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
     * @var Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_perfil", referencedColumnName="id_perfil")
     * })
     */
    private $idPerfil;


    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
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
     * Set dtDesativacao
     *
     * @param datetime $dtDesativacao
     * @return Usuario
     */
    public function setDtDesativacao($dtDesativacao)
    {
        $this->dtDesativacao = $dtDesativacao;
        return $this;
    }

    /**
     * Get dtDesativacao
     *
     * @return datetime 
     */
    public function getDtDesativacao()
    {
        return $this->dtDesativacao;
    }

    /**
     * Set idColaborador
     *
     * @param Colaborador $idColaborador
     * @return Usuario
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
     * Set idPerfil
     *
     * @param Perfil $idPerfil
     * @return Usuario
     */
    public function setIdPerfil(\Perfil $idPerfil = null)
    {
        $this->idPerfil = $idPerfil;
        return $this;
    }

    /**
     * Get idPerfil
     *
     * @return Perfil 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }
}