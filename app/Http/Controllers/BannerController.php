<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::with('image')->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = Banner::create([
            'title' => $request->title,
            'header' => $request->header,
            'short_intro' => $request->short_intro,
            'link' => $request->link,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->store('banner');
            $banner->image()->create([
                'image' => $image
            ]);
        }

        toastr()->success('Banner Created Successfully!');
        return redirect(route('banners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {

        $data = $request->safe()->except(['image']);
        /** check if banner has image */
        if ($request->hasFile('image')) {
            /** upload new image */
            $image = $request->image->store('banner');
            /** delete old image */
            $banner->deleteImage();
            $banner->image()->update([
                'image' => $image
            ]);
        }

        $banner->update($data);

        toastr()->success('Banner Updated Successfully!');
        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        /** delete image from storage */
        $banner->deleteImage();

        /** delete banner permanently */
        $banner->forceDelete();

        toastr()->error('Banner Deleted Successfully!');
        return redirect(route('banners.index'));
    }
}
