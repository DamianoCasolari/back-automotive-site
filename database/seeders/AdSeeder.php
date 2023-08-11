<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = config("db.cars");
        foreach ($cars as $key => $car) {
            // USED TO RETRIEVE NEXT ID THAT WILL BE USED
            $statement = DB::select("SHOW TABLE STATUS LIKE 'ads'");
            $nextId = $statement[0]->Auto_increment;

            $newCar = new Ad();
            $newCar->user_id = 1;
            $newCar->name = $car["name"];
            $newCar->slug = Ad::generateSlug($car["name"]) . "-" . $nextId;
            $newCar->cover_image = $car["cover_image"];
            $newCar->price = $car["price"];
            $newCar->km = $car["km"];
            $newCar->date_of_enrollment = $car["date_of_enrollment"];
            $newCar->brand = $car["brand"];
            $newCar->model = $car["model"];
            $newCar->fuel_type = $car["fuel_type"];
            $newCar->transmission = $car["transmission"];
            $newCar->engine_displacement = $car["engine_displacement"];
            $newCar->color = $car["color"];
            $newCar->car_doors_number = $car["car_doors_number"];
            $newCar->description = $car["description"];
            $newCar->save();
        }
    }
}
