<?php

namespace Marrs\MarrsCatalog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Marrs\MarrsCatalog\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    private $brand;

    private $extensions = [
        "jpg",
        "JPG",
        "jpeg",
        "JPEG",
        "png",
        "PNG"
    ];

    public function __construct(
        Brand $brand
    ) {
        $this->brand = $brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brand->all();
        return view('marrs-catalog::admin.cruds.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marrs-catalog::admin.cruds.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = $this->brand->create([
            'description' => $request->description,
        ]);

        if ($request->image) {
            $image = $this->uploadfile($request->image);
            $brand->image = $image;
            $brand->save();
        }

        return redirect()->route('admin.catalog.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $brand = $this->brand->find($request->brand);
        return view('marrs-catalog::admin.cruds.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $brand = $this->brand->find($request->brand);
        return view('marrs-catalog::admin.cruds.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $brand = $this->brand->find($request->brand);
        $brand->update([
            'description' => $request->description,
        ]);

        if ($request->image) {
            $image = $this->uploadfile($request->image);
            $brand->image = $image;
            $brand->save();
        }

        return redirect()->route('admin.catalog.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = $this->brand->find($request->brand);
        $brand->delete();
        return redirect()->route('admin.catalog.brands.index');
    }

    public function uploadfile($file)
    {
        $server = str_replace(':8000', '', $_SERVER['HTTP_HOST']);
        $destinationPath = 'storage/' . $server . '/images/brands/';
        if (in_array($file->extension(), $this->extensions)) {
            $size  = $file->getSize();
            $narq = explode(".", $file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymd_his') . rand(0, 100000) . '.' . $extension;
            $archive = $destinationPath . $fileName;
            $file->move($destinationPath, $archive);
            return $archive;
        } else {
            return null;
        }
    }
}
