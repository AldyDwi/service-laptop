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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('service_categories')->onDelete('cascade');
            $table->string('laptop_brand');
            $table->string('laptop_type');
            $table->text('problem_description');
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak', 'Diproses', 'Selesai', 'Dibayar'])->default('Menunggu');
            $table->date('booking_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
