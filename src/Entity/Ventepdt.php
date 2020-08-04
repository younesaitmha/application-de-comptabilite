<?php

namespace App\Entity;

use App\Repository\VentepdtRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 * 
 * @ORM\Table(name="ventepdt")
 *  @ORM\Entity
 * @ORM\Entity(repositoryClass=VentepdtRepository::class)
 */
class Ventepdt
{
    

    /**
     *  @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Vente::class ,inversedBy="ventepdts")
     * @ORM\JoinColumn(name="idvente", referencedColumnName="idvente",nullable=false)
     */
    private $idvente;

    /**
     *  @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ventepdts")
     * @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit" ,nullable=false)
     */
    private $idProduit;

    /**
     * @ORM\Column(name="qteVente" ,type="integer")
     */
    private $qteVente;

    public function getId(): ?int
    {
        return $this->idvente." ".$this->idProduit;
    }

    public function getIdvente(): ?Vente
    {
        return $this->idvente;
    }

    public function setIdvente(?Vente $idvente): self
    {
        $this->idvente = $idvente;

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

    public function getQteVente(): ?int
    {
        return $this->qteVente;
    }

    public function setQteVente(int $qteVente): self
    {
        $this->qteVente = $qteVente;

        return $this;
    }
}
