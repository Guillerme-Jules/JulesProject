<?php

namespace App\Entity;

use App\Enum\ContenantEnum;
use App\Exception\NoNegativeValueGlaceException;
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
        $this->identifiant      = $identifiant;
        if ($tempsFabrication < 0) {
            throw new NoNegativeValueGlaceException("Le temps de fabrication ne peux pas être négative");
        }
        $this->tempsFabrication = $tempsFabrication;

        $this->contenant        = $contenant;
        if ($prixAchat < 0) {
            throw new NoNegativeValueGlaceException("Le prix d'achat ne peux pas être négative");
        }
        $this->prixAchat        = $prixAchat;

        if ($prixVente < 0) {
            throw new NoNegativeValueGlaceException("Le prix de vente ne peux pas être négative");
        }

        $this->prixVente        = $prixVente;

        $this->datePeremption   = $datePeremption;
        $this->saveur           = $saveur;
    }

    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }
}