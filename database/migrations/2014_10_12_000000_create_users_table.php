<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table ->integer("role")
                   ->default(1)
                 ->comment("0=admin,1=user");
            $table->string('address');
            $table->string('gender');
            $table->rememberToken();
            $table->timestamps();
        });

        User::firstOrCreate([
            "name" => 'Arvind admin' ,
            "email" => 'arvindsinghsikarwar52@gmail.com',
            "password" => '$2y$10$LmfZrEK20l5txdxMa3hKMONpc3kPonbiFAzXsXxEfKwaY/q/Z4qpG',
            "role" => "0",
            "address" => "Gwalior",
            "gender" => "male",
        ]);

       /* User::firstOrCreate([
            'name' => 'Dev',
            'email' => 'dev123@gmail.com',
            'password' => '$2y$10$LmfZrEK20l5txdxMa3hKMONpc3kPonbiFAzXsXxEfKwaY/q/Z4qpG',
            'role'  => '1',
            'address' => 'Gwalior',
            'gender' => 'male',
        ]);*/
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
};
