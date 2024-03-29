<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
            $table->string("fullname");
            $table->string("username")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("image")->default("image/user/default-avatar.png"); // kasih gambar avatar
            $table->decimal("balance", 16)->default(0);
            $table->string("bio")->default("");
            $table->string("join_date")->default(Carbon::now()->format("d F Y"));
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
};
