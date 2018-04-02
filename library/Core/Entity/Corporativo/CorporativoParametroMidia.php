<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoParametroMidia
 *
 * @ORM\Table(name="corporativo.vw_parametro_midia")
 * @ORM\Entity
 */
class CorporativoParametroMidia
{
    /**
     * @var integer $sqParametroMultimidia
     *
     * @ORM\Column(name="sq_parametro_multimidia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqParametroMultimidia;

    /**
     * @var integer $nuTamanhoMaximo
     *
     * @ORM\Column(name="nu_tamanho_maximo", type="integer", nullable=false)
     */
    private $nuTamanhoMaximo;

    /**
     * @var integer $nuQuantidadeEnvioFilaAnalise
     *
     * @ORM\Column(name="nu_quantidade_envio_fila_analise", type="integer", nullable=false)
     */
    private $nuQuantidadeEnvioFilaAnalise;

    /**
     * @var integer $nuQuantidadeMultimidiaCompartilhamento
     *
     * @ORM\Column(name="nu_quantidade_multimidia_compartilhamento", type="integer", nullable=false)
     */
    private $nuQuantidadeMultimidiaCompartilhamento;

    /**
     * @var bigint $sqSistema
     *
     * @ORM\Column(name="sq_sistema", type="bigint", nullable=true)
     */
    private $sqSistema;

    /**
     * @var \Core\Entity\Corporativo\CorporativoExtensaoArquivo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoExtensaoArquivo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_extensao_arquivo", referencedColumnName="sq_extensao_arquivo")
     * })
     */
    private $sqExtensaoArquivo;


    /**
     * Get sqParametroMultimidia
     *
     * @return integer 
     */
    public function getSqParametroMultimidia()
    {
        return $this->sqParametroMultimidia;
    }

    /**
     * Set nuTamanhoMaximo
     *
     * @param integer $nuTamanhoMaximo
     * @return CorporativoParametroMidia
     */
    public function setNuTamanhoMaximo($nuTamanhoMaximo)
    {
        $this->nuTamanhoMaximo = $nuTamanhoMaximo;
        return $this;
    }

    /**
     * Get nuTamanhoMaximo
     *
     * @return integer 
     */
    public function getNuTamanhoMaximo()
    {
        return $this->nuTamanhoMaximo;
    }

    /**
     * Set nuQuantidadeEnvioFilaAnalise
     *
     * @param integer $nuQuantidadeEnvioFilaAnalise
     * @return CorporativoParametroMidia
     */
    public function setNuQuantidadeEnvioFilaAnalise($nuQuantidadeEnvioFilaAnalise)
    {
        $this->nuQuantidadeEnvioFilaAnalise = $nuQuantidadeEnvioFilaAnalise;
        return $this;
    }

    /**
     * Get nuQuantidadeEnvioFilaAnalise
     *
     * @return integer 
     */
    public function getNuQuantidadeEnvioFilaAnalise()
    {
        return $this->nuQuantidadeEnvioFilaAnalise;
    }

    /**
     * Set nuQuantidadeMultimidiaCompartilhamento
     *
     * @param integer $nuQuantidadeMultimidiaCompartilhamento
     * @return CorporativoParametroMidia
     */
    public function setNuQuantidadeMultimidiaCompartilhamento($nuQuantidadeMultimidiaCompartilhamento)
    {
        $this->nuQuantidadeMultimidiaCompartilhamento = $nuQuantidadeMultimidiaCompartilhamento;
        return $this;
    }

    /**
     * Get nuQuantidadeMultimidiaCompartilhamento
     *
     * @return integer 
     */
    public function getNuQuantidadeMultimidiaCompartilhamento()
    {
        return $this->nuQuantidadeMultimidiaCompartilhamento;
    }

    /**
     * Set sqSistema
     *
     * @param bigint $sqSistema
     * @return CorporativoParametroMidia
     */
    public function setSqSistema($sqSistema)
    {
        $this->sqSistema = $sqSistema;
        return $this;
    }

    /**
     * Get sqSistema
     *
     * @return bigint 
     */
    public function getSqSistema()
    {
        return $this->sqSistema;
    }

    /**
     * Set sqExtensaoArquivo
     *
     * @param \Core\Entity\Corporativo\CorporativoExtensaoArquivo $sqExtensaoArquivo
     * @return CorporativoParametroMidia
     */
    public function setSqExtensaoArquivo(\Core\Entity\Corporativo\CorporativoExtensaoArquivo $sqExtensaoArquivo = null)
    {
        $this->sqExtensaoArquivo = $sqExtensaoArquivo;
        return $this;
    }

    /**
     * Get sqExtensaoArquivo
     *
     * @return \Core\Entity\Corporativo\CorporativoExtensaoArquivo 
     */
    public function getSqExtensaoArquivo()
    {
        return $this->sqExtensaoArquivo;
    }
}