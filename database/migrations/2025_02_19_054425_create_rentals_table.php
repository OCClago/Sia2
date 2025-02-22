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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cutomer_id");
            $table->date("return_date");
            $table->double("total_price");
            $table->double("deposit");
            $table->double("penalty");
            $table->enum("status", ['pending', 'return']);
            $table->enum("paystatus", ['paid', 'unpaid']);
            $table->integer("user_id");

            $table->foreign("id")->references("id")->on("customers")->onDelete("cascade")->onUpdate("cascade");
            


























            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
