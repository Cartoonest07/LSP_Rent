<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Instrument;


class AdminController extends Controller
{
    //Dashboard
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $members = User::where('role', 'member')->get();

        return view('admin.dashboard', ['members' => $members]);
    }
    public function listInstruments()
    {
        $instruments = Instrument::all(); // Ambil semua instrumen dari database
        return view('admin.list_instruments', compact('instruments'));
    }

    public function createInstrument()
    {
        return view('admin.create_instrument');
    }

    public function storeInstrument(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'stock_quantity' => 'required',
            'rental_price' => 'required',
            'condition' => 'required',
            'image' => 'nullable|image',
            // Validasi field lain sesuai kebutuhan
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('instruments', 'public');
        }

        Instrument::create($data);
        return redirect()->route('instruments.index');
    }
    public function showInstrument(Instrument $instrument)
    {
        return view('admin.show_instrument', compact('instrument'));
    }

    public function deleteInstrument(Instrument $instrument)
    {
        $instrument->delete();
        return redirect()->route('instruments.index');
    }

    
}
