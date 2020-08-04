<?php

namespace App\Entity;

use App\Repository\AchatpdtRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 * 
 * @ORM\Table(name="achatpdt")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=AchatpdtRepository::class)
 */
class Achatpdt
{
  
    /**
     *  @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Achat::class)
     * @ORM\JoinColumn(name="idachat", referencedColumnName="idachat",nullable=false)
     */
    private $idachat;

    /**
     *  @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="achatpdts")
     * @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit",nullable=false)
     */
    private $idProduit;

    /**
     * @ORM\Column(name="qteAchat",type="integer")
     */
    private $qteAchat;

    public function getId(): ?int
    {
        return $this->idachat." ".$this->idProduit;
    }

    public function getIdachat(): ?Achat
    {
        return $this->idachat;
    }

    public function setIdachat(?Achat $idachat): self
    {
        $this->idachat = $idachat;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getQteAchat(): ?int
    {
        return $this->qteAchat;
    }

    public function setQteAchat(int $qteAchat): self
    {
        $this->qteAchat = $qteAchat;

        return $this;
    }
}
