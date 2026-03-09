# Formulaire de contact — le mail n’arrive pas

## 1. Vérifier que le script est bien sur le serveur

Sur le serveur OVH, dans `~/www/` il doit y avoir :
- **send-mail.php**
- **vendor/** (dossier complet avec PHPMailer, après `composer install`)

Sans ces éléments, le formulaire ne peut pas envoyer de mail.

## 2. Configurer les identifiants dans send-mail.php

Sur le serveur, éditez `~/www/send-mail.php` et renseignez en haut du fichier :

- **SMTP_USERNAME** : l’adresse Microsoft 365 qui envoie (ex. `contact@dost-audit.fr`)
- **SMTP_PASSWORD** : le mot de passe de cette boîte

Si ces deux lignes sont vides, le script renverra une erreur claire dans le formulaire après envoi.

## 3. Compte Microsoft 365 avec double authentification (MFA)

Si la boîte a l’authentification à deux facteurs :

1. Allez sur https://account.microsoft.com/security
2. Créez un **mot de passe d’application**
3. Utilisez **ce mot de passe** (et non celui de connexion) dans **SMTP_PASSWORD** dans `send-mail.php`

## 4. Vérifier les erreurs affichées

Après avoir déployé les dernières modifications :

- En cas de **mauvaise config** : un message d’erreur s’affiche sous le formulaire (ex. « adresse e-mail ou mot de passe SMTP non configurés »).
- En cas d’**échec SMTP** : le message indiquera l’erreur renvoyée par le serveur (ex. « Authentication failed »).

Utilisez ces messages pour corriger la configuration ou le mot de passe.

## 5. Vérifier les spams

Les mails du formulaire peuvent arriver dans les **courrier indésirable**. Vérifiez le dossier spam de **contact@dost-audit.fr**.
