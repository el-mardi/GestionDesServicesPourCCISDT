<?php

namespace Database\Seeders;

use App\Models\JuridiqueForme;
use Illuminate\Database\Seeder;

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
 
      
    }
}
