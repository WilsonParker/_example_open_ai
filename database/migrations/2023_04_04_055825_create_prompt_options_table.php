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
        Schema::create('prompt_options', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->nullable(false)->comment('옵션 이름');

            $table->foreignIdFor(\App\Models\Prompt::class)
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
        Schema::dropIfExists('prompt_options');
    }
};
