<?php

namespace Marrs\MarrsCatalog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Marrs\MarrsCatalog\Models\Product;
use Marrs\MarrsCatalog\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\CorreiosService;
use Marrs\MarrsCatalog\Models\Brand;
use Marrs\MarrsCatalog\Models\Configuration;
use Marrs\MarrsCatalog\Models\ProductOption;
use Marrs\MarrsCatalog\Models\ProductOptionValue;
use Marrs\MarrsCatalog\Models\ProductPromotion;
use Marrs\MarrsCatalog\Models\Department;
use App\Repositories\Contracts\PaymentInterface;
use Marrs\MarrsAdmin\Traits\UploadFile;
use Marrs\MarrsCatalog\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use UploadFile;

    private $product;
    private $image;

    public function __construct(
        Product $product,
        ProductImage $image

    ) {
        $this->product = $product;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = $this->product->with('images')->get();
        return view('marrs-catalog::admin.cruds.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $brands  = Brand::pluck('description', 'id');
        $productslist = $this->product->pluck('name', 'id');
        $listdepartments = Department::pluck('name', 'id');
        return view('marrs-catalog::admin.cruds.products.create', compact('brands', 'productslist', 'listdepartments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->product->create($request->all());
        $this->updateImages($request->arquivo, $product);
        ## salvando promoções ##
        $promotions = json_decode($request->promotions);
        $mantainPromotion = array();
        if (is_array($promotions)) {
            foreach ($promotions as $promotion) {
                if (@$promotion->id > 0) {
                    $prm = ProductPromotion::find($promotion->id);
                    $prm->update([
                        'client_type_id' => @$promotion->client_type_id,
                        'price' => $promotion->price,
                        'start' => $promotion->start,
                        'end' => $promotion->end,
                        'catalog_product_id' => $product->id,
                    ]);
                    $mantainPromotion[] = $promotion->id;
                } else {
                    $prm  = ProductPromotion::create([
                        'client_type_id' => @$promotion->client_type_id,
                        'price' => $promotion->price,
                        'start' => $promotion->start,
                        'end' => $promotion->end,
                        'catalog_product_id' => $product->id,
                    ]);
                    $mantainPromotion[] = $prm->id;
                }
            }
        }
        $test = $product->promotions()->whereNotIn('id', $mantainPromotion)->delete();

        ## salvand opções ##
        $options = json_decode($request->options);
        if (is_array($options)) {
            foreach ($options as $option) {

                $opt = $product->options()->create([
                    'name' => $option->name
                ]);


                foreach ($option->values as $value) {
                    $vl = $opt->values()->create([
                        "reduce" => @$value->reduce,
                        "value" => @$value->value,
                        "quantity" => @$value->quantity,
                        "price" => @$value->price,
                        "points" => @$value->points,
                        "weight" => @$value->weight,
                    ]);
                }
            }
        }

        ## salvando relacionados ##
        if ($request->relatedsData != "") {
            $relateds = json_decode($request->relatedsData);
            foreach ($relateds as $related) {
                $product->relateds()->create([
                    'related_id' => $related->related->valor
                ]);
            }
        }
        ## salvando departamentos ##
        if ($request->departmentsData != "") {
            $departments = json_decode($request->departmentsData);
            foreach ($departments as $department) {
                $product->departments()->create([
                    'catalog_department_id' => $department->department->valor
                ]);
            }
        }

        ## salvando detalhes ##
        $details = json_decode($request->details);
        if (is_array($details)) {
            foreach ($details as $detail) {
                $product->details()->create([
                    'field' => $detail->field,
                    'description' => $detail->description
                ]);
            }
        }

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->product;
        $product = $this->product->find($id)->delete();
        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {

        $id = $request->product;
        $productslist = $this->product->pluck('name', 'id');
        $listdepartments = Department::pluck('name', 'id');
        $product = $this->product->with('images')->find($id);
        $brands  = Brand::pluck('description', 'id');
        $files = $product->images()->orderby('order')->get();
        ## obtendo departamentos ##
        $departments = $product->departments;
        $departmentsData = $departments->map(function ($department) {
            try {
                $d = Department::find($department->catalog_department_id);
                if ($d) {
                    return array(
                        'department_id' => array(),
                        'department' => array(
                            'valor' => $department->catalog_department_id,
                            'label' => $d->name,
                        )
                    );
                }
            } catch (\Exception $e) {
                //dump($department);
                // echo $e->getMessage();
            }
        });

        $product->departmentsData = json_encode($departmentsData);
        ## obtendo relacionados##
        $dbrelateds = $product->relateds;
        $relatedsData = $dbrelateds->map(function ($related) {
            $product = Product::find($related->related_id);
            if ($product) {
                return array(
                    'related' => array(
                        'valor' => $related->related_id,
                        'label' => $product->name
                    )
                );
            }
        });
        $product->relatedsData = json_encode($relatedsData);
        ## obtendo promoçoes ##
        $promotions = $product->promotions;
        ## obtendo opcoes ##
        $opt = $product->options;
        $options = $opt->map(function ($option) {
            return array(
                "id" => $option->id,
                "name" => $option->name,
                "values" => $option->values->map(function ($value) {
                    return array(
                        "id" => $value->id,
                        "quantity" => $value->quantity,
                        "reduce" => $value->reduce,
                        "value" => $value->value,
                        "price" => $value->price,
                        "points" => $value->points,
                        "weight" => $value->weight,
                    );
                })
            );
        });
        $details = json_encode($product->details->map(function ($value) {
            return array(
                'field' => $value->field,
                'description' => $value->description
            );
        }));
        return view('marrs-catalog::admin.cruds.products.edit', compact('product', 'files', 'brands', 'promotions', 'options', 'details', 'listdepartments', 'productslist'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ProductRequest $request)
    {

        $id = $request->product;
        $product = $this->product->find($id);
        $product->update($request->all());

        $this->updateImages($request->arquivo, $product);

        ## salvando promoções ##
        $promotions = json_decode($request->promotions);
        $mantainPromotion = array();
        if (is_array($promotions)) {
            foreach ($promotions as $promotion) {
                if (@$promotion->price) {
                    if (@$promotion->id > 0) {
                        $prm = ProductPromotion::find($promotion->id);
                        $prm->update([
                            'client_type_id' => @$promotion->client_type_id,
                            'price' => $promotion->price,
                            'start' => $promotion->start,
                            'end' => $promotion->end,
                            'catalog_product_id' => $product->id,
                        ]);
                        $mantainPromotion[] = $promotion->id;
                    } else {
                        $prm  = ProductPromotion::create([
                            'client_type_id' => @$promotion->client_type_id,
                            'price' => $promotion->price,
                            'start' => $promotion->start,
                            'end' => $promotion->end,
                            'catalog_product_id' => $product->id,
                        ]);
                        $mantainPromotion[] = $prm->id;
                    }
                }
            }
        }
        $test = $product->promotions()->whereNotIn('id', $mantainPromotion)->delete();

        ## salvand opções ##
        $options = json_decode($request->options);
        $mantainOptions = array();
        if (is_array($options)) {
            foreach ($options as $option) {
                $mantainValues = array();
                if (@$option->id > 0) {
                    $opt = $product->options()->find($option->id);
                    $opt->update([
                        'name' => $option->name
                    ]);
                    $mantainOptions[] = $opt->id;
                } else {
                    $opt = $product->options()->create([
                        'name' => $option->name
                    ]);
                    $mantainOptions[] = $opt->id;
                }

                foreach ($option->values as $value) {
                    if (@$value->id > 0) {
                        $vl = $opt->values()->find($value->id);
                        $vl->update([
                            "reduce" => @$value->reduce,
                            "value" => @$value->value,
                            "quantity" => @$value->quantity,
                            "price" => @$value->price ? $value->price : 0,
                            "points" => @$value->points,
                            "weight" => @$value->weight,
                        ]);
                        $mantainValues[] = $vl->id;
                    } else {
                        $vl = $opt->values()->create([
                            "reduce" => @$value->reduce,
                            "value" => @$value->value,
                            "quantity" => @$value->quantity,
                            "price" => @$value->price ? $value->price : 0,
                            "points" => @$value->points,
                            "weight" => @$value->weight,
                        ]);
                        $mantainValues[] = $vl->id;
                    }
                }
                $opt->values()->whereNotIn('id', $mantainValues)->delete();
            }
        }
        $product->options()->whereNotIn('id', $mantainOptions)->delete();

        ## salvando relacionados ##
        $relateds = json_decode($request->relatedsData);
        $product->relateds()->delete();
        foreach ($relateds as $related) {
            $product->relateds()->create([
                'related_id' => $related->related->valor
            ]);
        }

        ## salvando departamentos ##
        $departments = json_decode($request->departmentsData);
        $product->departments()->delete();
        foreach ($departments as $department) {
            $product->departments()->create([
                'catalog_department_id' => $department->department->valor
            ]);
        }

        ## salvando detalhes ##
        $details = json_decode($request->details);
        $product->details()->delete();
        if (is_array($details)) {
            foreach ($details as $detail) {
                $product->details()->create([
                    'field' => $detail->field,
                    'description' => $detail->description
                ]);
            }
        }

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->product;
        $product = $this->product->find($id)->delete();
        return redirect()->route('admin.catalog.products.index');
    }

    public function getDestaques()
    {
        $products = $this->product->with('images')->limit(5)->get();
        return $products;
    }

    public function getGalery()
    {
        $products = $this->product->with('images')->limit(8)->get();
        return $products;
    }

    public function getPrice(Request $request)
    {

        $aditional = 0;
        if ($request->option) {
            foreach ($request->option as $option) {
                $productOption = ProductOptionValue::find($option);
                $aditional += $productOption->price;
            }
        }

        $product = Product::find($request->catalog_product_id);

        if ($product->promo) {
            $response = array(
                'promo' => number_format(($product->promo->price + $aditional), 2, ',', '.'),
                'price' => number_format(($product->price + $aditional), 2, ',', '.'),
            );
        } else {
            $response = array(
                'promo' => null,
                'price' => number_format(($product->price + $aditional), 2, ',', '.'),
            );
        }

        return $response;
    }

    public function getInstallments($value)
    {
        $configuration = Configuration::find(1);
        $payment = app(PaymentInterface::class, [$configuration->payment_service]);
        return $payment->calcInstallments($value);
    }

    public function copy($id)
    {
        $productslist = $this->product->pluck('name', 'id');
        $listdepartments = Department::pluck('name', 'id');
        $product = $this->product->find($id);
        $product->name = $product->name . " copia";
        $product->slug = $product->slug . "-copia";
        $brands  = Brand::pluck('description', 'id');
        $files = $product->images()->orderby('order')->get();
        ## obtendo departamentos ##
        $departments = $product->departments;
        $departmentsData = $departments->map(function ($department) {
            try {
                $d = Department::find($department->catalog_department_id);
                if ($d) {
                    return array(
                        'department_id' => array(),
                        'department' => array(
                            'valor' => $d->id,
                            'label' => $d->name,
                        )
                    );
                }
            } catch (\Exception $e) {
                //dump($department);
                // echo $e->getMessage();
            }
        });
        $product->departmentsData = json_encode($departmentsData);
        ## obtendo relacionados##
        $dbrelateds = $product->relateds;
        $relatedsData = $dbrelateds->map(function ($related) {
            return array(
                'related' => array(
                    'valor' => $related->related_id,
                    'label' => Product::find($related->related_id)->name
                )
            );
        });
        $product->relatedsData = json_encode($relatedsData);
        ## obtendo promoçoes ##
        $promotions = $product->promotions->map(function ($promotion) {
            $promotion->id  = null;
            $promotion->product_id =  null;
            return $promotion;
        });
        ## obtendo opcoes ##
        $opt = $product->options;
        $options = $opt->map(function ($option) {
            return array(
                "id" => $option->id,
                "name" => $option->name,
                "values" => $option->values->map(function ($value) {
                    return array(
                        "id" => $value->id,
                        "quantity" => $value->quantity,
                        "reduce" => $value->reduce,
                        "value" => $value->value,
                        "price" => $value->price,
                        "points" => $value->points,
                        "weight" => $value->weight,
                    );
                })
            );
        });
        $details = json_encode($product->details->map(function ($value) {
            return array(
                'field' => $value->field,
                'description' => $value->description
            );
        }));
        return view('marrs-catalog::admin.cruds.products.copy', compact('product', 'files', 'brands', 'promotions', 'options', 'details', 'listdepartments', 'productslist'));
    }

    public function xls()
    {


        $fileName = 'produtos.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Nome', 'Dias Confecção', 'Modelo', 'Marca', 'Preço');

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns, ';');
            $total = Product::count();
            for ($i = 0; $i < ($total / 30000); $i++) {
                Product::skip(intval($i) * 30000)
                    ->limit(30000)
                    ->get()
                    ->map(function ($e) use ($file) {
                        fputcsv($file, [$e->name, $e->makeupdays, $e->model, @$e->brand->description, @$e->price], ';');
                    });
            }
            fclose($file);
        };



        return response()->stream($callback, 200, $headers);


        //return Excel::download(new CustomersExport, 'clientes.xlsx');
    }


    public function updateImages($images, $product)
    {

        $product->images()->update(['order' => null]);
        if (@count($images) > 0) {
            foreach ($images as $key => $image) {
                $i = $product->images()->where('link', 'LIKE', $image)->first();
                if ($i) {
                    $i->update(['order' => $key]);
                } else {
                    $product->images()->create(['link' => $image, 'order' => $key]);
                }
            }
        }
        $product->images()->where('order', null)->delete();
    }
}
