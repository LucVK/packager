<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_memberships', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('club_member_id');
            $table->foreign('club_member_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('canteen_team_id');
            $table->foreign('canteen_team_id')->references('id')->on('canteen_teams')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->integer('status')->default(0);
            $table->string('marking')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_memberships');
    }
};
