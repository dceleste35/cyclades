<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Canditate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_candidat' => $this->faker->unique()->numerify('CAND####'),
            'numero_inscription' => $this->faker->unique()->numerify('INS####'),
            'nom_famille' => $this->faker->lastName(),
            'nom_usage' => $this->faker->optional()->lastName(),
            'prenoms' => $this->faker->firstName(),
            'date_naissance' => $this->faker->dateTimeBetween('-20 years', '-15 years'),
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'ine' => $this->faker->unique()->numerify('##########'),
            'nationalite' => $this->faker->country(),
            'pays_naissance' => $this->faker->country(),
            'allophone' => $this->faker->boolean(),
            'qualification_presentee' => $this->faker->randomElement(['BAC', 'BTS', 'CAP']),
            'examen' => $this->faker->word(),
            'enseignement_specialite' => $this->faker->randomElement(['Maths', 'Physique', 'SVT', 'Histoire']),
            'section_langue' => $this->faker->randomElement(['Anglais', 'Espagnol', 'Allemand']),
            'langue_section' => $this->faker->randomElement(['Anglais', 'Espagnol', 'Allemand']),
            'parcours_bfi' => $this->faker->boolean(),
            'parcours_bfi_premiere' => $this->faker->boolean(),
            'section_langue_premiere' => $this->faker->randomElement(['Anglais', 'Espagnol', 'Allemand']),
            'dnl_selo' => $this->faker->word(),
            'etat' => $this->faker->randomElement(['Inscrit', 'En attente', 'Validé']),
            'candidature_validee' => $this->faker->boolean(),
            'discipline_eloignee' => $this->faker->boolean(),
            'categorie_candidat' => $this->faker->word(),
            'categorie_candidat_premiere' => $this->faker->word(),
        ];
    }
}
