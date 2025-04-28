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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->boolean('blocked')->default(false);
            $table->boolean('blocked_comment')->nullable();

            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('phone', 30)->nullable();
            $table->string('type', 15)->default('webmaster');

            $table->integer('meecoins')->default(0);
            $table->integer('meecount')->default(0);
            $table->integer('balance_withdrawal')->default(0);
            $table->integer('balance_hold')->default(0);

            $table->integer('balance_referral_hold')->default(0);
            $table->integer('balance_referral')->default(0);

            $table->string('telegram', 30)->nullable();

            $table->longText('about_self')->nullable();
            $table->longText('promo_code');

            $table->foreignId('user_id')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
