<?php

namespace App\Livewire;

use App\Models\Wheel;
use App\Models\Manufacturer;
use Livewire\Component;

class DependentDropdownForCars extends Component
{
    public $manufacturers;
    public $wheels;
    public $car_id;

    public $selectedManufacturer = null;

    public function mount()
    {
        $this->manufacturers = Manufacturer::all()->sortBy("manufacturer_name");
    }

    public function updatedSelectedManufacturer($manufacturer)
    {
        $this->wheels = Wheel::where('manufacturer_id', $manufacturer)->get();
    }

    public function render()
    {
        return view('livewire.dependent-dropdown-for-cars');
    }
}
