<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_municipality', function (Blueprint $table) {
            $table->id('municipality_id')->uniqid;
            $table->integer('province_id')->default(0);
            $table->string('municipality_name')->nullable();
            $table->timestamps();
        });

        // Provinces 1 to 10

        // Provinces 1 to 10

        DB::table('tbl_municipality')->insert([
            // Province 1: Metro Manila (NCR)
            ['province_id' => 1, 'municipality_name' => 'Caloocan City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Las Piñas City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Makati City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Malabon City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Mandaluyong City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Manila City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Marikina City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Muntinlupa City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Navotas City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Parañaque City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Pasay City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Pasig City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Quezon City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'San Juan City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Taguig City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 1, 'municipality_name' => 'Valenzuela City', 'created_at' => now(), 'updated_at' => now()],

            // Province 2: Abra
            ['province_id' => 2, 'municipality_name' => 'Bangued', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Boliney', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Bucay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Bucloc', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Daguioman', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Danglas', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Dolores', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'La Paz', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Lacub', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Lagangilang', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Lagayan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Langiden', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Licuan-Baay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Luba', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Malibcong', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Manabo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Peñarrubia', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Pidigan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Pilar', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Sallapadan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'San Isidro', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'San Juan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'San Quintin', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Tayum', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Tineg', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Tubo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 2, 'municipality_name' => 'Villaviciosa', 'created_at' => now(), 'updated_at' => now()],

            // Province 3: Apayao
            ['province_id' => 3, 'municipality_name' => 'Calanasan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Conner', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Flora', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Kabugao', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Luna', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Pamplona', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Pudtol', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 3, 'municipality_name' => 'Santa Marcela', 'created_at' => now(), 'updated_at' => now()],

            // Province 4: Benguet
            ['province_id' => 4, 'municipality_name' => 'Atok', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Bakun', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Bokod', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Buguias', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Bauko', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Kapangan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Kibungan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'La Trinidad', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Mankayan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Sablan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 4, 'municipality_name' => 'Tublay', 'created_at' => now(), 'updated_at' => now()],

            // Province 5: Ifugao
            ['province_id' => 5, 'municipality_name' => 'Aguinaldo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Alfonso Lista', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Asipulo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Banaue', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Hingyon', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Hungduan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Kiangan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Lagawe', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Mayoyao', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 5, 'municipality_name' => 'Tinoc', 'created_at' => now(), 'updated_at' => now()],

            // Province 6: Kalinga
            ['province_id' => 6, 'municipality_name' => 'Balbalan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Lubuagan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Pasil', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Pinukpuk', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Rizal', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Tanudan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 6, 'municipality_name' => 'Tinglayan', 'created_at' => now(), 'updated_at' => now()],

            // Province 7: Mountain Province
            ['province_id' => 7, 'municipality_name' => 'Bauko', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Besao', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Bontoc', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Natonin', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Paracelis', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Sabangan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Sadanga', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Sagada', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 7, 'municipality_name' => 'Tadian', 'created_at' => now(), 'updated_at' => now()],

            // Province 8: Ilocos Norte
            ['province_id' => 8, 'municipality_name' => 'Adams', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Bacarra', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Badoc', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Bangui', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Banna', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Burgos', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Carasi', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Currimao', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Dingras', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Dumalneg', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Laoag City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Marcos', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Nueva Era', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Pagudpud', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Paoay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Pasuquin', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Pinili', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'San Nicolas', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Sarrat', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Solsona', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 8, 'municipality_name' => 'Vintar', 'created_at' => now(), 'updated_at' => now()],

            // Province 9: Ilocos Sur
            ['province_id' => 9, 'municipality_name' => 'Alilem', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Banayoyo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Bantay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Burgos', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Cabugao', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Candon City', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Caoayan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Cervantes', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Galimuyod', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Gregorio del Pilar', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Lidlidda', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Magsingal', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Nagbukel', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Narvacan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Quirino', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Salcedo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'San Emilio', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'San Esteban', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'San Ildefonso', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'San Juan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'San Vicente', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santa', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santa Catalina', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santa Cruz', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santa Lucia', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santa Maria', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Santiago', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Sigay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Sinait', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Sugpon', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Suyo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 9, 'municipality_name' => 'Tagudin', 'created_at' => now(), 'updated_at' => now()],

            // Province 10: La Union
            ['province_id' => 10, 'municipality_name' => 'Agoo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Aringay', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Bacnotan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Bagulin', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Balaoan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Bangar', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Bauang', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Burgos', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Caba', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Luna', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Naguilian', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Pugo', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Rosario', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'San Gabriel', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'San Juan', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Santo Tomas', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Santol', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Sudipen', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => 10, 'municipality_name' => 'Tubao', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
