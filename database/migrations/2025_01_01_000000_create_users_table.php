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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->unique();
            $table->string('address', 100);
            $table->string('gender', 100);
            $table->string('birth_place', 100);
            $table->string('religion', 100);
            $table->string('major', 100);
            $table->date('birth_date');
            $table->decimal('gpa', 3, 2);
            $table->string('line_id', 100);
            $table->string('instagram', 100);
            $table->longText('motivation');
            $table->longText('strength');
            $table->longText('weakness');
            $table->longText('organization_experience')->nullable();
            $table->longText('committee_experience')->nullable();
            $table->text('portfolio')->nullable();
            $table->text('ktm')->nullable();
            $table->text('grade')->nullable();
            $table->text('skkk')->nullable();
            $table->text('photo')->nullable();
            $table->text('cheats')->nullable();
            $table->string('acceptance')->default('Pending')->nullable()->comment('Pending/Rejected/UUID-Division');
            $table->integer('phase', 0, 0)->default(1)->comment('1:data phase,2:file phase,3:select time,4:after interview');
            $table->uuid('choice_1');
            $table->uuid('choice_2');
            $table->foreign('choice_1')->references('id')->on('divisions')->noActionOnDelete();
            $table->foreign('choice_2')->references('id')->on('divisions')->noActionOnDelete();
            $table->text('project_link_1')->nullable();
            $table->text('project_link_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('sessions');
    }
};
