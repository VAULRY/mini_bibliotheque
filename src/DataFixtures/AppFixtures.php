<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use App\Entity\Livre;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Ajout de plusieurs auteurs
        $auteurs = [
            ['nom' => 'Hugo', 'prenom' => 'Victor'],
            ['nom' => 'Zola', 'prenom' => 'Émile'],
            ['nom' => 'Flaubert', 'prenom' => 'Gustave']
        ];

        foreach ($auteurs as $data) {
            $auteur = new Auteur();
            $auteur->setNom($data['nom']);
            $auteur->setPrenom($data['prenom']);
            $manager->persist($auteur);

            // Ajout d'un livre associé à cet auteur
            
            $livre = new Livre();
            $livre->setTitre("Livre de " . $data['nom']);
            $livre->setAnnee(rand(1800, 1900));
            $livre->setAuteur($auteur);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}