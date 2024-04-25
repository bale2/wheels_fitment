<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Manufacturer;
use Livewire\Component;

class DependentDropdownForWheels extends Component
{
    public $manufacturers;
    public $cars;
    public $wheel_id;

    public $selectedManufacturer = null;

    public function mount()
    {
        $this->manufacturers = Manufacturer::all()->where('only_wheel_maker', 0)->sortBy('manufacturer_name');
    }

    public function updatedSelectedManufacturer($manufacturer)
    {
        $this->cars = Car::where('manufacturer_id', $manufacturer)->get();
    }

    public function render()
    {
        return view('livewire.dependent-dropdown-for-wheels');
    }
}
