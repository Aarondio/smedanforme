<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Paystack;
use App\Models\Businessinfo;

class AccountStatementController extends Controller
{

    public function index()
    {
        return view('app.dashboard.statement');
    }
    public function uploadPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);
    
        $pdfFile = $request->file('pdf');
    
        // Ensure the 'pdfs' directory exists within the 'public' disk
        if (!Storage::disk('public')->exists('pdfs')) {
            Storage::disk('public')->makeDirectory('pdfs');
        }
    
        // Save the PDF to a temporary location
        $pdfPath = $pdfFile->storeAs('pdfs', 'temp.pdf', 'public');
    
        // Generate PDF using dompdf
        $pdf = PDF::loadFile(storage_path('app/public/' . $pdfPath));
    
        // Extract text from the generated PDF
        $text = $pdf->getText();
    
        // You can now use $text for further processing or display
        dd($text);
    }


    public function balanceSheet(){
        $user = Auth::user();

        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();
                if ($businessinfo && $businessinfo->exists()) {
                    return view('app.dashboard.balancesheet', compact('user', 'businessinfo', 'paystack'));
                } else {
                    return redirect()->back()->with('error', 'Business info not found.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access.');
        }
    }

}
