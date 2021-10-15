<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'brand_name' => 'Mazda',
            'year_model' => '2005',
            'model_type' => 'L-340',
            'body_type' => 'Minivan',
            'mileage' => '5000',
            'fuel_type' => 'Gasoline',
            'transmission' => 'Manual',
            'drive_type' => 'Front Wheel Drive',
            'color' => 'Red',
            'interior_color' => 'Black',
            'engine' => 'Two-Stroke Engine',
            'vehicle_overview' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat hic voluptatum pariatur ipsam omnis consequatur voluptatibus accusantium ullam atque, alias tempora sunt quae laborum! Blanditiis animi iusto ex voluptas quibusdam!',
            'price' => '259999',
            'thumbnail' => '/storage/images/redthumbnail.jpg',
            'image' => '[
                /storage/images/red1.jpg,
                /storage/images/red2.jpg,
                /storage/images/red3.jpg,
                /storage/images/red4.jpg,
                /storage/images/red5.jpg,
                /storage/images/red6.jpg,
                /storage/images/red7.jpg,
                /storage/images/red8.jpg,
                /storage/images/red9.jpg,
                /storage/images/red10.jpg,
            ]',
            'status' => 'Available'
        ]);
    }
}
