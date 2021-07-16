<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Tours\Tour;
use App\Models\Tours\TourLocation;
use App\Models\Tours\TourService;

class ApiToursController extends Controller
{
    public function show($id)
    {
        $tour = Tour::where('id', $id)->first();
        $info = $tour->info;

        return json_encode([
            'status' => 1,
            'data' => [
                'tour' => $tour,
                'info' => $info
            ]
        ]);
    }

    public function services($id)
    {
        $tour = Tour::where('id', $id)->first();
        $info = $tour->info;

        return json_encode([
            'status' => 1,
            'data' => [
                'services' => $info->services
            ]
        ]);
    }

    public function store_services($id, Request $r)
    {
        $input = (array) json_decode($r->input('input'));

        $tour = Tour::where('id', $id)->first();
        $info = $tour->info;

        $service = $info->services()->create([
            'description' => $input['description'],
            'is_included_in_price' => $input['is_in_price'],
        ]);

        return json_encode([
            'status' => 1,
            'data' => [
                'service' => $service
            ]
        ]);
    }


    public function update_services($tour_id, $id, Request $r)
    {
        $input = (array) json_decode($r->input('input'));

        $location = TourService::where('id', $id)->first();
        $location->update([
            'is_included_in_price' => $input['is_in_price'],
            'description' => $input['description'],
        ]);

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    }

    public function delete_services($tour_id, $id, Request $r)
    {
        $location = TourService::where('id', $id)->first();

        $location->delete();

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    }

    public function locations($id)
    {
        $tour = Tour::where('id', $id)->first();
        $info = $tour->info;

        return json_encode([
            'status' => 1,
            'data' => [
                'locations' => $info->locations
            ]
        ]);
    }

    public function delete_locations($tour_id, $id, Request $r)
    {
        $location = TourLocation::where('id', $id)->first();

        Storage::disk('public_images')
            ->delete('tours/' . $id . '/locations/' . $location->image_path);

        $location->delete();

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    }

    public function store_locations($id, Request $r)
    {
        $input = (array) json_decode($r->input('input'));
        $new_image = $r->new_image ? $r->new_image : null; 

        $tour = Tour::where('id', $id)->first();
        $info = $tour->info;

        $location = $info->locations()->create([
            'name' => $input['name'],
            'description' => $input['description'],
            'is_big' => !!count(explode('<p>', $input['description'])),
            'image_path' => 'TEMP'
        ]);

        $file_name = 'location-' . bin2hex(random_bytes(5)) . '.' . $new_image->extension();

        Storage::disk('public_images')->put(
            $location->local_storage_path . $file_name, 
            file_get_contents($new_image->getRealPath())
        );

        $location->update([
            'image_path' => $file_name,
        ]);

        return json_encode([
            'status' => 1,
            'data' => [
                'location' => $location
            ]
        ]);
    }

    public function update_locations($tour_id, $id, Request $r)
    {
        $input = (array) json_decode($r->input('input'));
        $new_image = $r->new_image ? $r->new_image : null; 

        $location = TourLocation::where('id', $id)->first();
        $location->update([
            'name' => $input['name'],
            'description' => $input['description'],
        ]);

        if ($new_image)
        {
            Storage::disk('public_images')
                ->delete('tours/' . $id . '/locations/' . $location->image_path);

            $file_name = 'location-' . bin2hex(random_bytes(5)) . '.' . $new_image->extension();

            Storage::disk('public_images')->put(
                $location->local_storage_path . $file_name, 
                file_get_contents($new_image->getRealPath())
            );
        
            $location->update([
                'image_path' => $file_name
            ]);
        }        
    }

    public function tags($id)
    {
        $tour = Tour::where('id', $id)->with('tags')->first();

        return json_encode([
            'status' => 1,
            'data' => [
                'tags' => $tour->tags
            ]
        ]);
    }

    public function store_tags($id, Request $r)
    {
        $input = (array) json_decode($r->input('input'));

        $tour = Tour::where('id', $id)->first();
        $tour->tags()->detach();
        $tour->tags()->attach($input['tags']);

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    } 

