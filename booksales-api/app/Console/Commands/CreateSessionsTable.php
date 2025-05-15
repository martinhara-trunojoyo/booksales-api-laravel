<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Command
{
    protected $signature = 'sessions:create';
    protected $description = 'Create the sessions table for database session driver';

    public function handle()
    {
        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->text('payload');
                $table->integer('last_activity')->index();
            });

            $this->info('Sessions table created successfully!');
        } else {
            $this->info('Sessions table already exists!');
        }
    }
}
