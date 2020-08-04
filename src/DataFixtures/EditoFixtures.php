<?php

namespace App\DataFixtures;

use App\Entity\Edito;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EditoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $edito = new Edito();
        $edito->setTitre("Wilkommen, bienvenue, 
        welcome !");
        $edito->setContenu("<p>Et tout d'abord, bienvenue sur notre toute nouvelle <b>bibliothèque collaborative de scénarios</b> de jeux de rôles.
    Je cherchais depuis longtemps un site ou puiser de l'inspiration, mais sans jamais trouver exactement ce que je souhaitais.
        Ayant la chance de maitriser quelques outils de création web, je me suis dit <em>\"Pourquoi ne pas le faire toi-même ?\"</em>
    </p>
    <p>Du coup c'est vrai, ce site s'adresse en priorité aux maîtres du jeu. L'idée est pour toi d'accéder à une bibliothèque de scénarios classés par jeu (mais pas que).
    Tous ces scénarios sont en fait issus de l'imagination débordante d'autres MJ, comme toi. Une fois inscrit, tu pourras d'ailleurs toi aussi alimenter cette bibliothèque en y déposant tes scénarios.</p>
    <p><b>L'idée c'est le partage.</b> Tu as des jeux de prédilection, des scénarios remplis de lieux étranges et de personnages non-joueur fascinant.
    Fais-en profiter les autres. Et ne t'inquiète pas, si tu ne souhaites pas t'inscrire, tu paux quand même consulter tout ce qui est déjà à disposition.</p>
    <p>La bibliothèque comprends deux grandes sections, <b>les scénarios</b> d'une part eux mêmes rangés par jeux de rôles et d'autre-part <b>les aides de jeu</b> (eux aussi classés par JDR) et catégorisés en PNJ ou Lieux.<br>
    Pour favoriser une certaine cohérence, tu disposeras de templates pour créer tes scénarios et tes aides de jeu. Je tacherai d'améliore tout ça au fil du temps et de vos remarques constructives ;)</p>
    <p>En attendant, have fun!</p>");
        $manager->persist($edito);

        $manager->flush();
    }
}
