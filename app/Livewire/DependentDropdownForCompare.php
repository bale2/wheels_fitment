<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Wheel;
use App\Models\NutBolt;
use Livewire\Component;
use App\Models\WheelType;
use App\Models\BoltPattern;
use App\Models\Manufacturer;

class DependentDropdownForCompare extends Component
{
    public BoltPattern $boltPattern;
    public NutBolt $nutBolt;
    public WheelType $wheelType;
    public Manufacturer $manufacturer;

    public $manufacturersWheel1; //kategória 1
    public $wheels1;    //kategória 2.
    public $wh1;    //kategória 2.

    public $manufacturersWheel2;
    public $wheels2;
    public $wh2;

    public $selectedManufacturerWheel1 = null; //kategória 1 értéke
    public $selectedModelWheel1 = null;  //kategória 2 értéke
    public $SelectedWheel1 = null;

    public $selectedManufacturerWheel2 = null;
    public $selectedModelWheel2 = null;
    public $SelectedWheel2 = null;

    public function mount()
    {
        //feltölti az elso menut a gyartokkal
        $this->manufacturersWheel1 = Manufacturer::all()->sortBy('manufacturer_name');
        $this->manufacturersWheel2 = Manufacturer::all()->sortBy('manufacturer_name');
    }
    //wheel1 model lista feltöltése az előző változóval
    public function updatedSelectedManufacturerWheel1($manufacturerWheel1)
    {
        //ez a sor tölti fel adattal a 2. listát
        $this->wheels1 = Wheel::where('manufacturer_id', $manufacturerWheel1)->get();
    }

    public function updatedSelectedModelWheel1($selectedModelWheel1)
    {
        $data_array = json_decode($selectedModelWheel1, true);
        $id = $data_array['id'];
        $this->wh1 = Wheel::find($id);
    }
    //2.kerék

    public function updatedSelectedManufacturerWheel2($manufacturerWheel2)
    {
        //
        $this->wheels2 = Wheel::where('manufacturer_id', $manufacturerWheel2)->get();
    }

    public function updatedSelectedModelWheel2($selectedModelWheel2)
    {
        $data_array = json_decode($selectedModelWheel2, true);
        $id = $data_array['id'];
        $this->wh2 = Wheel::find($id);
    }

    public function render()
    {
        return view('livewire.dependent-dropdown-for-compare', [
            'wheels' => Wheel::all(),
            'manufacturers' => Manufacturer::all(),
            'nutBolts' => NutBolt::all(),
            'wheelTypes' => WheelType::all(),
            'boltPatterns' => BoltPattern::all(),
        ]);
    }
}
