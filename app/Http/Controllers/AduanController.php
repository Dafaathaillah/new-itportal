<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\UserAll;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return response()->json($aduan);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nrp' => 'required|string|max:255',
            'complaint_name' => 'nullable|string',
            'complaint_note' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'date_of_complaint' => 'nullable|string',
            'complaint_image' => 'nullable|string',
            'location' => 'nullable|string',
            'detail_location' => 'nullable|string',
            'category_name' => 'nullable|string',
            'crew' => 'nullable|string',
        ]);

        $aduan_get_data = UserAll::where('nrp', $request->nrp)->first();
        // return response()->json($aduan_get_data['position'], 201);

        $validate['complaint_position'] = $aduan_get_data['position'];

        $aduan = Aduan::create($validate);
        return response()->json($aduan, 201);

        // $aduan_get_data = Aduan::find($request->id);
        // if (empty($aduan_get_data)) {
        //     $aduan = Aduan::create($request->all());
        //     return response()->json($aduan, 201);
        // } else {
        //     $aduan = Aduan::firstWhere('id', $request->id)->update($request->all());
        //     return response()->json($aduan, 201);
        // }
    }

    public function show($id)
    {
        $aduan = Aduan::find($id);
        if (is_null($aduan)) {
            return response()->json(['message' => 'User All Site Data not found'], 404);
        }
        return response()->json($aduan);
    }

    public function destroy($id)
    {
        $aduan = Aduan::find($id);
        if (is_null($aduan)) {
            return response()->json(['message' => 'User All SIte Data not found'], 404);
        }
        $aduan->delete();
        return response()->json(null, 204);
    }
}
