<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('dbkey')->index();
            $table->string('dataid')->index();
            $table->jsonb('jsonbdata');
            $table->timestamps();

            $table->string('uniqueid')->storedAs("dbkey || '_' || dataid")->unique();

            // Create PGroonga Extension for PostgreSQL
            DB::statement("CREATE EXTENSION pgroonga;");

            // Create PGroonga INDEX
            $table->index([
                DB::raw('jsonbdata pgroonga_jsonb_ops_v2')
            ], null, 'pgroonga');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        DB::statement("DROP EXTENSION pgroonga;");
    }
};
