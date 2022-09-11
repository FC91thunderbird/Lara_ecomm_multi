<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderStoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('layouts.admin.Slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('layouts.admin.Slider.add');
    }

   
    public function store(SliderStoreRequest $request)
    {
        if($request->file('slider_image')){
            $upload_location = 'upload/sliders/';
            $file = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(870,370)->save($upload_location.$name_gen);
            $save_url = $upload_location.$name_gen;

            Slider::create([
                'slider_status' => $request->input('slider_status'),
                'slider_name' => $request->input('slider_name'),
                'slider_title' => $request->input('slider_title'),
                'slider_description' => $request->input('slider_description'),
                'slider_image' => $save_url,
            ]);
        }else{
            Slider::create([
                'slider_status' => $request->input('slider_status'),
                'slider_name' => $request->input('slider_name'),
                'slider_title' => $request->input('slider_title'),
                'slider_description' => $request->input('slider_description'),
            ]);
        }

        $notification = [
            'success' => 'Slider Created Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('slider.index')->with($notification);
    }

   
    public function show(Slider $slider)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('layouts.admin.Slider.edit', compact('slider'));
    }

   
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        if($request->file('slider_image')){
            if($slider->slider_image !='https://source.unsplash.com/random'){
                unlink($slider->slider_image);
            }
            $upload_location = 'upload/sliders/';
            $file = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(870,370)->save($upload_location.$name_gen);
            $save_url = $upload_location.$name_gen;

            $slider->update([
                'slider_status' => $request->input('slider_status'),
                'slider_name' => $request->input('slider_name'),
                'slider_title' => $request->input('slider_title'),
                'slider_description' => $request->input('slider_description'),
                'slider_image' => $save_url,
            ]);
        }else{
            $slider->update([
                'slider_status' => $request->input('slider_status'),
                'slider_name' => $request->input('slider_name'),
                'slider_title' => $request->input('slider_title'),
                'slider_description' => $request->input('slider_description'),
            ]);
        }

        $notification = [
            'success' => 'Slider Updated Successfully!!!',
            'alert-type' => 'success'
        ];

        return redirect()->route('slider.index')->with($notification);
    }

   
    public function destroy(Slider $slider)
    {
        //
    }
}
