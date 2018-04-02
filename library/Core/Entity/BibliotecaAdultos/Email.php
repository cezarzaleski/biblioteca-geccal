<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity
 */
class Email
{
    /**
     * @var integer $idEmail
     *
     * @ORM\Column(name="id_email", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmail;

    /**
     * @var text $noEmail
     *
     * @ORM\Column(name="no_email", type="text", nullable=false)
     */
    private $noEmail;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;


    /**
     * Get idEmail
     *
     * @return integer 
     */
    public function getIdEmail()
    {
        return $this->idEmail;
    }

    /**
     * Set noEmail
     *
     * @param text $noEmail
     * @return Email
     */
    public function setNoEmail($noEmail)
    {
        $this->noEmail = $noEmail;
        return $this;
    }

    /**
     * Get noEmail
     *
     * @return text 
     */
    public function getNoEmail()
    {
        return $this->noEmail;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Email
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
     * Set idPessoa
     *
     * @param Pessoa $idPessoa
     * @return Email
     */
    public function setIdPessoa(\Pessoa $idPessoa = null)
    {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    /**
     * Get idPessoa
     *
     * @return Pessoa 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }
}