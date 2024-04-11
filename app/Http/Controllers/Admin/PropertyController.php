<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index()
    {
        $collection  = Property::all();
        return view("admin.dashboard.properties", compact("collection"));
    }
    public function destroy($id)
    {
        $data = Property::find($id);
        $data->delete();
        return redirect()->route('admin.properties');
    }
}
