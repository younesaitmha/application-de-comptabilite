<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="idProduit", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="Designation", type="string", length=30, nullable=false)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="Categorie", type="string", length=30, nullable=false)
     */
    private $categorie;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_unitaire", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixUnitaire;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_ht", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixHt;

    /**
     * @var int
     *
     * @ORM\Column(name="TVA", type="integer", nullable=false)
     */
    private $tva;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Achat", mappedBy="idproduit")
     */
    private $idachat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vente", mappedBy="idproduit")
     */
    private $idvente;

    /**
     * @ORM\OneToMany(targetEntity=Ventepdt::class, mappedBy="idProduit")
     */
    private $ventepdts;

    /**
     * @ORM\OneToMany(targetEntity=Achatpdt::class, mappedBy="idProduit")
     */
    private $achatpdts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idachat = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idvente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ventepdts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->achatpdts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdproduit(): ?string
    {
        return $this->idproduit;
    }
    public function setIdproduit(string $idproduit): self
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function __toString(){
        return $this->designation ;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getPrixHt(): ?float
    {
        return $this->prixHt;
    }

    public function setPrixHt(float $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * @return Collection|Achat[]
     */
    public function getIdachat(): Collection
    {
        return $this->idachat;
    }

    public function addIdachat(Achat $idachat): self
    {
        if (!$this->idachat->contains($idachat)) {
            $this->idachat[] = $idachat;
            $idachat->addIdproduit($this);
        }

        return $this;
    }

    public function removeIdachat(Achat $idachat): self
    {
        if ($this->idachat->contains($idachat)) {
            $this->idachat->removeElement($idachat);
            $idachat->removeIdproduit($this);
        }

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getIdvente(): Collection
    {
        return $this->idvente;
    }

    public function addIdvente(Vente $idvente): self
    {
        if (!$this->idvente->contains($idvente)) {
            $this->idvente[] = $idvente;
            $idvente->addIdproduit($this);
        }

        return $this;
    }

    public function removeIdvente(Vente $idvente): self
    {
        if ($this->idvente->contains($idvente)) {
            $this->idvente->removeElement($idvente);
            $idvente->removeIdproduit($this);
        }

        return $this;
    }

    /**
     * @return Collection|Ventepdt[]
     */
    public function getVentepdts(): Collection
    {
        return $this->ventepdts;
    }

    public function addVentepdt(Ventepdt $ventepdt): self
    {
        if (!$this->ventepdts->contains($ventepdt)) {
            $this->ventepdts[] = $ventepdt;
            $ventepdt->setIdProduit($this);
        }

        return $this;
    }

    public function removeVentepdt(Ventepdt $ventepdt): self
    {
        if ($this->ventepdts->contains($ventepdt)) {
            $this->ventepdts->removeElement($ventepdt);
            // set the owning side to null (unless already changed)
            if ($ventepdt->getIdProduit() === $this) {
                $ventepdt->setIdProduit(null);
            }
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
            $achatpdt->setIdProduit($this);
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
