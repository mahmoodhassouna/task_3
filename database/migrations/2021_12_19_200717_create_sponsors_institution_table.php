<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors_institution', function (Blueprint $table) {
            $table->id();

            $table->string('sponsor_number',50)->unique();
            $table->date('entry_date',50);
            //$table->foreignId('user_id')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('countrys', 'id')->nullOnDelete();
            $table->string('name',50);
            $table->string('address',50);
            $table->string('contact_person',50);
            $table->string('phone',10);
            $table->string('email',50);
            $table->string('phone2',10)->nullable();
            $table->string('sponsor_type',15)->nullable();
            $table->string('user_id',40);
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
        Schema::dropIfExists('sponsors_institution');
    }
}
