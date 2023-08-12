<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Ad::all());
        $ads = Ad::orderByDesc('id')->get();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name')->get();

        return view("admin.ads.create", compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $val_data = $request->validated();

        // USED TO RETRIEVE NEXT ID THAT WILL BE USED
        $statement = DB::select("SHOW TABLE STATUS LIKE 'ads'");
        $nextId = $statement[0]->Auto_increment;

        $val_data["slug"] = Ad::generateSlug($val_data["name"]) . "-" . $nextId;

        $val_data["user_id"] = Auth::id();
        if ($request->hasFile("cover_image")) {
            $imagePath = Storage::put("uploads", $val_data["cover_image"]);
            $imagePathWithoutPrefix = str_replace("uploads/", "", $imagePath);
            $val_data["cover_image"] = $imagePathWithoutPrefix;
        }
        if ($request->hasFile("cover_image2")) {
            $imagePath = Storage::put("uploads", $val_data["cover_image2"]);
            $imagePathWithoutPrefix = str_replace("uploads/", "", $imagePath);
            $val_data["cover_image2"] = $imagePathWithoutPrefix;
        }
        if ($request->hasFile("cover_image3")) {
            $imagePath = Storage::put("uploads", $val_data["cover_image3"]);
            $imagePathWithoutPrefix = str_replace("uploads/", "", $imagePath);
            $val_data["cover_image3"] = $imagePathWithoutPrefix;
        }
        if ($request->hasFile("cover_image4")) {
            $imagePath = Storage::put("uploads", $val_data["cover_image4"]);
            $imagePathWithoutPrefix = str_replace("uploads/", "", $imagePath);
            $val_data["cover_image4"] = $imagePathWithoutPrefix;
        }
        if ($request->hasFile("cover_image5")) {
            $imagePath = Storage::put("uploads", $val_data["cover_image5"]);
            $imagePathWithoutPrefix = str_replace("uploads/", "", $imagePath);
            $val_data["cover_image5"] = $imagePathWithoutPrefix;
        }
        $newAd = Ad::create($val_data);
        // dd($newAd);

        if ($request->has('brands')) {
            $newAd->brands()->attach($request->brands);
        }

        return to_route("admin.ads.index")->with("message", "Annuncio aggiunto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
