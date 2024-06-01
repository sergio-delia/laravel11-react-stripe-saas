Gli observer non sono altro che degli osservatori. Quando ad un modello si associa un'azione per esempio update, insert, delete, ecc...
Questi eseguono una determinata azione. Es: UserObserver.php
<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user){
        $user->available_credits = 10;
    }
}


Per associare un Observer ad un modello nel modello va inserito 
#[ObservedBy(UserObserver::class)]
class User extends Authenticatable { 
}

Prima della dichiarazione della classe



#####

Le Resources trasformano ciò che si sta passando in un array (utile se si devono passare dei dati a delle API o a React in una view).
class FeatureResource extends JsonResource
{

    public static $wrap = false; // Questa proprietà non avvolge i dati in un ulteriore wrap (es: data[ [ 'id' = 1]] , ma semplicemente [id => 1])
    /**
     *
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image ?: null,
            'route_name' => $this->route_name,
            'name' => $this->name,
            'description' => $this->description,
            'required_credits' => $this->required_credits,
            'active' => $this->active
        ];
    }
}


Per usarlo in un controller basterà fare 

    public function index()
    {
        return inertia('Feature2/Index', [
            'feature' => new FeatureResource($this->feature),
            'answer' => session('answer')
        ]);
    }
