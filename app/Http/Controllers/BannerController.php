<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banners = Banner::get()->toArray();

        return view('welcome', compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'file' => 'required',
            'lat' => 'required',
        ]);
        $photos = $request->file('file');
        $image = $photos->store('uploads', 'public');
        $uploadpath = Image::make(public_path("storage/{$image}"))->fit(480,320);
        $uploadpath ->save();
        $title = $request->input('title');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $tour = new Banner();
        $tour->title = $title;
        $tour->lat = $lat;
        $tour->lng = $lng;
        $tour->image = $image;

        $tour->save();

        return redirect()->back()->with('status', 'Banner Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
        return view('banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
