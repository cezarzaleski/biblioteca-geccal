<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PessoaJuridica
 *
 * @ORM\Table(name="pessoa_juridica")
 * @ORM\Entity
 */
class PessoaJuridica
{
    /**
     * @var text $noFantasia
     *
     * @ORM\Column(name="no_fantasia", type="text", nullable=false)
     */
    private $noFantasia;

    /**
     * @var string $sgEmpresa
     *
     * @ORM\Column(name="sg_empresa", type="string", length=45, nullable=false)
     */
    private $sgEmpresa;

    /**
     * @var integer $nuCnpj
     *
     * @ORM\Column(name="nu_cnpj", type="integer", nullable=false)
     */
    private $nuCnpj;

    /**
     * @var Pessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;


    /**
     * Set noFantasia
     *
     * @param text $noFantasia
     * @return PessoaJuridica
     */
    public function setNoFantasia($noFantasia)
    {
        $this->noFantasia = $noFantasia;
        return $this;
    }

    /**
     * Get noFantasia
     *
     * @return text 
     */
    public function getNoFantasia()
    {
        return $this->noFantasia;
    }

    /**
     * Set sgEmpresa
     *
     * @param string $sgEmpresa
     * @return PessoaJuridica
     */
    public function setSgEmpresa($sgEmpresa)
    {
        $this->sgEmpresa = $sgEmpresa;
        return $this;
    }

    /**
     * Get sgEmpresa
     *
     * @return string 
     */
    public function getSgEmpresa()
    {
        return $this->sgEmpresa;
    }

    /**
     * Set nuCnpj
     *
     * @param integer $nuCnpj
     * @return PessoaJuridica
     */
    public function setNuCnpj($nuCnpj)
    {
        $this->nuCnpj = $nuCnpj;
        return $this;
    }

    /**
     * Get nuCnpj
     *
     * @return integer 
     */
    public function getNuCnpj()
    {
        return $this->nuCnpj;
    }

    /**
     * Set idPessoa
     *
     * @param Pessoa $idPessoa
     * @return PessoaJuridica
     */
    public function setIdPessoa(\Pessoa $idPessoa)
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