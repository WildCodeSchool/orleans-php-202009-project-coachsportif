Projet Coach sportif

Ce projet a été réalisé au sein de la Wild Code School, l’équipe était composée d’Ali, Arnaud, Benjamin, Loic, Sandra. 
Damien Gouveia est coach sportif dans la région d’Orléans. 

Construit avec
Symfony

Prérequis:

Php v^7.2
Yarn v^1.22
Composer v^1.10

Installation
1 : Cloner le repository : 	        
https://github.com/WildCodeSchool/orleans-php-202009-project-coachsportif.git

2 : Création du fichier env.local, puis ajouter dans ce fichier la ligne suivante:

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
(à compléter avec vos infos)

###> symfony/mailer ###
MAILER_DSN= (Vous pourrez simuler des envois d’E-mail avec le service mailtrap :https://mailtrap.io/ )
MAILER_FROM_ADDRESS= (Votre adresse pour envoyer les E-mail)
MAILER_TO_ADDRESS= (Votre adresse pour recevoir les E-mail)
###< symfony/mailer ###



3 : Composer install :
    Une fois composer installé, lancez dans votre terminal à la racine du projet “composer install” pour installer les 
    librairies requises pour faire fonctionner le projet.

4 : yarn install :
    Une fois Yarn installé, lancez dans votre terminal à la racine du projet 
    “yarn install” pour installer les fichiers requis pour faire fonctionner le projet.

5 : symfony console doctrine:database:create :
    Une fois que vous avez rempli le fichier env.local, lancez dans votre terminal à la racine du projet 
    “doctrine:database:create” en y entrant le nom que vous avez choisi pour votre base de donnée qui se 
    trouve dans le env.local.

6 : symfony console doctrine:migrations:migrate :
    Une fois que la base de donnée est créée, lancez dans votre terminal à la racine du projet 
    “doctrine:migrations:migrate” pour remplir la base de données de ses tables.

7 : yarn encore dev :
	lancez dans votre terminal à la racine du projet “yarn encore dev” pour mettre
	à jour votre build et les fichiers de style, ainsi que les images du projet.

8 : symfony server:start :
	enfin, lancez “symfony server:start” pour ouvrir votre localhost dans votre
	navigateur.
	
Contact

Ali Nedjar : https://github.com/AliNedjar
Arnaud Pilato : https://github.com/arnaudpilato
Benjamin Deboise :  https://github.com/BenjaminDbse
Loïc Chenuet : https://github.com/ChenuetLoic
Sandra Louchart : https://github.com/Sandra-Louchart


