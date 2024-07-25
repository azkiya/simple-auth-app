<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ReimbursementFactory extends Factory
{
    protected $model = \App\Models\Reimbursement::class;

    public function definition()
    {
        // Create a fake avatar file in storage
        $fileName = $this->faker->word . '.jpg';
        $filePath = 'uploads/' . $fileName;

        // Store a fake image
        Storage::disk('public')->put($filePath, file_get_contents($this->faker->image()));

        return [
            'no_invoice' => "INV/0724/".$this->faker->randomNumber(3, true),
            'tanggal' =>$this->faker->dateTimeThisYear(), 
            'deskripsi' => $this->faker->text(200),
            'file' => $filePath,
            'created_at' => now(),
            'is_approved' => $this->faker->boolean(10),
        ];
    }
}
