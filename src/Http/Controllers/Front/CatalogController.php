<?php

namespace Marrs\MarrsCatalog\Http\Controllers\Front;

use Marrs\MarrsCatalog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Marrs\MarrsCatalog\Models\Product;
//use App\Models\ProductRead;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->term;
        $type = $request->type;
        $date = date('Y-m-d');
        $tag = "";

        $notices = new Product;



        if ($term) {
            $notices = $notices->where(function ($sql) use ($term) {
                $sql->where('body', 'LIKE', '%' . $term . '%')
                    ->orwhere('title', 'LIKE', '%' . $term . '%')
                    ->orwhere('excerpt', 'LIKE', '%' . $term . '%');
            });
        }
        //se categorias forem selecionadas devem ser mostrados apenas os products
        if ($request->category) {
            $notices = $notices->where('category_id', '=', $request->category);
        }
        //se tags forem clicadas devem ser mostrados apenas os products
        if ($request->tag) {
            $notices = $notices->where('meta_keywords', 'LIKE', '%' . $request->tag . '%');
            $tag = $request->tag;
        }

        $products = $notices->where('status', 'PUBLISHED')
            ->where('publish', '<=', $date)
            ->orderby('publish', 'desc')
            ->paginate(8);


        return view('marrs-catalog::front.catalog.index', ['products' => $products]);
    }

    public function product(Request $request)
    {
        //$ip = Request::ip();
        $product = Product::where('slug', $request->slug)->first();

        /*ProductRead::create([
            'ip' => $ip,
            'product_id' => $product->id
        ]);*/

        //gerenciando products relacionados
        $relateds = [];
        if ($product->meta_keywords) {
            $tags = explode(',', $product->meta_keywords);
            $relateds = new Product;
            $relateds = $relateds->where(function ($q) use ($tags) {
                foreach ($tags as $tag) {
                    $q->orwhere('meta_keywords', 'LIKE', '%' . trim($tag) . '%');
                }
            });

            $date = date('Y-m-d');
            $relateds = $relateds
                ->where('status', 'PUBLISHED')
                ->where('publish', '<=', $date)->where('id', '<>', $product->id)
                ->orderby('publish', 'desc')
                ->limit(3)
                ->get();
        }
        return view('marrs-catalog::front.catalog.single', [
            'product' => $product,
            'relateds' => $relateds
        ]);
    }
}
