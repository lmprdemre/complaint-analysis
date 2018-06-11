<?php

namespace App\Http\Controllers;

use App\Api\NLP\NLPAPI;
use App\Models\Branches;
use App\Models\Categories;
use App\Models\ProductModels;
use App\Models\Products;
use Illuminate\Http\Request;

class AnalysisCtrl extends Controller
{
    public function doAnalysis(Request $request)
    {
        //Get complaint.
        $complaint = trim($request->complaint);

        //Process message with NLP API.
        $api = collect((new NLPAPI)->getNlpWords($complaint)->json_response);

        //Get roots of words that user entered from NLP API.
        $processed_complaint = [];
        foreach ($api['Keywords'] as $word) {
            $processed_complaint[] = strtolower($word->KeywordRoot);
        }

        $categories = Categories::all();
        $products = Products::all();
        $branches = Branches::all();


        $count = 0;
        //Match intent due to receive message.
        $matched_root_count = [];
        foreach ($categories as $category) {
            //Her kategori için girilen inputun kaç tane eşleşen kökü var bul.
            foreach ($processed_complaint as $complaint) {
                if (in_array($complaint, $category['keywords'], true)) {
                    $count++;
                }
            }
            $matched_root_count[] = [$category['id'] => $count];
            //array_push($matched_root_count,$p);
            $count = 0;
        }

        $min = 0;
        $max = 0;
        $cat_id = '';

        foreach ($matched_root_count as $index => $val) {
            foreach ($val as $i => $dval) {
                $max = $dval;
                if ($max > $min) {
                    $min = $max;
                    $cat_id = $i;
                }
            }
        }

        $found_product = null;
        foreach ($products as $product) {
            //Her kategori için girilen inputun kaç tane eşleşen kökü var bul.
            foreach ($processed_complaint as $complaint) {
                if (in_array($complaint, $product['keywords'], true)) {
                    $found_product = $product;
                    break;
                }
            }
            $matched_root_count[] = [$category['id'] => $count];
            //array_push($matched_root_count,$p);
            $count = 0;
        }


        //if cat_id is null, finded_category = null else findend cat = database intent.
        $cat_id !== '' ? $found_category = (new Categories)->find($cat_id) : $found_category = null;
        $found_product !== null ? (new Products)->find($cat_id) : null;

        $product_models = null;
        $found_model = null;

        if ($found_product !== null) {
            $product_models = (new ProductModels)->where('product_id', $found_product['id'])->get();
            if (isset($product_models)) {
                foreach ($product_models as $model) {
                    //Her kategori için girilen inputun kaç tane eşleşen kökü var bul.
                    foreach ($processed_complaint as $complaint) {
                        if (strtoupper($complaint) == strtoupper($model['model_name'])) {
                            $found_model = $model;
                            break;
                        }
                    }
                }
            }
        }

        $found_branch = null;
        foreach ($branches as $branch) {
            //Her kategori için girilen inputun kaç tane eşleşen kökü var bul.
            foreach ($processed_complaint as $complaint) {
                if (strtolower($complaint) == strtolower($branch['keywords'])) {
                    $found_branch = $branch;
                    break;
                }
            }
        }


        $response['cat_id'] = $found_category['id'];
        $response['cat_name'] = $found_category['name'];
        $response['product_id'] = $found_product['id'];
        $response['product_name'] = $found_product['name'];
        $response['product_model_id'] = $found_model['id'];
        $response['product_model_name'] = $found_model['model_name'];
        $response['branch_id'] = $found_branch['id'];
        $response['branch_name'] = $found_branch['name'];

        return response()->json($response);
    }

    public function doStatistics(Request $request)
    {
        $req = $request->complaint;
        $cat_id = trim($req['cat_id']);
        $product_id = trim($req['product_id']);
        $product_m_id = trim($req['product_model_id']);
        $branch_id = trim($req['branch_id']);

        //Increase category's complaint count.
        if ($cat_id !== null && $cat_id !== ''){
            $category = (new Categories)->find($cat_id);
            ++$category->c_count;
            $category->save();
        }

        //Increase product's complaint count.
        if ($product_id !== null && $product_id !== ''){
            $product = (new Products)->find($product_id);
            ++$product->c_count;
            $product->save();
        }

        //Increase product model's complaint count.
        if ($product_m_id !== null && $product_m_id !== ''){
            $product_m = (new ProductModels)->find($product_m_id);
            ++$product_m->c_count;
            $product_m->save();
        }

        //Increase branch's complaint count.
        if ($branch_id !== null && $branch_id !== ''){
            $branch = (new Branches)->find($branch_id);
            ++$branch->c_count;
            $branch->save();
        }

        $response['success'] = true;
        return response()->json($response);
    }
}
