<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\Wheel;
use Livewire\Component;

class DependentDropdownForCalculator extends Component
{
    public $manufacturersCar;
    public $cars;

    public $manufacturersWheel;
    public $wheels;

    public $selectedManufacturerCar = null;
    public $selectedModelCar = null;

    public $selectedManufacturerWheel = null;
    public $selectedModelWheel = null;

    public function mount()
    {
        //feltölti az elso menut a gyartokkal
        $this->manufacturersCar = Manufacturer::all()->where('only_wheel_maker', 0)->sortBy('manufacturer_name');
        $this->manufacturersWheel = Manufacturer::all()->sortBy('manufacturer_name');
        // $this->manufacturersWheel = Manufacturer::all()->sortBy('manufacturer_name');
    }

    public function updatedSelectedManufacturerCar($manufacturerCar)
    {
        $this->cars = Car::where('manufacturer_id', $manufacturerCar)->get();
    }

    public function updatedSelectedModelCar($car)
    {
        // $this->cars = Car::where('id', $car)->get();
        $this->cars = Car::where('manufacturer_id', $car)->get();
    }

    public function updatedSelectedManufacturerWheel($manufacturerWheel)
    {
        //
        $this->wheels = Wheel::where('manufacturer_id', $manufacturerWheel)->get();
    }

    public function updatedSelectedModelWheel($wheel)
    {
        // $this->cars = Car::where('id', $car)->get();
        $this->wheels = Wheel::where('manufacturer_id', $wheel)->get();
    }
    public function render()
    {
        return view('livewire.dependent-dropdown-for-calculator');
    }
}
