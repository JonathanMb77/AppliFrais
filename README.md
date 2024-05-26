# ApplisFrais

Application web de gestion des frais du laboratoire GSB.

## Déploiement local
Executer les scripts `sql` puis servir le dossier `www` par un serveur web (apache).

Pour éxecuter les scripts, il faudra lancer le `cmd`et se rendre à l'emplacement ou le site se situe en tapant `cd chemin_du_site`.

Taper ensuite `mysql -u root -p` sans mdp pour vous connecter à MariaDB et poursuivez en tapant `source gsbfrais_bduser.sql`. Enchainez avec `source gsbfrais_structure.sql` puis `source gsbfrais_data.sql`.

 Bravo ! Vous pouvez maintenant acceder à l'application AppliFrais.

## Mise en production
On veillera à changer le mot de passe de l'utilisateur `sql` dans `ScriptsSQL/gsbfrais_bduser.sql` et dans le fichier `config.php`.

Seul le dossier `www` doit être servi par le serveur web.