<?php

use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = new Faker\Generator();
        $faker->addProvider(new \Faker\Provider\Person($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));

        Model::unguard();

        DB::table('category')->insert(['name' => 'poussin']);
        DB::table('category')->insert(['name' => 'minime']);
        DB::table('category')->insert(['name' => 'cadet']);

        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0153623590', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 0]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0243673289', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0327402746', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0625485032', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0667894523', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0743542314', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0732431243', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0123543254', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0243645232', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0243645232', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0123543254', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 1]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0243645232', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 1]);
        DB::table('user')->insert(['email' => $faker->email, 'phone' => '0375496475', 'password' => hash('sha256', $faker->password(rand(8,30))), 'privilege' => 2]);

        DB::table('child')->insert(['lastName' => 'toto', 'name' => 'henry', 'birthDate' => '2011-04-1', 'id_category' => 1, 'id_user' => 2]);
        DB::table('child')->insert(['lastName' => 'titi', 'name' => 'jean paul', 'birthDate' => '2012-02-13', 'id_category' => 1, 'id_user' => 3]);
        DB::table('child')->insert(['lastName' => 'tata', 'name' => 'yvon', 'birthDate' => '2013-03-05', 'id_category' => 1, 'id_user' => 4]);
        DB::table('child')->insert(['lastName' => 'tutu', 'name' => 'yvain', 'birthDate' => '2005-04-22', 'id_category' => 2, 'id_user' => 5]);
        DB::table('child')->insert(['lastName' => 'luc', 'name' => 'gauvin', 'birthDate' => '2008-06-24', 'id_category' => 2, 'id_user' => 6]);
        DB::table('child')->insert(['lastName' => 'depain', 'name' => 'gustan', 'birthDate' => '2007-07-12', 'id_category' => 2, 'id_user' => 7]);
        DB::table('child')->insert(['lastName' => 'dupont', 'name' => 'augustine', 'birthDate' => '2004-10-04', 'id_category' => 3, 'id_user' => 8]);
        DB::table('child')->insert(['lastName' => 'dupont', 'name' => 'paulette', 'birthDate' => '2003-06-1', 'id_category' => 3, 'id_user' => 8]);
        DB::table('child')->insert(['lastName' => 'herlant', 'name' => 'jean', 'birthDate' => '2002-11-05', 'id_category' => 3, 'id_user' => 9]);
        DB::table('child')->insert(['lastName' => 'arnaud', 'name' => 'jean', 'birthDate' => '2013-11-05', 'id_category' => 1, 'id_user' => 10]);
        DB::table('child')->insert(['lastName' => 'valjean', 'name' => 'jean', 'birthDate' => '2008-11-05', 'id_category' => 2, 'id_user' => 10]);
        DB::table('child')->insert(['lastName' => 'padargent', 'name' => 'paul', 'birthDate' => '2008-11-05', 'id_category' => 2, 'id_user' => 13]);
        DB::table('child')->insert(['lastName' => 'padargent', 'name' => 'jacques', 'birthDate' => '2008-11-05', 'id_category' => 2, 'id_user' => 13]);

        DB::table('product')->insert(['name' => 'paquet de bonbon', 'price' => 1.50, 'minQuantity' => 15]);
        DB::table('product')->insert(['name' => 'canette', 'price' => 1.50, 'minQuantity' => 10]);
        DB::table('product')->insert(['name' => 'café', 'price' => 1.50, 'minQuantity' => 20]);
        DB::table('product')->insert(['name' => 'sucette', 'price' => 1.50, 'minQuantity' => 50]);
        DB::table('product')->insert(['name' => 'barre chocolatée', 'price' => 1.50, 'minQuantity' => 35]);
        DB::table('product')->insert(['name' => 'pain au chocolat', 'price' => 1.50, 'minQuantity' => 10]);
        DB::table('product')->insert(['name' => 'baguette avec chocolat', 'price' => 3.50, 'minQuantity' => null]);
        DB::table('product')->insert(['name' => 'menu goute pain choco', 'price' => 4.30, 'minQuantity' => null]);
        DB::table('product')->insert(['name' => 'menu goute pain', 'price' => 4.30, 'minQuantity' => null]);
        DB::table('product')->insert(['name' => 'tablette de chocolat', 'price' => 1.50, 'minQuantity' => 20]);
        DB::table('product')->insert(['name' => 'baguette', 'price' => 1.00, 'minQuantity' => 5]);

        DB::table('composedof')->insert(['quantity' => 1, 'id_product' => 8, 'id_product_1' => 2]);
        DB::table('composedof')->insert(['quantity' => 1, 'id_product' => 8, 'id_product_1' => 6]);
        DB::table('composedof')->insert(['quantity' => 1, 'id_product' => 9, 'id_product_1' => 2]);
        DB::table('composedof')->insert(['quantity' => 1, 'id_product' => 9, 'id_product_1' => 7]);
        DB::table('composedof')->insert(['quantity' => 0.08333, 'id_product' => 7, 'id_product_1' => 10]);
        DB::table('composedof')->insert(['quantity' => 0.125, 'id_product' => 7, 'id_product_1' => 11]);

        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 45, 'id_child' => 1]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 10, 'id_child' => 1]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 30, 'id_child' => 1]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 65, 'id_child' => 2]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 20, 'id_child' => 2]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 30, 'id_child' => 2]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 128, 'id_child' => 3]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 30, 'id_child' => 3]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 15, 'id_child' => 3]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 185, 'id_child' => 4]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 15, 'id_child' => 4]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 20, 'id_child' => 4]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 95, 'id_child' => 5]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 15, 'id_child' => 5]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 10, 'id_child' => 5]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 50, 'id_child' => 6]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 30, 'id_child' => 6]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 10, 'id_child' => 6]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 35, 'id_child' => 7]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 40, 'id_child' => 7]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 50, 'id_child' => 7]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 60, 'id_child' => 8]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 45, 'id_child' => 8]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 62, 'id_child' => 8]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 106, 'id_child' => 9]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 41, 'id_child' => 9]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 10, 'id_child' => 9]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 30, 'id_child' => 10]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 15, 'id_child' => 10]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 45, 'id_child' => 10]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 500, 'id_child' => 11]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-02', 'amount' => 200, 'id_child' => 11]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-03', 'amount' => 400, 'id_child' => 11]);
        DB::table('inflow')->insert(['transactionDate' => '2017-09-01', 'amount' => 10, 'id_child' => 13]);

        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 1]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 1]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 1]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 2]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 2]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 2]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 3]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 3]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 3]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 4]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 4]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 4]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 5]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 5]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 5]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 6]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 6]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 6]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 7]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 7]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 7]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 8]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 8]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 8]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 9]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 9]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 9]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 10]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 10]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 10]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 11]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-15', 'id_child' => 11]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-22', 'id_child' => 11]);
        DB::table('consumption')->insert(['transactionDate' => '2017-10-8', 'id_child' => 13]);

        DB::table('purchasegroup')->insert(['transactionDate' => '2017-09-03', 'totalPrice' => 200.00, 'id_user' => 1]);
        DB::table('purchasegroup')->insert(['transactionDate' => '2017-09-10', 'totalPrice' => 100.00, 'id_user' => 2]);
        DB::table('purchasegroup')->insert(['transactionDate' => '2017-09-17', 'totalPrice' => 150.00, 'id_user' => 1]);

        DB::table('purchase')->insert(['quantity' => 116, 'id_product' => 1, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 15, 'id_product' => 1, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 5, 'id_product' => 1, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 309, 'id_product' => 2, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 10, 'id_product' => 2, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 2, 'id_product' => 2, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 91, 'id_product' => 3, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 5, 'id_product' => 3, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 26, 'id_product' => 3, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 89, 'id_product' => 4, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 10, 'id_product' => 4, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 8, 'id_product' => 4, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 40, 'id_product' => 5, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 25, 'id_product' => 5, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 15, 'id_product' => 5, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 174, 'id_product' => 6, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 25, 'id_product' => 6, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 15, 'id_product' => 6, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 21, 'id_product' => 10, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 15, 'id_product' => 10, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 10, 'id_product' => 10, 'id_purchase' => 3]);
        DB::table('purchase')->insert(['quantity' => 10, 'id_product' => 11, 'id_purchase' => 1]);
        DB::table('purchase')->insert(['quantity' => 25, 'id_product' => 11, 'id_purchase' => 2]);
        DB::table('purchase')->insert(['quantity' => 20, 'id_product' => 11, 'id_purchase' => 3]);

        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 1, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 1, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 1, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 2, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 2, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 2, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 4, 'id_consumption' => 3, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 3, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 4, 'id_consumption' => 3, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 4, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 4, 'id_consumption' => 4, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 4, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 5, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 5, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 5, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 6, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 6, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 6, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 7, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 7, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 7, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 8, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 8, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 8, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 9, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 9, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 9, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 10, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 10, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 10, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 10, 'id_consumption' => 11, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 11, 'id_consumption' => 11, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 10, 'id_consumption' => 11, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 11, 'id_consumption' => 12, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 10, 'id_consumption' => 12, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 11, 'id_consumption' => 12, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 13, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 13, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 13, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 14, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 14, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 14, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 15, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 15, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 15, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 16, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 16, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 16, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 4, 'id_consumption' => 17, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 17, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 17, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 18, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 18, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 18, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 19, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 19, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 19, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 20, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 20, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 20, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 21, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 21, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 21, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 22, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 22, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 22, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 23, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 23, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 23, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 1, 'id_consumption' => 24, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 24, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 1, 'id_consumption' => 24, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 25, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 25, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 9, 'id_consumption' => 25, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 8, 'id_consumption' => 26, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 26, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 26, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 27, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 27, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 27, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 1, 'id_consumption' => 28, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 4, 'id_consumption' => 28, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 2, 'id_consumption' => 28, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 3, 'id_consumption' => 29, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 29, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 1, 'id_consumption' => 29, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 7, 'id_consumption' => 30, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 5, 'id_consumption' => 30, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 6, 'id_consumption' => 30, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 40, 'id_consumption' => 31, 'id_product' => 7]);
        DB::table('concerns')->insert(['quantity' => 35, 'id_consumption' => 31, 'id_product' => 8]);
        DB::table('concerns')->insert(['quantity' => 50, 'id_consumption' => 31, 'id_product' => 9]);

        DB::table('concerns')->insert(['quantity' => 75, 'id_consumption' => 32, 'id_product' => 1]);
        DB::table('concerns')->insert(['quantity' => 42, 'id_consumption' => 32, 'id_product' => 2]);
        DB::table('concerns')->insert(['quantity' => 23, 'id_consumption' => 32, 'id_product' => 3]);

        DB::table('concerns')->insert(['quantity' => 53, 'id_consumption' => 33, 'id_product' => 4]);
        DB::table('concerns')->insert(['quantity' => 31, 'id_consumption' => 33, 'id_product' => 5]);
        DB::table('concerns')->insert(['quantity' => 52, 'id_consumption' => 33, 'id_product' => 6]);

        DB::table('concerns')->insert(['quantity' => 1, 'id_consumption' => 34, 'id_product' => 6]);

        Model::reguard();
    }
}
