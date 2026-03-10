<?php

namespace App\Entity;

use App\Enum\ContenantEnum;
use App\Exception\NoNegativeValueGlaceException;
use App\Exception\PrixAchatSupPrixVenteException;
use DateTime;

class Glace
{
    private string $identifiant;
    private int $tempsFabrication;
    private ContenantEnum $contenant;
    private int $prixAchat;
    private int $prixVente;
    private DateTime $datePeremption;
    private Saveur $saveur;

    public function __construct(
        string $identifiant,
        int $tempsFabrication,
        ContenantEnum $contenant,
        int $prixAchat,
        int $prixVente,
        DateTime $datePeremption,
        Saveur $saveur
    ) {
        $this->setIdentifiant($identifiant);
        $this->setTempsFabrication($tempsFabrication);
        $this->setContenant($contenant);
        $this->setPrixAchat($prixAchat);
        $this->setPrixVente($prixVente);
        $this->setDatePeremption($datePeremption);
        $this->setSaveur($saveur);
    }

    private function setIdentifiant(string $identifiant): void
    {
        $this->identifiant = $identifiant;
    }

    private function setTempsFabrication(int $tempsFabrication): void
    {
        if ($tempsFabrication <= 0) {
            throw new NoNegativeValueGlaceException("Le temps de fabrication ne peux pas être négative");
        }
        $this->tempsFabrication = $tempsFabrication;
    }

    private function setContenant(ContenantEnum $contenant): void
    {
        $this->contenant = $contenant;
    }

    private function setPrixAchat(int $prixAchat): void
    {
        if ($prixAchat <= 0) {
            throw new NoNegativeValueGlaceException("Le prix d'achat ne peux pas être négative");
        }
        if (isset($this->prixVente) && $this->prixVente < $prixAchat) {
            throw new PrixAchatSupPrixVenteException();
        }
        $this->prixAchat = $prixAchat;
    }

    private function setPrixVente(int $prixVente): void
    {
        if ($prixVente <= 0) {
            throw new NoNegativeValueGlaceException("Le prix de vente ne peux pas être négative");
        }
        if (isset($this->prixAchat) && $prixVente < $this->prixAchat) {
            throw new PrixAchatSupPrixVenteException();
        }
        $this->prixVente = $prixVente;
    }

    private function setDatePeremption(DateTime $datePeremption): void
    {
        $this->datePeremption = $datePeremption;
    }

    private function setSaveur(Saveur $saveur): void
    {
        $this->saveur = $saveur;
    }
}