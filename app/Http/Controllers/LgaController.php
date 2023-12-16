<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class LgaController extends Controller
{
    //

    public function getLGAs($stateId)
    {
        try {

            $lgas = DB::table('lga')->where('state_id', $stateId)->get();
            return response()->json($lgas);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
