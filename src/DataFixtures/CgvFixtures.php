<?php

namespace App\DataFixtures;

use App\Entity\CGV;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CgvFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cgv = new CGV();
        $cgv->setTextCgv("Clause n° 1 : Objet
            Les conditions générales de vente décrites ci-après détaillent les droits et obligations de la société ... 
            (dénomination sociale) et de son client dans le cadre de la vente des marchandises suivantes : ... 
            (le vendeur doit recenser les marchandises soumises aux CGV).
            Toute prestation accomplie par la société ... (dénomination sociale) implique donc l'adhésion sans 
            réserve de 
            l'acheteur aux présentes conditions générales de vente.
            Clause n° 2 : Prix
            Les prix des marchandises vendues sont ceux en vigueur au jour de la prise de commande. Ils sont 
            libellés 
            en euros et calculés hors taxes. Par voie de conséquence, ils seront majorés du taux de TVA et des frais 
            de transport applicables au jour de la commande.
            La société ... (dénomination sociale) s'accorde le droit de modifier ses tarifs à tout moment. Toutefois, 
            elle s'engage à facturer les marchandises commandées aux prix indiqués lors de l'enregistrement 
            de la commande.
            Clause n° 3 : Rabais et ristournes
            Les tarifs proposés comprennent les rabais et ristournes que la société ... (dénomination sociale) 
            serait amenée à octroyer compte tenu de ses résultats ou de la prise en charge par l'acheteur de 
            certaines prestations.
            Clause n° 4 : Escompte
            Aucun escompte ne sera consenti en cas de paiement anticipé.
            Clause n° 5 : Modalités de paiement
            Le règlement des commandes s'effectue :
            
            soit par chèque ;
            soit par carte bancaire ;
            le cas échéant, indiquer les autres moyens de paiement acceptés.
            Lors de l'enregistrement de la commande, l'acheteur devra verser un acompte de 10% du 
            montant global de la facture, le solde devant être payé à réception des marchandises.
            Clause n° 6 : Retard de paiement
            En cas de défaut de paiement total ou partiel des marchandises livrées au jour de la 
            réception, l'acheteur doit verser à la société ... (dénomination sociale) une pénalité 
            de retard égale à trois fois le taux de l'intérêt légal.
            Le taux de l'intérêt légal retenu est celui en vigueur au jour de la livraison des marchandises.");
        $manager->persist($cgv);
        $manager->flush();

        $manager->flush();
    }
}
