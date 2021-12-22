<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors_personal', function (Blueprint $table) {

            $table->id();

            $table->string('sponsor_number',50)->unique();
            $table->string('id_number',50)->unique();
            $table->date('entry_date',50);
           // $table->foreignId('user_id')->nullable()->constrained('users', 'id')->nullOnDelete();


            $table->string('name',20);
            $table->string('user_id',40);
            $table->string('mname',20);
            $table->string('gname',20)->nullable();
            $table->string('lname',20);

            $table->foreignId('governorate_id')->nullable()->constrained('governorates', 'id')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('citys', 'id')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts', 'id')->nullOnDelete();
            $table->foreignId('nationalitie_id')->nullable()->constrained('nationalities', 'id')->nullOnDelete();
            $table->foreignId('countrie_residence_id')->nullable()->constrained('countries_residence', 'id')->nullOnDelete();

            $table->string('address',70);
            $table->string('telii_phone',9)->nullable();
            $table->string('phone',10);
            $table->string('email',40);
            $table->enum('id_type',['هوية','جواز سفر']);

            $table->string('sponsor_type',15)->nullable();
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
        Schema::dropIfExists('sponsors_personal');
    }
}
