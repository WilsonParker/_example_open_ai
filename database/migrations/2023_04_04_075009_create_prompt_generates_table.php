<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prompt_generates', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Prompt::class)
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignIdFor(\App\Models\User::class)
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamp('expired_at')->nullable(false)->comment('result expired at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompt_generates');
    }
};
