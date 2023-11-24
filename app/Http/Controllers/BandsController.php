<?php

namespace App\Http\Controllers;

use App\Models\Band as BandModel;
use Illuminate\Http\Request;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try 
        {
            $bands = BandModel::get();
            return $this->response($bands, $this->message($bands, '', ''));
        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try 
        {

        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try 
        {

        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try 
        {

        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try 
        {

        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }
    }
}
