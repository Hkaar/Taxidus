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
        if (!Schema::hasTable('roles')) {
            Schema::create("roles", function (Blueprint $table) {
                $table->id();
                $table->string("name")->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('user_roles')) {
            Schema::create("user_roles", function (Blueprint $table) {
                $table->id();
                $table->foreignId("user_id")->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('data_types')) {
            Schema::create('data_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('entity_types')) {
            Schema::create('entity_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('object_types')) {
            Schema::create('object_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('objects')) {
            Schema::create('objects', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->foreignId('object_type_id')->constrained('object_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->double('weight');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('object_data')) {
            Schema::create('object_data', function (Blueprint $table) {
                $table->id();
                $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('name');
                $table->text('value');
                $table->foreignId('data_type_id')->constrained('data_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('entity_roles')) {
            Schema::create('entity_roles', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('entities')) {
            Schema::create('entities', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->text('desc');
                $table->foreignId('role_id')->constrained('entity_roles')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('entity_inventory')) {
            Schema::create('entity_inventory', function (Blueprint $table) {
                $table->id();
                $table->foreignId('entity_id')->constrained('entities')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete()->cascadeOnUpdate();
                $table->double('drop_rate');
                $table->integer('amount');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('entity_data')) {
            Schema::create('entity_data', function (Blueprint $table) {
                $table->id();
                $table->foreignId('entity_id')->constrained('entities')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('data_type_id')->constrained('data_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('name');
                $table->text('value');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('biomes')) {
            Schema::create('biomes', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('biome_entities')) {
            Schema::create('biome_entities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('biome_id')->constrained('biomes')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('entity_id')->constrained('entities')->cascadeOnDelete()->cascadeOnUpdate();
                $table->double('encounter_rate');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('biome_objects')) {
            Schema::create('biome_objects', function (Blueprint $table) {
                $table->id();
                $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('biome_id')->constrained('biomes')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('game_sessions')) {
            Schema::create('game_sessions', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('code')->unique();
                $table->string('password')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('session_data')) {
            Schema::create('session_data', function (Blueprint $table) {
                $table->id();
                $table->foreignId('session_id')->constrained('game_sessions')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('name');
                $table->text('value');
                $table->foreignId('data_type_id')->constrained('data_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('session_roles')) {
            Schema::create('session_roles', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('session_players')) {
            Schema::create('session_players', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('session_id')->constrained('game_sessions')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('role_id')->constrained('session_roles')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('player_stats')) {
            Schema::create('player_stats', function (Blueprint $table) {
                $table->id();
                $table->foreignId('player_id')->constrained('session_players')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('name');
                $table->text('value');
                $table->foreignId('data_type_id')->constrained('data_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('player_inventory')) {
            Schema::create('player_inventory', function (Blueprint $table) {
                $table->id();
                $table->foreignId('player_id')->constrained('session_players')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete()->cascadeOnUpdate();
                $table->integer('amount');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('player_data')) {
            Schema::create('player_data', function (Blueprint $table) {
                $table->id();
                $table->foreignId('player_id')->constrained('session_players')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('name');
                $table->text('value');
                $table->foreignId('data_type_id')->constrained('data_types')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('session_biomes')) {
            Schema::create('session_biomes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('biome_id')->constrained('biomes')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('session_id')->constrained('game_sessions')->cascadeOnDelete()->cascadeOnUpdate();
                $table->double('coverage');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('session_objects')) {
            Schema::create('session_objects', function (Blueprint $table) {
                $table->id();
                $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('session_id')->constrained('game_sessions')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_objects');
        Schema::dropIfExists('session_biomes');
        Schema::dropIfExists('player_data');
        Schema::dropIfExists('player_inventory');
        Schema::dropIfExists('player_stats');
        Schema::dropIfExists('session_players');
        Schema::dropIfExists('session_roles');
        Schema::dropIfExists('session_data');
        Schema::dropIfExists('game_sessions');
        Schema::dropIfExists('biome_objects');
        Schema::dropIfExists('biome_entities');
        Schema::dropIfExists('biomes');
        Schema::dropIfExists('entity_data');
        Schema::dropIfExists('entity_inventory');
        Schema::dropIfExists('entities');
        Schema::dropIfExists('entity_roles');
        Schema::dropIfExists('object_data');
        Schema::dropIfExists('objects');
        Schema::dropIfExists('object_types');
        Schema::dropIfExists('entity_types');
        Schema::dropIfExists('data_types');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('roles');
    }
};