    public function update(Request $r, $id)
    {
        $input = (array) json_decode($r->input('input'));
        $new_card_image = $r->new_card_image ? $r->new_card_image : null;
    
        $tour = Tour::where('id', $id)->first();
        $tour->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'price' => $input['price'],
            'discount_price' => $input['discount_price'],
        ]);

        if ($new_card_image)
        {
            Storage::disk('public_images')
                ->delete('tours/' . $id . '/' . $tour->image_path);

            $file_name = 'card-' . bin2hex(random_bytes(5)) . '.' . $new_card_image->extension();

            Storage::disk('public_images')->put(
                $tour->local_storage_path . $file_name, 
                file_get_contents($new_card_image->getRealPath())
            );
        
            $tour->update([
                'image_path' => $file_name
            ]);
        }

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    }

    public function update_info(Request $r, $id)
    {
        $input = (array) json_decode($r->input('input'));

        $new_pdf_document = $r->new_pdf_document ? $r->new_pdf_document : null;

        $tour = Tour::where('id', $id)->first();

        $tour->info->update([
            'description' => $input['description'],
            'people_amount' => $input['people'],
            'duration' => $input['duration'],
            'video_href' => $input['video_href'],
            'season_id' => $input['season'],
            'complexity_id' => $input['complexity'],
        ]);

        if ($new_pdf_document)
        {
            if ($tour->info->document_path != null)
            {
                Storage::disk('public_images')
                    ->delete('tours/' . $id . '/' . $tour->info->document_path);
            }

            $new_pdf_document_name = 'document-' . bin2hex(random_bytes(5)) . $new_pdf_document->extension();

            Storage::disk('public_images')->put(
                $tour->local_storage_path . $new_pdf_document_name, 
                file_get_contents($new_pdf_document->getRealPath())
            );

            $tour->info->update([
                'document_path' => $new_pdf_document_name
            ]);
        }
        else if (!$input['is_pdf_document'] && $tour->info->document_path != null)
        {
            Storage::disk('public_images')
                ->delete('tours/' . $id . '/' . $tour->info->document_path);

            $tour->info->update([
                'document_path' => null
            ]);
        }
    }

    public function store(Request $r)
    {
        $input = (array) json_decode($r->input('input'));
        $card_image = $r->card_image;

        $tour = Tour::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'price' => $input['price'],
            'discount_price' => $input['discount_price'],
            'image_path' => 'TEMP',
        ]);

        $tour->save();

        $card_image_file_name = 'card-' . bin2hex(random_bytes(5)) . '.' . $card_image->extension();

        Storage::disk('public_images')->put(
            $tour->local_storage_path . $card_image_file_name, 
            file_get_contents($card_image->getRealPath())
        );
    
        $tour->update([
            'image_path' => $card_image_file_name
        ]);

        return json_encode([
            'status' => 1,
            'data' => [ 'id' => $tour->id ]
        ]);
    }

    public function store_info(Request $r)
    {
        $input = (array) json_decode($r->input('input'));
        
        $pdf_document = $r->pdf_document ? $r->pdf_document : null;
        $pdf_document_name = null;

        $tour_id = $input['tour_id'];

        $tour = Tour::where('id', $tour_id)->first();
        
        if ($pdf_document)
        {
            $pdf_document_name = 'document-' . bin2hex(random_bytes(5)) . $pdf_document->extension();

            Storage::disk('public_images')->put(
                $tour->local_storage_path . $pdf_document_name, 
                file_get_contents($pdf_document->getRealPath())
            );
        }
        
        $info = $tour->info()->create([
            'description' => $input['description'],
            'duration' => $input['duration'],
            'people_amount' => $input['people'],
            'season_id' => $input['season'],
            'complexity_id' => $input['complexity'],
            'video_path' => $input['video_href'],
            'document_path' => $pdf_document_name,
        ]);

        return json_encode([
            'status' => 1,
            'data' => [ 'id' => $info->id ]
        ]);
    }
}
