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
        Schema::create('prompt_generate_results', function (Blueprint $table) {
            $table->id();
            $table->string('url', 1024)->nullable(false)->comment('result url');
            $table->foreignIdFor(\App\Models\PromptGenerate::class)
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
        Schema::dropIfExists('prompt_generate_results');
    }
};
