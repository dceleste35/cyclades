<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('numero_candidat')->unique();
            $table->string('numero_inscription')->unique();
            $table->string('nom_famille');
            $table->string('nom_usage')->nullable();
            $table->string('prenoms');
            $table->date('date_naissance');
            $table->enum('sexe', ['M', 'F']);
            $table->string('ine')->unique();
            $table->string('nationalite');
            $table->string('pays_naissance');
            $table->boolean('allophone')->default(false);
            $table->string('qualification_presentee');
            $table->string('examen');
            $table->string('enseignement_specialite');
            $table->string('section_langue');
            $table->string('langue_section');
            $table->boolean('parcours_bfi')->default(false);
            $table->boolean('parcours_bfi_premiere')->default(false);
            $table->string('section_langue_premiere');
            $table->string('dnl_selo');
            $table->string('etat');
            $table->boolean('candidature_validee')->default(false);
            $table->boolean('discipline_eloignee')->default(false);
            $table->string('categorie_candidat');
            $table->string('categorie_candidat_premiere');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canditates');
    }
};
