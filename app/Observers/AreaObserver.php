<?php
 
namespace App\Observers;
 
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
 
class AreaObserver
{
 
    // public function __construct() {
    //     $this->user = Auth::user();
    // }
 
    /**
     * Handle the area "created" event.
     *
     * @param  \Models\Area  $area
     * @return void
     */
    public function created(Area $area)
    {
        $user = Auth::user();
        $area->user_id = !empty($user) ? $user->id : null;
        // $area->user_id = $this->user->id;
        $area->save();
    }
 
    /**
     * Handle the area "updated" event.
     *
     * @param  \Models\Area  $area
     * @return void
     */
    public function updated(Area $area)
    {
        // $user = Auth::user();
        // if ($user->id != $area->user_id) {
        //     $area->user_id = $user->id;
        //     $area->update();
        // }
    }
 
    public function updating(Area $area)
    {
        $user = Auth::user();
        $area->user_id = !empty($user) ? $user->id : null;
    }
 
    /**
     * Handle the area "deleted" event.
     *
     * @param  \Models\Area  $area
     * @return void
     */
    public function deleted(Area $area)
    {
        $user = Auth::user();
       // Log::alert("A área {$area->id} foi excluída pelo usuário {$user->id} {$user->email}");
    }
 
    /**
     * Handle the area "restored" event.
     *
     * @param  \Models\Area  $area
     * @return void
     */
    public function restored(Area $area)
    {
        //
    }
 
    /**
     * Handle the area "force deleted" event.
     *
     * @param  \Models\Area  $area
     * @return void
     */
    public function forceDeleted(Area $area)
    {
        //
    }
}