<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reimbursement;

class ReimbursementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reimbursement::factory()->count(1)->create();
        DB::table('reimbursements')->insert([
            [
                'no_invoice' => "INV/0624/001",
                'nama' => "Reanu",
                'tanggal' => now(),
                'deskripsi' => "deskripsi reimbursement invoice",
                'file' => 'uploads/reimbursement_dummy.pdf',
                'created_at' => now(),
                'updated_at' => now(),
                'status' => 0,
            ]
        ]);
    }
}
