<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\Wheel;
use Livewire\Component;

class DependentDropdownForCompare extends Component
{
    public $manufacturersWheel1;
    public $wheels1;

    public $manufacturersWheel2;
    public $wheels2;

    public $selectedManufacturerWheel1 = null;
    public $selectedModelWheel1 = null;

    public $selectedManufacturerWheel2 = null;
    public $selectedModelWheel2 = null;

    public function mount()
    {
        //feltölti az elso menut a gyartokkal
        $this->manufacturersWheel1 = Manufacturer::all()->sortBy('manufacturer_name');
        $this->manufacturersWheel2 = Manufacturer::all()->sortBy('manufacturer_name');
        // $this->manufacturersWheel = Manufacturer::all()->sortBy('manufacturer_name');
    }

    public function updatedSelectedManufacturerWheel1($manufacturerWheel1)
    {
        //
        $this->wheels1 = Wheel::where('manufacturer_id', $manufacturerWheel1)->get();
    }

    public function updatedSelectedModelWheel1($wheel1)
    {
        // $this->cars = Car::where('id', $car)->get();
        $this->wheels1 = Wheel::where('manufacturer_id', $wheel1)->get();
    }

    public function updatedSelectedManufacturerWheel2($manufacturerWheel2)
    {
        //
        $this->wheels2 = Wheel::where('manufacturer_id', $manufacturerWheel2)->get();
    }

    public function updatedSelectedModelWheel2($wheel2)
    {
        // $this->cars = Car::where('id', $car)->get();
        $this->wheels2 = Wheel::where('manufacturer_id', $wheel2)->get();
    }
    public function render()
    {
        return view('livewire.dependent-dropdown-for-compare');
    }
}
