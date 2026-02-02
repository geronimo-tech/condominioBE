<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        Notification::create([
            'type' => 'mensaje',
            'title' => 'Bienvenido',
            'body' => 'Bienvenido al sistema del condominio',
            'read' => false,
        ]);

        Notification::create([
            'type' => 'pago',
            'title' => 'Pago pendiente',
            'body' => 'Tienes un pago pendiente',
            'read' => false,
        ]);

        Notification::create([
            'type' => 'asamblea',
            'title' => 'Asamblea General',
            'body' => 'Asamblea este viernes a las 7pm',
            'read' => false,
        ]);
    }
}
