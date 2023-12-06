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
            // Fetch LGAs based on the state ID
            // $lgas = LGA::where('state_id', $stateId)->get(); // Adjust this query as per your database schema
            $lgas = DB::table('local_governments')->where('state_id', $stateId)->get();
            return response()->json($lgas);
        } catch (QueryException $e) {
            // Log the exception
            // \Log::error('Query Exception: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Log other exceptions
            // \Log::error('Exception: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
