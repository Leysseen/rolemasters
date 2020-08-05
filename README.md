# rolemasters
app symfony de gestion de scénarios

Le site du MJ en quête d'inspiration.
Chaque MJ peut déposer un ou plusieurs scènario pour jeux de rôles. Il peut également consulter les scénarios déposés par les autres MJ.
Chaque scènario est catégorisé par plusieurs critères dont le principal et obligatoire est le nom du jeu de rôle.
Les autres critères servent à affiner la recherche :
  - Nombre de joueurs préconisé
  - Difficulté (niveau des personnages)
  - Tags (mots clés)

Pour compléter les informations des scénarios le MJ peut également déposer des aides de jeu, feuilles de PNJ ou notes de lieux. 
Les aides de jeu peuvent être utilisés indépendemment des scénario auxquels ils sont rattachés.
Un Mj peut réutiliser une aide de jeu pour un scénarion qu'il dépose, l'aide de jeu est alors "attachée" à plusieurs scénarios.

Le site est consultable par tout le monde, mais les éléments téléchargeables ne le sont que pour les membres inscrits.

## Les utilisateurs
C'est un CRUD
On distingue trois catégories d'utilisateurs. 
  - Les invités, qui ne sont pas identifés et qui ne peuvent que consulter la scénariothèque
  - Les MJ, qui sont inscrits sur le site et peuvent consulter, déposer et télécharger sur la scénariothèque
  - Les Administrateurs, qui peuvent fate la même chose que les MJ mais peuvent en plus gérer les utilisateurs et modérer le site

## Les scénarios
C'est un CRUD
Ils ont un auteur qui est le MJ qui les a déposés (OneToMany). Ils ne peuvent être supprimés que par ce MJ ou un Administrateur.
Ils ne peuvent être supprimés définitivement que par les Administrateurs. Avant d'être définitivement supprimé, un scénario est "mis à la corbeille".

## Les aides de jeu
Elles sont de trois sortes :
  - Les personnages (entité)
  - Les lieux (entité)
  - Les cartes (entité)

Chaque aide est d'abord rattaché à un "scénario d'origine" (ManyToMany). Elle peut être ensuite rattachée à d'autres scénarios.
Chaque aide de jeu est téléchargeable aux formats pdf, jpg, png. Par ailleurs la relation devrait être ManyToMany avec attribut car on peut imaginer qu'il pourrit y avoir plusieurs occurences du PNJ "Gardes ARES"... ou "Gobelins", en base nous n'avson qu'une seule entrée, mais en entité 3 occurences de l'objet.

## Les PDF
Si possible établir des templates twig puis les transformer en pdf une fois les variables remplies.
```PHP
$content->renderView('templatePDF.html.twig')...
```
## Entités
A première vue...
  - User: firstname, lastname, email, creationDate, login, passwd
  - Auth: level
  - jdr: nom
  - Scenario: titre, pitch, published, createdAt, modifiedAt
  - Scene: titre, rang, contenu
  - Personnage: nom, caracteristiques, competences, background
  - lieux: nom, description, contexte
  - Illustration: URL, alt, type(scenario, scene, personnage, lieux)
  - Commentaire: commentaire, createdAt, published
  - Complement: auteur, contenu, type(personnage, lieux)
  - Document: titre, type(pdf,xlsx,docx,txt,rtf,odt,ods), URL

Liaisons...
  - scenario ManyToOne user             v
  - user ManyToOne auth                 v
  - scenario ManyToOne jdr              v
  - scene ManyToOne scenario            v
  - illustration ManyToOne scenario
  - illustration ManyToOne scene
  - personnage ManyToMany scenario      v
  - personnage ManyToOne jdr            v
  - personnage ManyToOne user           v
  - lieux ManyToOne user                v
  - lieux ManyToMany scenario           v
  - lieux ManyToOne jdr                 v
  - illustration ManyToOne personnage
  - illustration ManyToOne lieux
  - commentaire ManyToOne scenario
  - complement ManyToOne personnage
  - complement ManyToOne lieux
  - documents ManyToOne scenario
