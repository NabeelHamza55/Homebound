<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->get('search_q'));
        $collection = Property::query();
        if($request->has('search_q') && $request->has('search_q')) {
            $collection = $collection->where('address', 'LIKE', '%'. $request->get('search_q') .'%');
        }
        $collection = $collection->get();
        return view("admin.dashboard.properties", compact("collection"));
    }
    public function add()
    {
        return view("admin.dashboard.propertyForm");
    }
    public function edit($id)
    {
        $data = Property::find($id);
        return view("admin.dashboard.propertyForm", compact("data"));
    }
    public function create(Request $request)
    {
        $images = [];
        if ($request->imagesArr) {
            $data = $request->imagesArr[0];
            $images = explode(',', $data);
        }
        $property = new Property();
        $home_pictures = $request->file('home_picture_input');
        if ($home_pictures) {
            foreach ($home_pictures as $index => $homePicture) {
                $publicPath = public_path('ProfilePicture/');
                $publicPath = str_replace('/public/', '/', $publicPath);
                $HomePictureName = time() . '_' . $index . '.' . $homePicture->getClientOriginalExtension();
                $homePicture->move($publicPath, $HomePictureName);
                $images[] = $HomePictureName ;
            }
        }
        $images = array_filter($images, function ($image) {
            return preg_match('/\.(jpg|png|jpge)$/', $image);
        });
        $images = array_values($images);
        $property->images = json_encode($images);
        $property->price = $request->price ?? '';
        $property->home_type = $request->home_type ?? '';
        $property->year_building = $request->build_year ?? '';
        $property->facts = $request->facts ?? '';
        $property->address = $request->address ?? '';
        $property->description = $request->description ?? '';
        $property->user_id = Auth()->user()->id;
        $property->save();
        $notification = [
            'success' => 'property save successfully',
        ];
        return \redirect()->route('admin.properties')->with(['notification' => $notification]);
    }
    public function destroy($id)
    {
        $data = Property::find($id);
        $data->delete();
        return redirect()->route('admin.properties');
    }
}
