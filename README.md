<p align="center">
  <img src="http://saaspector.com/images/logo.png" width="350" title="hover text">
    </p>

<h2>Ceci est le code de notre projet Laravel: Cheap-e </h2>

<h1>Les étapes à suivre pour faire marcher le site sur un serveur Apache.</h1>

1) Placer le dossier contenant le projet laravel dans le dossier "websites" (ou autre, selon votr paramètrage) de Apache

2) Se connecter à mariadb et crééer la base de données de nom "projettest1"

3) Utiliser la commande "USE projettest1;" et puis source projettest1.sql (cela va créér les tables nécessaire)

4) Toujours sur mariadb, il faut maintenant créer l'utilisateur que notre projet utilise et y donner les droits nécessaires: 

`GRANT ALL PRIVILEGES ON *.* TO 'projettest1_user1'@'localhost' IDENTIFIED BY 'secret'; `

5) Depuis votre terminale linux, accéder au dossier du projet, et y faire les commandes suivants:

```
sudo chown -R $user:www-data storage
sudo chown -R $user:www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

5) Via votre IDE, Run la commande: "composer install"

6) Puis, run la commande: "composer update"

7) Le projet vient avec un fichier .env.example, qu'il faudra renommer en .env. Il faut ensuite remplir ce fichier de la maniere suivante:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projettest1
DB_USERNAME=projettest1_user1
DB_PASSWORD=secret
```

8) Il faut ensuite générer la clé, pour cela on utilise la commande suivante:

 ``` php artisan key:generate ```

9) Le fichier sql est également présent dans /app/db/


<h1>Concernant l'utilisation du site.</h1>

La base de données est mis en place avec deux comptes préexistant, un compte utilisateur de test dont les identifiants sont:

```
user@gmail.com
secret
```

Et aussi un compte administrateur:

```
admin@gmail.com
secret
```
