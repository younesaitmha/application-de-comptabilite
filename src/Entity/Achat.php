<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="achat", indexes={@ORM\Index(name="idFournisseur", columns={"idFournisseur"})})
 * @ORM\Entity
 */
class Achat
{
    /**
     * @var string
     *
     * @ORM\Column(name="idachat", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idachat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="date", nullable=false)
     */
    private $dateAchat;

    /**
     * @var float
     *
     * @ORM\Column(name="Total_TTC", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalTtc;

    /**
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFournisseur", referencedColumnName="idFournisseur")
     * })
     */
    private $idfournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idachat")
     * @ORM\JoinTable(name="achatpdt",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idachat", referencedColumnName="idachat")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   }
     * )
     */
    private $idproduit;

    /**
     * @ORM\OneToMany(targetEntity=Achatpdt::class, mappedBy="idProduit",cascade={"persist"})
     */
    private $achatpdts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->achatpdts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdachat(): ?string
    {
        return $this->idachat;
    }
    
    public function setIdachat(string $idachat): self
    {
        $this->idachat = $idachat;

        return $this;
    }


    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getTotalTtc(): ?float
    {
        return $this->totalTtc;
    }

    public function setTotalTtc(float $totalTtc): self
    {
        $this->totalTtc = $totalTtc;

        return $this;
    }

    public function getIdfournisseur(): ?Fournisseur
    {
        return $this->idfournisseur;
    }

    public function setIdfournisseur(?Fournisseur $idfournisseur): self
    {
        $this->idfournisseur = $idfournisseur;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getIdproduit(): Collection
    {
        return $this->idproduit;
    }

    public function addIdproduit(Produit $idproduit): self
    {
        if (!$this->idproduit->contains($idproduit)) {
            $this->idproduit[] = $idproduit;
        }

        return $this;
    }

    public function removeIdproduit(Produit $idproduit): self
    {
        if ($this->idproduit->contains($idproduit)) {
            $this->idproduit->removeElement($idproduit);
        }

        return $this;
    }
    /**
     * @return Collection|Achatpdt[]
     */
    public function getAchatpdts(): Collection
    {
        return $this->achatpdts;
    }

    public function addAchatpdt(Achatpdt $achatpdt): self
    {
        if (!$this->achatpdts->contains($achatpdt)) {
            $this->achatpdts[] = $achatpdt;
            $achatpdt->setIdachat($this);
        }

        return $this;
    }

    public function removeAchatpdt(Achatpdt $achatpdt): self
    {
        if ($this->achatpdts->contains($achatpdt)) {
            $this->achatpdts->removeElement($achatpdt);
            // set the owning side to null (unless already changed)
            if ($achatpdt->getIdProduit() === $this) {
                $achatpdt->setIdProduit(null);
            }
        }

        return $this;
    }
}
