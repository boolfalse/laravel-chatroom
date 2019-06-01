<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Faker\Factory;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function create_developers()
    {
        User::create([
            'name' => config('app.dev_name'),
            'email' => config('app.dev_email'),
            'password' => bcrypt(config('app.dev_password')),
            'confirm_token' => "",
            'status' => "active",
        ]);
    }

    public function run()
    {
        $this->create_developers();

        $faker = Factory::create('en_US');


        $initial_path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . config('custom.user_images_folder'));
        if(!File::exists($initial_path)) {
            File::makeDirectory($initial_path, $mode = 0777, true, true);
        }
        $date = Carbon::now();
        $original_image_path = $initial_path . DIRECTORY_SEPARATOR . $date->year;
        if(!File::exists($original_image_path)) {
            File::makeDirectory($original_image_path, $mode = 0777, true, true);
        }
        $original_image_path .= DIRECTORY_SEPARATOR . $date->month;
        if(!File::exists($original_image_path)) {
            File::makeDirectory($original_image_path, $mode = 0777, true, true);
        }
        $original_image_path .= DIRECTORY_SEPARATOR . $date->day;
        if(!File::exists($original_image_path)) {
            File::makeDirectory($original_image_path, $mode = 0777, true, true);
        }
        $uploads_path = public_path('uploads' . DIRECTORY_SEPARATOR . config('custom.user_images_folder'));
        if (!file_exists($uploads_path)) {
            mkdir($uploads_path, 0755, true);
        }
        foreach (config('custom.user_image_sizes') as $version => $sizes){
            if (!file_exists($uploads_path . DIRECTORY_SEPARATOR . $version)) {
                mkdir($uploads_path . DIRECTORY_SEPARATOR . $version, 0755, true);
            }
        }

        $users_count = config('custom.seed_users_count');

        for ($i = 0; $i < $users_count; $i++){
            $this->uploadImage($uploads_path, $faker, $date);
        }
    }

    public function uploadImage($uploads_path, $faker, $date):bool
    {
        $main_image_name = $faker->image('storage/app/public/' . config('custom.user_images_folder') . '/' . $date->year . '/' . $date->month . '/' . $date->day, config('custom.seed_user_faker_image_width'), config('custom.seed_user_faker_image_height'), null, false);

        $filepath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . config('custom.user_images_folder') . DIRECTORY_SEPARATOR . $date->year . DIRECTORY_SEPARATOR . $date->month . DIRECTORY_SEPARATOR . $date->day . DIRECTORY_SEPARATOR . $main_image_name);
        $getimagesize = getimagesize($filepath);
        $div = $getimagesize[0] / $getimagesize[1];

        foreach (config('custom.user_image_sizes') as $version => $sizes)
        {
            $image_path = $uploads_path . DIRECTORY_SEPARATOR . $version . DIRECTORY_SEPARATOR . $main_image_name;

            $new_w = $div < config('custom.user_image_divisions.min') ? null : $sizes['w'];
            $new_h = $div > config('custom.user_image_divisions.max') ? null : $sizes['h'];

            $img = Image::make($filepath)
                ->resize($new_w, $new_h, function ($constraint) use ($div) {
                    if($div < config('custom.user_image_divisions.min') || $div > config('custom.user_image_divisions.max')) {
                        $constraint->aspectRatio();
                    }
                });

//            $img->insert(public_path('images/watermarks/' . $version . '_watermark.png'), 'bottom-right', $sizes['pb'], $sizes['pr']);

            if($div < config('custom.user_image_divisions.min') || $div > config('custom.user_image_divisions.max')){
                $img->resizeCanvas($sizes['w'], $sizes['h'], 'center', false, '#000000');
                Image::canvas($sizes['w'], $sizes['h'])->insert($img, 'center')->save($image_path);
            } //ss TODO: improve image resizing rules

            $img->save($image_path);
        }

        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'confirm_token' => "",
            'status' => User::ACTIVE,
            'created_at' => $date,
            'updated_at' => $date,

            'image' => $main_image_name,
            'storage_original_image_path' => $date->year . '/' . $date->month . '/' . $date->day . '/' . $main_image_name,
        ]);

        return true;
    }
}
