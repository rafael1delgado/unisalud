<?php

use App\Models\Commune;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommunes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $iquique = Commune::find(5);
        $iquique->update([
            'latitude' => -20.2159772,
            'longitude' => -70.1468313,
        ]);

        $pica = Commune::find(6);
        $pica->update([
            'latitude' => -20.49124158,
            'longitude' => -69.32915497,
        ]);

        $altoHospicio = Commune::find(7);
        $altoHospicio->update([
            'latitude' => -20.26970134,
            'longitude' => -70.10069561,
        ]);

        $pozoAlmonte = Commune::find(8);
        $pozoAlmonte->update([
            'latitude' => -20.2507767,
            'longitude' => -70.1251825,
        ]);

        $huara = Commune::find(9);
        $huara->update([
            'latitude' => -20.2416331,
            'longitude' => -70.1333774,
        ]);

        $caminha = Commune::find(10);
        $caminha->update([
            'latitude' => -19.311947,
            'longitude' => -69.4327198,
        ]);

        $colchane = Commune::find(11);
        $colchane->update([
            'latitude' => -20.2494923,
            'longitude' => -70.1315449,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
