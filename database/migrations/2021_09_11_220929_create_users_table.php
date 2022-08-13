<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name_school');
            $table->string('address');
            $table->integer('postal_code');
            $table->string('phone_school');
            $table->string('email_school', 120)->unique();
            $table->enum('type', ['PRIVADA', 'PUBLICA']);
            $table->string('director1');
            $table->string('director2');
            $table->enum('first_time_school', ['SI', 'NO']);
            $table->enum('sede', ['SI', 'NO'])->default('NO');
            $table->enum('download', ['Y', 'N'])->default('N');
            $table->enum('download_enter', ['0', '1'])->default('0');
            $table->integer('download_level')->default('0');
            $table->enum('download_correction', ['Y', 'N'])->default('N');
            $table->enum('userType', ['Colegio', 'Admin'])->default('Colegio');

            //relaciones

            $table->foreignId('province_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('region_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
