<?php

use App\Models\Livro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('livros',function(Blueprint $table){
            $table->string('isbn',20)->nullable();
            $table->integer('paginas');
            $table->integer('ano');
            $table->integer('edicao');
        });

        Livro::create(['titulo'=>'Aprenda Eletrônica com Arduino','subtitulo'=>'Um guia ilustrado de eletrônica para iniciante','isbn'=>'978-85-7522-667-7','paginas'=>351,'ano'=>2018,'edicao'=>1]);
        Livro::create(['titulo'=>'Scrum','subtitulo'=>'Guia prático para projetos ágeis','isbn'=>'978-85-7522-441-0','paginas'=>198,'ano'=>2015,'edicao'=>2]);
        Livro::create(['titulo'=>'Interação Humano-Computador','isbn'=>'978-85-352-3418-3','paginas'=>384,'ano'=>2010,'edicao'=>1]);
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('livros',function(Blueprint $table){
            $table->dropColumn('isbn');
            $table->dropColumn('paginas');
            $table->dropColumn('ano');
            $table->dropColumn('edicao');
        });
    }
}
