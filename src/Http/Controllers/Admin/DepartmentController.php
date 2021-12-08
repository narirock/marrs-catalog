<?php

namespace Marrs\MarrsCatalog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Marrs\MarrsAdmin\Traits\UploadFile;
use Marrs\MarrsCatalog\Http\Requests\DepartmentRequest;
use Marrs\MarrsCatalog\Models\Department;

class DepartmentController extends Controller
{
    use UploadFile;

    private $department;

    public function __construct(
        Department $department
    ) {
        $this->department = $department;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $departments = $this->department->get();
        return view('marrs-catalog::admin.cruds.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $departments = $this->listnotself();
        return view('marrs-catalog::admin.cruds.departments.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DepartmentRequest $request)
    {
        $department = $this->department->create([
            "name"          => $request->name,
            "description"   => $request->description,
            "slug"          => $request->slug,
            "image"         => $request->image,
            "department_id"   => $request->department_id,
            "enable"        => $request->enable == '1' ? true : false,
            "listalls" => $request->listalls,
            "hasmenu" => $request->hasmenu,
            "card"        => $request->card == '1' ? true : false,
        ]);

        $this->updateImage($request->file, $department, $request->remove_image);

        return redirect()->route('admin.catalog.departments.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $department = $this->department->find($id);
        return view('marrs-catalog::admin.cruds.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $department = $this->department->with('image')->find($id);
        $departments = $this->listnotself($id);
        return view('marrs-catalog::admin.cruds.departments.edit', compact('department', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($id, DepartmentRequest $request)
    {
        $department = $this->department->find($id);

        $department->update([
            "name"          => $request->name,
            "description"   => $request->description,
            "slug"          => $request->slug,
            "image"         => $request->image,
            "department_id"   => $request->department_id,
            "enable"        => $request->enable == '1' ? true : false,
            "listalls" => $request->listalls,
            "hasmenu" => $request->hasmenu,
            "card"        => $request->card == '1' ? true : false,
        ]);


        $this->updateImage($request->file, $department, $request->remove_image);

        return redirect()->route('admin.catalog.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $this->department->find($id)->delete();
        return redirect()->route('admin.catalog.departments.index');
    }

    public function listnotself($id = null)
    {
        $departments = $this->department->where('id', '<>', $id)->orderby('name')->pluck("name", "id");
        return $departments;
    }

    public function updateImage($file, $department, $delete = 'false')
    {


        if ($delete == 'true') {
            $department->image()->delete();
        }


        if (is_file($file)) {

            $department->image()->delete();

            $image = $this->uploadFile(
                $file,
                'catalog/department/',
                'image'
            );

            $department->image()->create(['link' => $image, 'order' => 0]);
        }
    }
}
