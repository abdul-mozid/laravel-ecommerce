<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products')->insert([
            [
                'name' => 'LG Mobile',
                'price' => '20000',
                'category' => 'Mobile',
                'description' => 'LG Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://www.lg.com/us/images/cell-phones/md07518563/gallery/zoom-01.jpg'
            ],
            [
                'name' => 'Walton Mobile',
                'price' => '18000',
                'category' => 'Mobile',
                'description' => 'Walton Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://i2.wp.com/www.mobilebd.co/wp-content/uploads/2020/12/Walton-Primo-RM4-Official-Image--500x500.png'
            ],
            [
                'name' => 'Oppo Mobile',
                'price' => '16000',
                'category' => 'Mobile',
                'description' => 'Oppo Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://static.toiimg.com/photo/71851476.cms'
            ],
            [
                'name' => 'Samsung Mobile',
                'price' => '25000',
                'category' => 'Mobile',
                'description' => 'Samsung Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://www.mobiledokan.com/wp-content/uploads/2021/04/Samsung-Galaxy-M62-image.jpg'
            ],
            [
                'name' => 'One Plus Mobile',
                'price' => '17000',
                'category' => 'Mobile',
                'description' => 'One Plus Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://www.gizmochina.com/wp-content/uploads/2019/10/oneplus_8_pro-.png'
            ],
            [
                'name' => 'LG Laptop',
                'price' => '65000',
                'category' => 'Laptop',
                'description' => 'LG Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://www.lg.com/us/images/laptops/md07500001/gallery/desktop-01.jpg'
            ],
            [
                'name' => 'Toshiba Laptop',
                'price' => '62000',
                'category' => 'Laptop',
                'description' => 'Toshiba Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://static.toiimg.com/photo/54236775/Toshiba-Satellite-C50-A-I0110t-Laptop.jpg'
            ],
            [
                'name' => 'Acer Laptop',
                'price' => '63500',
                'category' => 'Laptop',
                'description' => 'Acer Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8" OLED FullVision Main Display; 3.9" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors',
                'gallery' => 'https://4.imimg.com/data4/SH/KE/MY-28174815/acer-laptop-500x500.jpg'
            ]
        ]);
    }

}
