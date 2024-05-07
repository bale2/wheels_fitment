<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\Wheel;
use App\Models\NutBolt;
use App\Models\WheelType;
use Illuminate\View\View;

use App\Models\BoltPattern;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use Spatie\FlareClient\Http\Response;

class WheelController extends Controller
{
    public function wheels_show(): View
    {
        return view('wheels/wheels', [
            'wheels' => Wheel::all()->whereNotNull('created_at')->toQuery()->paginate(3),
            'manufacturers' => Manufacturer::all()
        ]);
    }
    public function wheel_with_id(string $id): View
    {
        $manufacturer = null;
        $model = null;
        $collection = collect();
        $wheel = Wheel::find($id);
        // dd($wheel->cars);
        foreach ($wheel->cars as $one) {
            $manufacturer = Manufacturer::where('id', $one['manufacturer_id'])->select('manufacturer_name')->first();
            $model = Car::where('car_model', $one['car_model'])->first();
            $collection->push($manufacturer, $model);
            // dd($model);
        }

        // dd($collection);
        return view('wheels/wheel_with_id', [
            'wheel' => Wheel::find($id),
            'wheels' => Wheel::all(),
            'collection' => $collection,
        ]);
    }
    public function wheel_create(): View
    {
        return view('wheels/wheel_create', [
            'manufacturers' => Manufacturer::all(),
            'wheelTypes' => WheelType::all(),
            'boltPatterns' => BoltPattern::all(),
            'nutBolts' => NutBolt::all()
        ]);
    }
    public function wheel_create_post(Request $request)
    {
        $this->validate($request, [
            'kba_number' => 'regex:/(KBA[0-9]{2,10})/',
        ]);

        // $newPhotoName = time() . '-' . $request->model . '.' .
        // $request->photo->extension();
        // $request->photo->move(public_path('photos'), $newPhotoName);

        $multipiece = $request->multipiece !== null;

        $imagePaths = '';

        if ($request->hasFile('photo')) {
            $files = $request->file('photo');

            foreach ($files as $file) {

                $path = Str::uuid() . '.' . strtolower($file->getClientOriginalExtension());

                $file->move(public_path('photos'), $path);

                $imagePaths = $imagePaths . ';' . $path;
            }
        }
        $imagePaths = trim($imagePaths, ';');

        // dd($imagePaths);

        Wheel::create([
            'manufacturer_id' => $request->manufacturer_id,
            'model' => $request->model,
            'price' => $request->price,
            'wheel_type_id' => $request->wheel_type_id,
            'diameter' => $request->diameter,
            'width' => $request->width,
            'et_number' => $request->ET_number,
            'bolt_pattern_id' => $request->bolt_pattern_id,
            'kba_number' => $request->kba_number,
            'center_bore' => $request->center_bore,
            'nut_bolt_id' => $request->nut_bolt_id,
            'multipiece' => $multipiece,
            'photo' => $imagePaths,
            'note' => $request->note,
            'updated_at' => now()
        ]);
        return redirect()->action([WheelController::class, 'wheels_show']);
    }



    

    public function wheel_delete_post(Request $request)
    {
        $wheel = Wheel::find($request->wheel_id);
        $this->authorize('delete', $wheel);
        $wheel->delete();
        return redirect()->back();
    }

    public function wheel_update_post(Request $request)
    {
        // $this->authorize('update', Wheel::find($request->wheel_id));

        // $newPhotoName = time() . '-' . $request->model . '.' .
        // $request->photo->extension();
        // $request->photo->move(public_path('photos'), $newPhotoName);
        $multipiece = $request->multipiece !== null;

        $imagePaths = '';

        if ($request->hasFile('photo')) {
            $files = $request->file('photo');

            foreach ($files as $file) {

                $path = Str::uuid() . '.' . strtolower($file->getClientOriginalExtension());

                $file->move(public_path('photos'), $path);

                $imagePaths = $imagePaths . ';' . $path;
            }
        }
        $imagePaths = trim($imagePaths, ';');
        Wheel::find($request->wheel_id)->update([
            'manufacturer_id' => $request->manufacturer_id,
            'model' => $request->model,
            'price' => $request->price,
            'wheel_type_id' => $request->wheel_type_id,
            'diameter' => $request->diameter,
            'width' => $request->width,
            'et_number' => $request->ET_number,
            'bolt_pattern_id' => $request->bolt_pattern_id,
            'kba_number' => $request->kba_number,
            'center_bore' => $request->center_bore,
            'nut_bolt_id' => $request->nut_bolt_id,
            'multipiece' => $multipiece,
            // 'photo' => $imagePaths,
            'note' => $request->note,
            'updated_at' => now(),
            'accepted' => $request->accepted == null ? false : true
        ]);
        return redirect()->back();
    }

    // public function admin_delete_post(Request $request)
    // {
    //     $ad = Ad::find($request->ad_id);
    //     $this->authorize('delete', $ad);
    //     $ad->delete();
    //     return redirect()->back();
    // }

    public function wheel_to_user_create_post(Request $request)
    {
        WheelType::create([
            'wheel_type' => $request->type,
            'updated_at' => now()
        ]);
        return redirect()->action([WheelController::class, 'wheel_types']);
    }
}
