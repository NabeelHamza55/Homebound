<?php

namespace App\Http\Controllers\ZillowApiFolder;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\Mime\cc;

class ZillowApiController extends Controller
{
    public function byaddress($url , $queryParams)
    {
        $key = config('zillow.key');
        $host = config('zillow.host');
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => $key,
            'X-RapidAPI-Host' => $host,
        ])->get($url, $queryParams);
        if ($response->successful()) {
            $result = $response->json();
            if ($result['propertyDetails']) {
                $photos = [];
                $propertyDetails = $result['propertyDetails'];
                foreach ($propertyDetails['originalPhotos'] as $index => $photo) {
                    // Check if 'mixedSources' and 'jpeg' key exist in the current element
                    if (isset($photo['mixedSources']['jpeg'])) {
                        // Add the 'jpeg' value to the $photoUrl array
                        $photos[] = $photo['mixedSources']['jpeg'];
                    }
                }
                $photoUrls = [];

                foreach ($photos as $subArray) {
                    if (isset($subArray[0]['url'])) {
                        $photoUrls[] = $subArray[0]['url'];
                    }
                }

                $attribute = [];
                $attribute['url'] = $photoUrls;
                $attribute['address'] = $propertyDetails['address']['streetAddress'];
                $attribute['price'] = $propertyDetails['price'];
                $attribute['yearBuilt'] = $propertyDetails['yearBuilt'];
                $attribute['homeType'] = $propertyDetails['homeType'];
                $attribute['description'] = $propertyDetails['description'];
                $atAGlanceFacts = collect($propertyDetails['resoFacts']['atAGlanceFacts'])
                    ->pluck('factValue', 'factLabel')
                    ->toArray();
                $attribute['atAGlanceFacts'] = $atAGlanceFacts;
                $attribute ['statusCode'] = 200;
                return $attribute;

            }
            else
            {
                $attribute = [
                    'statusCode' => 500,
                    'errorMessage' => 'property not found',
                ];
                return $attribute;
            }
        }
        else
        {$statusCode = $response->status();
            $errorMessage = $response->body();
            $attribute = [
                'statusCode' => $statusCode,
                'errorMessage' => $errorMessage,
            ];
            return $attribute;
        }
    }

    public function byzip($url , $queryParams)
    {
        $key = config('zillow.key');
        $host = config('zillow.host');
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => $key,
            'X-RapidAPI-Host' => $host,
        ])->get($url, $queryParams);
        if ($response->successful()) {
            $result = $response->json();
            if ($result['propertyDetails']) {

                $propertyDetails = $result['propertyDetails'];
                $attribute = [];
                $attribute['address'] = $propertyDetails['address']['streetAddress'];
                $attribute['price'] = $propertyDetails['price'];
                $attribute['yearBuilt'] = $propertyDetails['yearBuilt'];
                $attribute['homeType'] = $propertyDetails['homeType'];
                $attribute['description'] = $propertyDetails['description'];
                $atAGlanceFacts = collect($propertyDetails['resoFacts']['atAGlanceFacts'])
                    ->pluck('factValue', 'factLabel')
                    ->toArray();
                $attribute['atAGlanceFacts'] = $atAGlanceFacts;
                $response = Http::withHeaders([
                    'X-RapidAPI-Host' => 'zillow-com1.p.rapidapi.com',
                    'X-RapidAPI-Key' => '4fb67df995msh7afc403f99b9917p1362f4jsn38b42ddf2704',
                    ])->get('https://zillow-com1.p.rapidapi.com/images', $queryParams);
                    if ($response->successful()) {
                        $imagesArray = $response->json();
                        $pattern = '/\.(jpg|jpeg|png)$/i'; // Regular expression pattern
                        $filteredImages = [];
                        foreach ($imagesArray as $imageArray) {
                            foreach ($imageArray as $image) {
                                if (is_string($image) && preg_match($pattern, $image)) {
                                    $filteredImages[] = $image;
                                    
                                }
                                
                            }
                            
                        }
                         $attribute['url'] = $filteredImages;
                    }
                // $comparables = $propertyDetails['homeValuation']['comparables'];
                // if (!empty($comparables) && isset($comparables['comps'][0]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3])) {
                //     $photoUrl[0] = $comparables['comps'][0]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3]['url'];
                //     $photoUrl[1] = $comparables['comps'][1]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3]['url'];
                //     $photoUrl[2] = $comparables['comps'][2]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3]['url'];
                //     $photoUrl[3] = $comparables['comps'][3]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3]['url'];
                //     $photoUrl[4] = $comparables['comps'][4]['property']['compsCarouselPropertyPhotos'][0]['mixedSources']['jpeg'][3]['url'];
                //     $attribute['url'] = $photoUrl;
                // }
                $attribute ['statusCode'] = 200;
                return $attribute;

            }
            else
            {
                $attribute = [
                    'statusCode' => 500,
                    'errorMessage' => 'property not found',
                ];
                return $attribute;
            }
        }
        else
        {
            $statusCode = $response->status();
            $errorMessage = $response->body();
            $attribute = [
                'statusCode' => $statusCode,
                'errorMessage' => $errorMessage,
            ];
            return $attribute;
        }
    }
    public function SearchProperty(Request $request)
    {
        $url = '';
        if (is_numeric($request->search))
        {
            $request->validate([
                'search' => 'regex:/^(?:(\d{5})(?:[ \-](\d{4}))?)$/i',
            ]);
            $url = 'https://zillow-working-api.p.rapidapi.com/pro/byzpid';
            $queryParams = ['zpid' => $request->search];
            $object =new ZillowApiController();
            $attribute = $object->byzip($url,$queryParams);
        }
        else
        {
            $request->validate([
                'search' => 'required|string|new_york_address',
            ]);
            $url = 'https://zillow-working-api.p.rapidapi.com/pro/byaddress';
            $queryParams = ['propertyaddress' => $request->search];
            $object =new ZillowApiController();
            $attribute = $object->byaddress($url,$queryParams);
        }
        if ($attribute['statusCode'] == 200)
        {
            return $attribute;
//            return view('UserDashboardComponents.searchProperty',compact('attribute'));
        }
        else
        {
            return back()->with($attribute);
        }

    }
}


