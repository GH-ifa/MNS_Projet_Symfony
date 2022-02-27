# Les différentes sections

## Films
La page /films affiche les films suivant leur status (à l'affiche ou prochaines sorties), triés par leur nombre de séances (j'ai considéré que les films étant les plus programmés sont les plus populaires donc à mettre en premier)

Cette liste affiche quelques données du film ainsi que la prochaine séance dispo s'il y en a une.

Elle permet aussi d'accéder à la page de détail du film.

## Séances
La page /seances affiche les séances des 10 prochains jours pour chaque film, par jour, s'il y en a.

En plus de l'horaire de la séance, il est affiché si celle-ci se passe en VF, VO, VOST, j'affiche aussi si la salle correspondante est accessible aux fauteuils roulants (plutôt que d'afficher le nom, moins pertinent)

## Film
La page /film/id affiche les infos données sur un film ainsi que toutes les prochaines séances correspondantes (triées par date) avec l'info sur la salle liée

## Admin
La page /admin est accessible seulement aux administrateurs connectés et renvoie vers la page de /login si l'on n'est pas connecté (elle permet aussi d'enregistrer un nouvel admin)

C'est là qu'on accède à la création / modification / suppression des films / séances / salle / genre
(J'ai utilisé easyadmin mais mes anciens fichiers de CRUD de mes classes et formulaires sont toujours présents dans le projet)

# Fixtures

J'ai créé quelques fixtures pour peupler la base de données, à lancer avec la commande `php bin/console doctrine:fixtures:load`

Elle charge :
- un utilisateur du nom de "admin" avec le pass "123456"
- 8 genres
- une douzaine de films
- 5 salles
- une 50aine de séances entre le 1 mars et 17 mars
