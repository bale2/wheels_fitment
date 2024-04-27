<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Manufacturer;
use Livewire\Component;

class DependentDropdownForCalculator extends Component
{
    public $manufacturers;
    public $cars;

    public $selectedManufacturer = null;
    public $selectedModel = null;

    public function mount()
    {
        $this->manufacturers = Manufacturer::all()->where('only_wheel_maker', 0)->sortBy('manufacturer_name');
    }

    public function updatedSelectedManufacturer($manufacturer)
    {
        $this->cars = Car::where('manufacturer_id', $manufacturer)->get();
    }

    public function updatedSelectedModel($car)
    {
        // $this->cars = Car::where('id', $car)->get();
        $this->cars = Car::where('manufacturer_id', $car)->get();
    }
    public function render()
    {
        return view('livewire.dependent-dropdown-for-calculator');
    }
}
