<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use App\Models\UsedFeature;
use Illuminate\Http\Request;

class Feature1Controller extends Controller
{
    public ?Feature $feature = null;

    public function __construct()
    {
        $this->feature = Feature::where("route_name", "feature1.index")->where('active', true)->firstOrFail();
    }

    public function index()
    {
        // Inertia è il metodo per visualizzare un componente di React o Vue.js (primo parametro 'Feature1/index') mentre il secondo parametro sono i parametri
        // Che servono per quel componente. Nello specifico feature = new FeatureResource vuol dire trasforma quella feature in una FeatureResource. Le risorse
        // Non sono altro che classi che permettono di inviare (se vogliamo tramite array) solo i campi che vogliamo di una determinata classe

        return inertia('Feature1/Index', [
            'feature' => new FeatureResource($this->feature),
            'answer' => session('answer')
        ]);
    }

    public function calculate(Request $request)
    {
        $user = $request->user();
        if($user->available_credits < $this->feature->required_credits) {
            return back();
        }

        $data = $request->validate([
            'number1' => ['required', 'numeric'],
            'number2' => ['required', 'numeric'],
        ]);

        $number1 = (float) $data['number1'];
        $number2 = (float) $data['number2'];

        $user->decreaseCredits($this->feature->required_credits);

        UsedFeature::create([
            'feature_id' => $this->feature->id,
            'user_id' => $user->id,
            'credits' => $this->feature->required_credits,
            'data' => $data
        ]);

        return to_route('feature1.index')->with('answer', $number1 + $number2);
    }
}
