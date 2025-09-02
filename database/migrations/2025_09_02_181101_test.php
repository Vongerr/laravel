<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $table = 'finance';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('hash', 32);
            $table->string('budget_category', 20);
            $table->string('category', 20);
            $table->string('date', 10);
            $table->string('time', 5);
            $table->string('datetime', 16);
            $table->string('username', 30);
            $table->float('money', 14);
            $table->float('bank', 10);
            $table->float('comment', 250);
            $table->tinyInteger('exclusion', 1);
            $table->timestamps();
            $table->index('category', "ix_{$this->table}_category");
            $table->index('budget_category', "ix_{$this->table}_budget_category");
            $table->index('date', "ix_{$this->table}_date");
            $table->index('username', "ix_{$this->table}_username");
            $table->index('bank', "ix_{$this->table}_bank");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finance');
    }
};
