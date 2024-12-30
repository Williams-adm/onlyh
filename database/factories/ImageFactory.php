<?php

namespace Database\Factories;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'default/default.jpg', // Valor por defecto que se sobrescribirá al configurar
        ];
    }

    public function configureImage(string $directory, string $fileName): self
    {
        return $this->state(function (array $attributes) use ($directory, $fileName) {
            $client = new Client();
            $imageUrl = 'https://picsum.photos/400/200';
            $slugFileName = Str::slug($fileName) . '.jpg';
            $imagePath = "public/{$directory}/{$slugFileName}";

            $response = $client->get($imageUrl);
            Storage::put($imagePath, $response->getBody());

            return [
                'path' => "{$directory}/{$slugFileName}",
            ];
        });
    }
}