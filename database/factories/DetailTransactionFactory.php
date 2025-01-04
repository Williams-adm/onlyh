<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailTransaction>
 */
class DetailTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $inventoryID = [];
    public function definition(): array
    {
        $profit = $this->faker->randomFloat(2, 0, 0.30);
        $transaction_id = Transaction::all()->pluck('id');

        $inventory = Inventory::all()->pluck('id')->toArray();
        if (empty(self::$inventoryID)) {
            self::$inventoryID = $inventory;
        }
        $inventoryID = array_shift(self::$inventoryID);
        $searchInventory = Inventory::find($inventoryID);
        $pucharsePriceSinIGV = ($searchInventory->selling_price) / 1.18;
        $pucharsePrice = $pucharsePriceSinIGV / (1 + $profit);

        return [
            'quantity' => $searchInventory->current_stock,
            'purcharse_price' => $pucharsePrice,
            'profit' => $profit,
            'transaction_id' => $this->faker->randomElement($transaction_id),
            'inventory_id' => $inventoryID
        ];
    }
}
