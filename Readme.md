# Paniers Abandonnes

* This module allow you to send email after a defined time to remember customer they have items in there cart.

* Ce module vous permet d’envoyer un courrier électronique après un délai défini pour rappeler aux clients qu’ils ont des articles dans leur panier.

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is PaniersAbandonnes.
* Activate it in your thelia administration panel

* Copiez ce module directement dans votre répertoire ```<thelia_root>/local/modules/``` et verifier que le nom du module soit PaniersAbandonnes
* Activez le dans votre back office Thelia

### Composer

Add it in your main thelia composer.json file

```
composer require your-vendor/paniers-abandonnes-module:~1.0
```


## Usage

* Directly in your back office, you can set a timer to send the email to the customer. But the best pratice is to set up a cron.
In a terminal, type :
``` crontab -e```
and add this line a the end of your crontab file:
```*/2 * * * * /path/to/php /path/to/Theliadirectory Thelia examiner-paniers-abandonnes >> /path/to/thelia/log/panierabandonnes.log 2>&1```
Save it

* Directement depuis votre back office, vous pouvez programmer un temps pour envoyer les emails à vos clients. Mais le mieux reste de programmer un cron
Dans un terminal, tapez :
``` crontab -e```
Et ajoutez cette ligne à la fin de votre fichier:
```*/2 * * * * /path/to/php /path/to/Theliadirectory Thelia examiner-paniers-abandonnes >> /path/to/thelia/log/panierabandonnes.log 2>&1```
Sauvegarder le.


