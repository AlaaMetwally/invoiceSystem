<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_date = Carbon::now()->format('Y-m-d H:i:s');
        $updated_date = Carbon::now()->addWeeks(rand(1, 2))->format('Y-m-d H:i:s');
        $user_id = DB::table('users')->insertGetId([
            'name' => str_random(10),
            'email' => 'super@nour.com',
            'password' => bcrypt('123456'),
            'phone' => str_random(10),
            'address' => str_random(10),
            'country' => str_random(10),
            'city' => str_random(10),
            'logo' => '/uploads/users/avatar.jpeg',
            'admin_show' => 1,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $payment_id = DB::table('payments')->insertGetId([
            'name' => str_random(10),
            'info' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $unit_id = DB::table('units')->insert([
            'name' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $service_id = DB::table('services')->insertGetId([
            'name' => str_random(10),
            'description' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $currency_id = DB::table('currencies')->insertGetId([
            'name' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $adjustment_id = DB::table('adjustments')->insertGetId([
            'name' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
       $client_id =  DB::table('clients')->insertGetId([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'admin_show' => 1,
            'user_id' => $user_id,
            'billing_info' => str_random(10),
            'payment_id' => $payment_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $invoice_id =  DB::table('invoices')->insertGetId([
            'adjustment_type' => array_random(['Increase', 'Decrease']), //enum
            'adjustment_percent' => rand(1,2),
            'vat_percent' => rand(1,2),
            'adjustment_id' => $adjustment_id,
            'invoice_number' => str_random(10),
            'admin_show' => 1,
            'user_id' => $user_id,
            'notes' => str_random(10),
            'client_id' => $client_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);
        $contact_id = DB::table('contacts')->insertGetId([
            'admin_show' => 1,
            'name' => str_random(10),
            'title' => str_random(10),
            'phone' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'client_id' => $client_id,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);

        DB::table('tasks')->insert([
            'name' => str_random(10),
            'po_number' => str_random(10),
            'service_id' => $service_id,
            'admin_show' => 1,
            'invoice_number_id' => $invoice_id,
            'contact_id' => $contact_id,
            'currency_id' => $currency_id,
            'user_id' => $user_id,
            'unit_id' => $unit_id,
            'unit_price' => rand(1,2),
            'amount' => rand(1,2),
            'fixed_price' => rand(1,2),
            'start_date' => $created_date,
            'delivery_date' => $updated_date,
            'created_at' =>  $created_date,
            'updated_at' =>  $updated_date,
        ]);

    }
}
