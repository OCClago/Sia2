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
        Schema::create('rental_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rental_id");
            $table->unsignedBigInteger("package_id");
            $table->unsignedBigInteger("item_id");
            $table->integer("rquantity");
            $table->enum("rtype", ["item","package"]);
            $table->enum("rstatus", ["rented","return","lost","damege"]);
            $table->foreign("rental_id")->references("id")->on("rentals")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("package_id")->references("id")->on("packages")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("item_id")->references("id")->on("items")->onDelete("cascade")->onUpdate("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_details');
    }
};
