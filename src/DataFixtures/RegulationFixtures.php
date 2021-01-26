<?php

namespace App\DataFixtures;

use App\Entity\Regulation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegulationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $regulation = new regulation();
        $regulation->setDescription("Mentions légales
En vigueur au _______________
Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans 
l’économie numérique, dite L.C.E.N., il est porté à la connaissance des Utilisateurs du site _______________ 
les présentes mentions légales.
La connexion et la navigation sur le site (indiquer le nom du site) par l’Utilisateur implique acceptation intégrale 
et sans réserve des présentes mentions légales.
Ces dernières sont accessibles sur le site à la rubrique « Mentions légales ».
ARTICLE 1 : L’éditeur
L'édition du site _______________ est assurée par la Société _______________ _______________ au capital de 
_______________ euros, immatriculée au RCS de _______________ sous le numéro _______________ dont le siège social est 
situé au _______________, numéro de téléphone _______________, adresse e-mail : _______________.
N° de TVA intracommunautaire : _______________
Le Directeur de la publication est _______________
ARTICLE 2 : L’hébergeur
L'hébergeur du site _______________ est la Société _______________, dont le siège social est situé au _______________ ,
avec le numéro de téléphone : _______________.
ARTICLE 3 : Accès au site
Le site est accessible par tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et 
pouvant découlant d’une nécessité de maintenance.
En cas de modification, interruption ou suspension des services le site _______________ ne saurait être tenu 
responsable.
ARTICLE 4 : Collecte des données
Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie 
privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés. 
Le site est déclaré à la CNIL sous le numéro _______________.
En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, 
de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit :
ARTICLE 5 : Cookies
L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement 
sur son logiciel de navigation.
En naviguant sur le site, il les accepte.
Un cookie est un élément qui ne permet pas d’identifier l’Utilisateur mais sert à enregistrer des informations 
relatives à la navigation de celui-ci sur le site Internet. L’Utilisateur pourra désactiver ce cookie par 
l’intermédiaire des paramètres figurant au sein de son logiciel de navigation.
ARTICLE 6 : Propriété intellectuelle
Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du site _______________, 
 sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites judiciaires telles 
 que notamment prévues par le Code de la propriété intellectuelle et le Code civil.
Pour plus d’informations, se reporter aux CGU du site _______________ accessible à la rubrique« CGU » ");
        $manager->persist($regulation);
        $manager->flush();
    }
}
