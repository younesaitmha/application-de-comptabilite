<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente", indexes={@ORM\Index(name="idClient", columns={"idClient"})})
 * @ORM\Entity
 */
class Vente
{
    /**
     * @var string
     *
     * @ORM\Column(name="idvente", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idvente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevente", type="date", nullable=false)
     */
    private $datevente;

    /**
     * @var float
     *
     * @ORM\Column(name="Total_TTC", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalTtc;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idvente")
     * @ORM\JoinTable(name="ventepdt",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idvente", referencedColumnName="idvente")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   }
     * )
     */
    private $idproduit;

     /**
     * @ORM\OneToMany(targetEntity=Ventepdt::class, mappedBy="idvente", cascade={"persist"})
     */
    private $ventepdts;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ventepdts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdvente(): ?string
    {
        return $this->idvente;
    }
    
    public function setIdvente(string $idvente): self
    {
        $this->idvente = $idvente;

        return $this;
    }

    public function getDatevente(): ?\DateTimeInterface
    {
        return $this->datevente;
    }

    public function setDatevente(\DateTimeInterface $datevente): self
    {
        $this->datevente = $datevente;

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

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

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
            $ventepdt->setIdvente($this);
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

}
