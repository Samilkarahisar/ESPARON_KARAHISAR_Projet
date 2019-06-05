<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*factory('App\Business\OrderProduct', 3)->create();
        factory('App\Business\Product', 4)->create([
            'product_category_id' => 1,
        ]);*/

        $paymentMethods = array(
            array('name' => 'PayPal', 'description' => "Payez vos achats sans saisir vos coordonnées bancaires, recevez vos paiements 
            en ligne et envoyez de l'argent de manière sécurisée avec PayPal.", 'image' => 'paypal-logo.png'),
            array('name' => 'Chèque', 'description' => "Payez par chèque. Des instructions vous sont envoyées par mail pour 
            savoir où envoyer le chèque et à quel ordre.", 'image' => 'cheque.png'),
            array('name' => 'Carte Bancaire', 'description' => 'Payez grâce à votre carte bancaire sur notre plateforme totalement sécurisée.',
                'image' => 'cb.png')
        );

        foreach($paymentMethods as $paymentMethod) {
            DB::table('payment_methods')->insert([
                'name' => $paymentMethod['name'],
                'description' => $paymentMethod['description'],
                'image' => $paymentMethod['image']
            ]);
        }

        $productCategories = array(
            'Instruments de musique',
            'Substances licites',
            'Gastronomie',
            /*'Electroménager',
            'Jeux vidéo',
            'Bricolage',
            'Animalerie',
            'Bijoux',
            'Auto',
            'Livres',
            'Sports',
            'Timbres',
            'Immobilier',
            'Beauté',
            'Téléphonie',
            'Musique'*/
        );

        foreach($productCategories as $productCategory) {
            DB::table('product_categories')->insert([
                'name' => $productCategory
            ]);
        }

        $addresses = array(
            array('first_name' => 'Jean', 'last_name' => 'Tsotsué', 'street_1' => '14 rue Colin', 'street_2' => 'Résidence Nexity Studéa',
                'zip_code' => '69100', 'city' => 'Villeurbanne', 'country' => 'France'),
            array('first_name' => 'Guy', 'last_name' => 'Fernando', 'street_1' => '35 rue Ambre', 'street_2' => 'Résidence de la Motte',
                'zip_code' => '84000', 'city' => 'Avignon', 'country' => 'France')
        );

        foreach($addresses as $address) {
            DB::table('addresses')->insert([
                'first_name' => $address['first_name'],
                'last_name' => $address['last_name'],
                'street_1' => $address['street_1'],
                'street_2' => $address['street_2'],
                'zip_code' => $address['zip_code'],
                'city' => $address['city'],
                'country' => $address['country'],
            ]);
        }

        $users = array(
            array('address_id' => 1, 'first_name' => 'Jean', 'last_name' => 'Tsotsué', 'email' => 'user@gmail.com',
                'password' => '$2y$10$h3EdNEEWVHjk1SVVi.q1x.o2vTLm0wHD3YqoxBCz.N0TgaAOTpQoi', 'is_admin' => false),
            array('address_id' => 2, 'first_name' => 'Grégoire', 'last_name' => 'Dupont', 'email' => 'admin@gmail.com',
                'password' => '$2y$10$h3EdNEEWVHjk1SVVi.q1x.o2vTLm0wHD3YqoxBCz.N0TgaAOTpQoi', 'is_admin' => true),
        );

        foreach($users as $user) {
            DB::table('users')->insert([
                'address_id' => $user['address_id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'is_admin' => $user['is_admin'],
            ]);
        }

        $products = array(
            array('product_category_id' => 1, 'name' => 'Guitare', 'description' => 'Guitare obtenu en rackettant Jimi 
            Hendrix puis reproduit en plusieurs examplaires.', 'image' => 'guitare-jimi.jpg', 'price' => '5'),
            array('product_category_id' => 1, 'name' => 'Piano', 'description' => 'Vend tous les pianos utilisés par Mozart lors de ses 
            différents concerts.', 'image' => 'piano-mozart.jpg', 'price' => '100'),
            array('product_category_id' => 1, 'name' => 'Trompette', 'description' => 'Trompette en titane utilisé lors des grandes guerres 
            médiévales en guise de bouclier.', 'image' => 'trompette.jpg', 'price' => '25'),
            array('product_category_id' => 1, 'name' => 'Microphone', 'description' => "Microphone reproduisant la voix de Johnny Hallyday en train
            de gueuler lorsqu'on chuchote dessus.", 'image' => 'microphone-johnny.jpg', 'price' => '60'),

            array('product_category_id' => 2, 'name' => 'Farine', 'description' => "Sachet de farine de 2 tonnes. A consommer avec modération.",
                'image' => 'farine.jpg', 'price' => '200'),
            array('product_category_id' => 2, 'name' => 'Plante médicinale', 'description' => "Nénuphar pour rendre vos soirées plus folles. 
            Récolté au Mexique.", 'image' => 'plante.jpg', 'price' => '6500'),

            array('product_category_id' => 3, 'name' => 'Taco', 'description' => "Délicieux taco palpable salades tomates ails.",
                'image' => 'tacos.jpg', 'price' => '50'),
            array('product_category_id' => 3, 'name' => 'Pizza', 'description' => "Pizza 80cm aux choux de bruxelle et à la viande de dragon.",
                'image' => 'pizza.jpg', 'price' => '20'),
            array('product_category_id' => 3, 'name' => 'Hamburger', 'description' => "Hamburger composé de 10 steaks de canard. Pain produit 
            sans levure ni farine. Ne pas se fier à l'image.",
                'image' => 'hamburger.jpg', 'price' => '10'),
            array('product_category_id' => 3, 'name' => 'Spaghetti', 'description' => "Spaghetti pour étudiants qui n'ont pas les moyens. 
            Paquet de 100g.", 'image' => 'spaghetti.jpg', 'price' => '20000'),
        );

        foreach($products as $product) {
            DB::table('products')->insert([
                'product_category_id' => $product['product_category_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'image' => $product['image'],
                'price' => $product['price'],
            ]);
        }
    }
}
