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
        Schema::create('item_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id");
            $table->enum("type",["in","out"]);
            $table->integer("quantity");
            $table->integer("balance");
            $table->integer("new_balance");
            $table->foreign("item_id")->references("id")->on("items")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_history');
    }
};
