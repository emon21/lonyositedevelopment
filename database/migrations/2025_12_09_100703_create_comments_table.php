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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('blog_id')->constrained()->onDelete('cascade');
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // comment user
            // $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // for reply
            // $table->text('content');

            $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            //$table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();  // modern way instead of onDelete('set null')

            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');
            $table->text('comment');
        
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
