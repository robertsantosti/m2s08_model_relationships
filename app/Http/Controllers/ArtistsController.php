<?php

namespace App\Http\Controllers;

use App\Models\Artist as ArtistModel;
use App\Models\ArtistGender as ArtistGenderModel;
use App\Models\Gender as GenderModel;
use App\Models\Instrument as InstrumentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtistsController extends Controller
{
    public function index()
    {
        try {
            $artists = ArtistModel::with(['instrument'])->get();
            $message = $artists->count()." ".($artists->count() === 1 ? 'artista encontrado' : 'artistas encontrados')." com sucesso.";
            return $this->response($artists, $message);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = [
                'name' => 'required | min: 2',
                'birthdate' => 'required',
                'bio' => 'string',
                'is_singer'=> 'boolean',
                'favorite_instrument' => 'string',
                'genders' => 'array'
            ];

            $request->validate($validator);

            $payloadArtist = [
                'name' => $request->input('name'),
                'birthdate' => Carbon::parse($request->input('birthdate')),
                'bio' => $request->input('bio'),
                'is_singer'=> empty($request->input('is_singer')) ? false : $request->input('is_singer'),
            ];

            $artist = ArtistModel::create($payloadArtist);

            foreach($request->input('genders') as $name)
            {
                $gender = GenderModel::firstOrCreate(['name' => $name]);
                ArtistGenderModel::firstOrCreate(
                    [
                        'artist_id' => $artist->id,
                        'gender_id'=> $gender->id
                    ]
                );
            }

            if(!empty($request->input('favorite_instrument')))
            {
                $instrument = InstrumentModel::firstOrCreate(['name'=> $request->input('favorite_instrument')]);
                $artist->favorite_instrument_id = $instrument->id;
                $artist->save();
            }

            return $this->response($artist, "Artista $artist->name cadatrado com sucesso.");

        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $artist = ArtistModel::with(['instrument', 'genders'])->find($id);
            return empty($artist)
                ? $this->error('Artista não encontrado', Response::HTTP_NOT_FOUND)
                : $this->response($artist, "Artista $artist->name encontrado com sucesso");
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
        
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
        
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
