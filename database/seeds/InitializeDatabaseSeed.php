<?php

use Illuminate\Database\Seeder;
use ArticulosReligiosos\User;
use ArticulosReligiosos\Countrie;
use ArticulosReligiosos\State;
use ArticulosReligiosos\Domicile;
use ArticulosReligiosos\Categorie;
use ArticulosReligiosos\Subcategorie;
use ArticulosReligiosos\Product;
use ArticulosReligiosos\Comment;
use ArticulosReligiosos\Product_img_name;
use ArticulosReligiosos\Replie;
use ArticulosReligiosos\Sale;
use ArticulosReligiosos\App_config;
use ArticulosReligiosos\Product_sale;
use ArticulosReligiosos\Slide;

class InitializeDatabaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear costo de envio
        $app_config = new App_config(['shipping_cost' => 100]);
        $app_config->save();

        //Crear usuario
    	$user = new User();
    	$user->name = "Usuario";
    	$user->paternal_surname = "NA";
    	$user->maternal_surname = "NA";
    	$user->email = "user@mail.com";
    	$user->password = bcrypt('12345678');
    	$user->rfc = "NA";
    	$user->phone_number = "1234567890";
    	$user->admin = false;
    	$user->save();

    	//Crear direccion
    	$countrie = new Countrie(['name' => 'México']);
    	$countrie->save();
    	$state = new State();
    	$state->name = "Michoacán";
    	$countrie->states()->save($state);
        $domicile = new Domicile(['address_number' => '37', 'street' => "Nuevo León", 'between_streets' => 'Sonora y Sinaloa', 'neighborhood' => 'Isaac Arriaga', 'zip_code' => 58210, 'city' => 'Morelia']);

        //Guardar domicilio asignando sus dos relaciones
        $domicile->state()->associate($state);
        $domicile->user()->associate($user);
        $domicile->save();

        //Crear producto junto con sus requisitos
        $categorie = new Categorie(['name' => 'Libros', 'icon' => 'library_books', 'slug' => 'libros']);
        $categorie->save();
        $subcategorie = new Subcategorie(['name' => 'Biblias', 'slug' => 'biblias']);
        $categorie->subcategories()->save($subcategorie);
        $product = new Product(['name' => 'Biblia Arcoiris', 'description' => 'Biblia completa y explicada.', 'price' => 655.32, 'discount_percent' => 20, 'quantity' => 250,'pinned' => true, 'slug' => 'biblia-arcoiris']);
        $subcategorie->products()->save($product);

        //Crear nombre de imagen de producto
        $product_img = new Product_img_name(['name' => 'img.jpg']);
        $product->product_img_names()->save($product_img);

        //Crear comentario y respuesta
        $comment = new Comment(['title' => 'Información de calidad', 'text' => 'Me gustaría saber si su pasta es de piel.']);
        $comment->user()->associate($user);
        $comment->product()->associate($product);
        $comment->save();
        $reply = new Replie(['text' => 'Si lo están, esperamos su compra.']);
        $reply->user()->associate(User::where('admin', true)->first());
        $reply->comment()->associate($comment);
        $reply->save();

        //Crear venta
        $sale_price = ($product->price * (1-$product->discount_percent/100)) + $app_config->shipping_cost;
        $sale = new Sale(['type' => 'paypal', 'sale_total' => $sale_price]);
        $user->sales()->save($sale);
        $sale->products()->save($product);

        //Crear slides
        Slide::create([
            'title' => 'Slide 1',
            'text' => 'Texto del Slide 1',
            'redirect' => 'http://www.google.com',
            'img_url' => 'svg/403.svg'
        ]);
        Slide::create([
            'title' => 'Slide 2',
            'text' => 'Texto del Slide 2',
            'img_url' => 'svg/404.svg'
        ]);
        Slide::create([
            'title' => 'Slide 3',
            'text' => 'Texto del Slide 3',
            'img_url' => 'svg/500.svg'
        ]);
        Slide::create([
            'title' => 'Slide 4',
            'text' => 'Texto del Slide 4',
            'img_url' => 'svg/503.svg'
        ]);
    }
}
