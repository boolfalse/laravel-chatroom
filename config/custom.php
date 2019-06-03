<?php

return [

    'confirm_token_length' => 60,
    'channel_token_length' => 60,
    'image_random_name_length' => 40,

    'user_images_folder' => 'users',
    'seed_users_count' => 10, // 10 | 3

    'user_image_sizes' => [
        "small" => [
            "w" => 70, // 70
            "h" => 70, // 70
            "pb" => 3,
            "pr" => 3,
        ],
        "medium" => [
            "w" => 160, // 370,
            "h" => 260, // 200,
            "pb" => 5,
            "pr" => 5,
        ],
        "large" => [
            "w" => 306, // 1140, // 1920 with this kind of sizes, seeders thrown an error at getimagesize() function, cuz big images can't be loaded using faker's package
            "h" => 440, // 642,
            "pb" => 10,
            "pr" => 10,
        ],
    ],
    'user_image_divisions' => [
        'min' => 1.2,
        'max' => 2,
    ],
    'seed_user_faker_image_width' => 306, // 1920, //ss with this kind of sizes, seeders thrown an error at getimagesize() function, cuz big images can't be loaded using faker's package
    'seed_user_faker_image_height' => 440, // 725,

];
