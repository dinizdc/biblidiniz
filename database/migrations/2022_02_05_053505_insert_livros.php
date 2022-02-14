<?php

use App\Models\Livro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Livro::create(['titulo'=>'Qualidade de Software','subtitulo'=>'Aprenda as metodologias e técnicas mais modernas para o desenvolvimento de software','isbn'=>'978-85-7522-112-9','paginas'=>395,'ano'=>2015,'edicao'=>2]);
        // Livro::create(['titulo'=>'O projeto do Projeto da modelagem à realização','subtitulo'=>'Ensaios de um cientista da Computação','isbn'=>'978-85-7522-667-7','paginas'=>407,'ano'=>2010,'edicao'=>1]);
        // Livro::create(['titulo'=>'O Mítico Homem-Mês','subtitulo'=>'Ensaios sobre Engenharia de Software','isbn'=>'978-85-352-3487-9','paginas'=>300,'ano'=>2009,'edicao'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
