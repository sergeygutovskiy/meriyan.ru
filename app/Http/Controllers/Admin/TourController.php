<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Tours\Tour;
use App\Models\Tours\TourInfo;

class TourController extends Controller
{
    public function index()
    {
        return Tour::get();
    }

    public function show($id)
    {
        $tour = Tour::where('id', $id)->with('tags')->first();
        $info = $tour->info()->with('locations')->with('services')->first();

        return json_encode([
            'tour' => $tour,
            'info' => $info
        ]);
    }

    public function store(Request $request)
    {        
        $title = $request->input('title');
        $desc = $request->input('description');
        $price = $request->input('price');
        $discount_price = $request->input('discount_price') == 'null' ? null : $request->input('discount_price');
        
        // create tour

        $tour = Tour::create([
            'title' => $title,
            'description' => $desc,
            'price' => $price,
            'discount_price' => $discount_price,
            'image_path' => 'temp'
        ]);

        // save image

        $tour->save();

        $file_name = 'card-' . bin2hex(random_bytes(5)) . '.' . $request->image->extension();

        Storage::disk('public_images')->put(
            $tour->local_storage_path . $file_name, 
            file_get_contents($request->image->getRealPath())
        );
    
        $tour->update([
            'image_path' => $file_name
        ]);
        
        // attach tags to tour

        $tags = json_decode($request->input('tags'));
        $tour->tags()->attach($tags);

        // create info for tour

        $info_desc = $request->input('info_description');
        $info_people = $request->input('info_people');
        $info_duration = $request->input('info_duration');
        $info_video = $request->input('info_video');

        $document = $request->info_document == 'null' ? null : $request->info_document;

        if ($document != null)
        {
            Storage::disk('public_images')->put(
                $tour->local_storage_path . 'document.' . $document->extension(), 
                file_get_contents($document->getRealPath())
            );
        }

        $info_complexity = $request->input('info_complexity');
        $info_season = $request->input('info_season');

        $info = $tour->info()->create([
            'description' => $info_desc,
            'people_amount' => $info_people,
            'duration' => $info_duration,
            'video_path' => $info_video,
            'season_id' => $info_season,
            'complexity_id' => $info_complexity,
            'document_path' => $document == null ? null : 'document.' . $document->extension()
        ]);

        // create and attach locations to tour info

        $locations = json_decode($request->input('locations'));

        for ($i = 0; $i < count($locations); $i++) {
            $l = $locations[$i];

            $added_l = $info->locations()->create([
                'name' => $l->title,
                'description' => $l->description,
                'image_path' => 'temp',
                'is_big' => str_contains($l->description, '<p>')
            ]);
    
            $location_image_input_name = 'locations_image_' . ($i + 1);

            $location_file_name = $added_l->id . '-' . bin2hex(random_bytes(5)) . '.' . $request->{$location_image_input_name}->extension();

            Storage::disk('public_images')->put(
                $added_l->local_storage_path . $location_file_name, 
                file_get_contents($request->{$location_image_input_name}->getRealPath())
            );
        
            $added_l->update([
                'image_path' => $location_file_name
            ]);
        }

        // create and attach services to tour info

        $services = json_decode($request->input('services'));

        foreach ($services as $service) {
            $info->services()->create([
                'description' => $service->description,
                'is_included_in_price' => $service->in_price
            ]);
        }

        return json_encode(['status' => 1, 'id' => $tour->id]);
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::where('id', $id)->first();

        if ($request->input('method') == 'main') return $this->update_main($request, $tour);
        else if ($request->input('method') == 'info') return $this->update_info($request, $tour);
        else if ($request->input('method') == 'tags') return $this->update_tags($request, $tour);
        else if ($request->input('method') == 'locations') return $this->update_locations($request, $tour);
        else if ($request->input('method') == 'document') return $this->update_document($request, $tour);
    }

    public function update_main(Request $request, Tour $tour)
    {
        if ($request->new_image == 'null')
        {

            $tour->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price') == 'null' ? null : $request->input('discount_price'),
            ]);
    
            return json_encode(['status' => 1]);
        }
        else
        {
            Storage::disk('public_images')->delete('tours/' . $tour->id . '/card.' . explode('.', $tour->image_path)[1]);
        
            $file_name = 'card-' . bin2hex(random_bytes(5)) . '.' . $request->new_image->extension();
    
            Storage::disk('public_images')->put(
                $tour->local_storage_path . $file_name, 
                file_get_contents($request->new_image->getRealPath())
            );
        
            $tour->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price') == 'null' ? null : $request->input('discount_price'),
                'image_path' => $file_name
            ]);

            return json_encode(['status' => 1]);
        }
    }

    public function update_info(Request $request, Tour $tour)
    {
        $tour->info->update([
            'description' => $request->input('description'),
            'people_amount' => $request->input('people'),
            'duration' => $request->input('duration'),
            'video_path' => $request->input('video')
        ]);

        return json_encode(['status' => 1]);
    }

    public function update_tags(Request $request, Tour $tour)
    {
        $tags = json_decode($request->tags);

        $tour->tags()->sync($tags);

        return json_encode(['status' => 1]);
    }

    public function update_locations(Request $request, Tour $tour)
    {
        $locations = json_decode($request->input('locations'));

        foreach ($locations as $location) 
        {
            $info_loc = $tour->info->locations()->where('id', $location->id)->first();
            $info_loc->update([
                'name' => $location->name,
                'description' => $location->description,
                'is_big' => str_contains($location->description, '<p>')
            ]);

            if ($location->is_new_image)
            {
                $file = $request->{'location_image_' . $location->id };

                $file_name = $location->id . '-' . bin2hex(random_bytes(5)) . '.' . $file->extension();
                
                Storage::disk('public_images')->delete($info_loc->local_storage_path . $info_loc->image_path);

                Storage::disk('public_images')->put(
                    $info_loc->local_storage_path . $file_name, 
                    file_get_contents($file->getRealPath())
                );
            
                $info_loc->update([
                    'image_path' => $file_name
                ]);
            }
        }

        return json_encode(['status' => 1]);
    }

    public function update_document(Request $request, Tour $tour)
    {
        $document = $request->document == 'null' ? null : $request->document;

        if ($tour->info->document_path != null)
        {
            Storage::disk('public_images')->delete($tour->local_storage_path . $tour->info->document_path);
        }

        if ($document == null)
        {
            $tour->info->update([
                'document_path' => null
            ]);
        }
        else
        {
            Storage::disk('public_images')->put(
                $tour->local_storage_path . 'document.' . $document->extension(), 
                file_get_contents($document->getRealPath())
            );

            $tour->info->update([
                'document_path' => 'document.' . $document->extension()
            ]);
        }

        return json_encode(['status' => 1]);
    }
}
