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
        Schema::create('prompts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256)->nullable(false)->comment('제목');
            $table->text('description')->nullable(false)->comment('설명');
            $table->text('template')->nullable(false)->comment('prompt 탬플릿');

            $table->foreignIdFor(\App\Models\User::class)
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompts');
    }
};
