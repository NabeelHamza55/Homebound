<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $properties = Property::where('user_id', $userId)->get();
        return view('property.saveproperty', compact('properties'));
    }
    public function add_property()
    {
        return view('property.addProperty');
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
                // $publicPath = str_replace('/public/', '/', $publicPath);
                $HomePictureName = time() . '_' . $index . '.' . $homePicture->getClientOriginalExtension();
                $homePicture->move($publicPath, $HomePictureName);
                $images[] = $HomePictureName;
            }
        }
        array_filter($images, function ($image) {
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
        return redirect()->route('save.property')->with(['notification' => $notification]);
    }
    public function search_property()
    {
        return view('property.searchProperty');
    }
    public function create_property(Request $request)
    {
        dd($request->all());
        $property = new Property();
        $property->price = $request->price ?? '';
        $property->home_type = $request->home_type ?? '';
        $property->year_building = $request->year_building ?? '';
        $property->facts = $request->facts ?? '';
        $property->address = $request->address ?? '';
        $property->description = $request->description ?? '';
        $images = $request->selected_images;
        $iamgesUrls = explode(',', $images);
        $property->images = json_encode($iamgesUrls);
        $property->user_id = Auth()->user()->id;
        $property->save();
        $notification = [
            'success' => 'property save successfully',
        ];
        return redirect()->route('save.property')->with(['notification' => $notification]);
    }
    public function edit_property($id)
    {
        $property = Property::find($id);
        return view('property.editProperty', compact('property'));
    }
    public function delete_property($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->delete();
            return back()->with('success', 'Property deleted successfully');
        } else {
            return back()->with('error', 'Property not found');
        }
    }
    public function update_property(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        $images = json_decode($property->images);
        $selectedImagesArray = [];
        if ($request->selected_images) {
            $selectedImagesArray = explode(',', $request->selected_images);
            $oldImagesArray = [];
            foreach ($images as $image) {
                if (!in_array($image, $selectedImagesArray)) {
                    $oldImagesArray[] = $image;
                    $publicPath = public_path('ProfilePicture/');
                    // $publicPath = str_replace('/public/', '/', $publicPath);
                    $oldPicturePath = $publicPath . basename($image);
                    if (file_exists($oldPicturePath)) {
                        unlink($oldPicturePath);
                    }
                }
            }
        }
        $home_pictures = $request->file('home_picture_input');
        $images = [];
        if ($home_pictures) {
            foreach ($home_pictures as $index => $homePicture) {
                $publicPath = public_path('ProfilePicture/');
                $publicPath = str_replace('/public/', '/', $publicPath);
                $HomePictureName = time() . '_' . $index . '.' . $homePicture->getClientOriginalExtension();
                $homePicture->move($publicPath, $HomePictureName);
                $images[] = $HomePictureName;
            }
        }
        if ($images) {
            $concatenatedArray = array_merge($selectedImagesArray, $images);
            $property->images = json_encode($concatenatedArray);
        } else {
            $property->images = json_encode($selectedImagesArray);
        }
        $property->price = $request->price ?? $property->price;
        $property->home_type = $request->home_type ?? $property->home_type;
        $property->year_building = $request->build_year ?? $property->year_building;
        $property->facts = $request->facts ?? $property->facts;
        $property->address = $request->Address ?? $property->address;
        $property->description = $request->description ?? $property->description;
        $property->user_id = Auth()->user()->id;
        $property->save();
        $notification = [
            'statusCode' => 200,
            'errorMessage' => 'Update information successfully',
        ];
        return back()->with($notification);
    }
}
