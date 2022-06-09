<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Fonctionnaire;
use App\Models\JuridiqueForme;
use Illuminate\Database\Seeder;
use App\Models\TypesIntervention;
use Illuminate\Support\Facades\Hash;

class CreateJuridiqueFormeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JuridiqueForme::create([
            'code_forme' => 'PP',
            'formeJur' => 'PERSONNE PHYSIQUE',
        ]);

        JuridiqueForme::create([
            'code_forme' => 'SA',
            'formeJur' => 'SOCIETE ANONYME',
        ]);

        JuridiqueForme::create([
            'code_forme' => 'SARL',
            'formeJur' => 'SOCIETE A RESPONSABILITE LIMITEE',
        ]);

        JuridiqueForme::create([
            'code_forme' => 'SARL AU',
            'formeJur' => 'SOCIETE A RESPONSABILITE LIMITEE A ASSOCIE UNIQUE',
        ]);

        JuridiqueForme::create([
            'code_forme' => 'SAS',
            'formeJur' => 'SOCIETE ANONYME SIMPLIFIEE',
        ]);

        JuridiqueForme::create([
            'code_forme' => 'SCS',
            'formeJur' => 'SOCIETE EN COMMANDITE SIMPLE',
        ]);
 
        JuridiqueForme::create([
            'code_forme' => 'SCA',
            'formeJur' => 'SOCIETE EN COMMANDITE PAR ACTIONS',
        ]);
        JuridiqueForme::create([
            'code_forme' => 'SP',
            'formeJur' => 'SOCIETE EN PARTICIPATION',
        ]);
 
        JuridiqueForme::create([
            'code_forme' => 'SNC',
            'formeJur' => 'SOCIETE EN NOM COLLECTIF',
        ]);
 
        JuridiqueForme::create([
            'code_forme' => 'AE',
            'formeJur' => 'AUTO ENTREPRENEUR',
        ]);
        JuridiqueForme::create([
            'code_forme' => 'COOP',
            'formeJur' => 'COOPERATIVE',
        ]);
 
      Fonctionnaire::create([
        'username' => 'FirstAdmin',
        'nom' => 'admin',
        'prenom' => 'admin',
        'mot_de_passe' => Hash::make('123456789'),
        'cin' => 'SANS',
        'sexe' => 'H',
        'admin' => '1',
      ]);

      TypesIntervention::create([
        'type' => 'ACCOMPAGNEMENT',
        'code_type' => 'ACC DSR',
        'remarque' => '',
      ]);

      TypesIntervention::create([
        'type' => 'ORIENTATION',
        'code_type' => 'OR DSR',
        'remarque' => '',
      ]);

      TypesIntervention::create([
        'type' => 'DOCUMENTS',
        'code_type' => 'DOC DSR',
        'remarque' => '',
      ]);

      Service::create([
        'code_service' => 'CO',
        'service' => "CERTIFICAT D'ORIGINE",
        'description' => '...',
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'CP-AE',
        'service' => 'CARTE PROFESSIONNELLE AUTO-ENTREPRENEUR',
        'description' => "CARTE PROFESSIONNELLE POUR L'AUTO-ENTREPRENEUR",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'CP-PP/CP-PM',
        'service' => 'CARTE PROFESSIONNELLE PERSONNE PHYSIQUE & MORALE',
        'description' => "CARTE PROFESSIONNELLE POUR LES PERSONNES PHYSIQUE & MORALE",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'CP-COOP',
        'service' => 'CARTE PROFESSIONNELLE COOPERATIVE',
        'description' => "CARTE PROFESSIONNELLE POUR LES COOPERATIVES",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'AEX-PP',
        'service' => "ATTESTATION D'EXERCICE PERSONNE PHYSIQUE",
        'description' => "ATTESTATION D'EXERCICE POUR LES PERSONNES PHYSIQUE",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'AEX-AE',
        'service' => "ATTESTATION D'EXERCICE AUTO-ENTREPRENEUR",
        'description' => "ATTESTATION D'EXERCICE POUR L'AUTO-ENTREPRENEUR",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'AEX-SOC',
        'service' => "ATTESTATION D'EXERCICE SOCIETE",
        'description' => "ATTESTATION D'EXERCICE POUR LES SOCIETES",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

      Service::create([
        'code_service' => 'AEX-COOP',
        'service' => "ATTESTATION D'EXERCICE COOPERATIVE",
        'description' => "ATTESTATION D'EXERCICE POUR LES COOPERATIVE",
        // 'periodicite',
        'cible' => '',
        'lieu_prestation' => '',
        'tarif' => '0',
        'ressource_service' => '',
        'etat_service' => '1',
        // 'motif_etat_service',
        'action_communication' => '',
        'remarque' => '',
        'documentation' => '',
        'type_id' => 3,
        'resp_id' => 1,
      ]);

    }
}
