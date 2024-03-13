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
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->integer("user_id");
                $table->string("name");
                $table->string("career");
                $table->string("linkedin");
                $table->string("gmail");
                $table->string("github");
                $table->string("contact");
                $table->string("profile");
                $table->string("skills");
                $table->string("education");
                $table->string("career_content");
                $table->string('reference');
                $table->string('avatar')->default('default.jpg');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
