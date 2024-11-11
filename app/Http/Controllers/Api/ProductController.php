<?php


namespace App\Http\Controllers\Api;


use App\Exports\ProductsExport;
use App\Imports\ProductImport;
use App\Request\Products\ImportProductsExcelRequest;
use App\Request\User\CreateProductRequest;
use App\Services\ProductService;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends BaseController
{

    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getProducts();
    }

    public function store(CreateProductRequest $request)
    {
        if (!empty($request->getErrors())) {
            return response()->json($request->getErrors(), Response::HTTP_FORBIDDEN);
        }
        $data    = $request->request()->all();
        $product = $this->productService->createProduct($data);

        return $this->sendResponse($product);
    }

    public function update($id, CreateProductRequest $request)
    {
        if (!empty($request->getErrors())) {
            return response()->json($request->getErrors(), Response::HTTP_FORBIDDEN);
        }
        $data    = $request->request()->all();
        $product = $this->productService->updateProduct($id, $data);

        return $this->sendResponse($product);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return $this->sendResponse('Deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    public function importExcel(ImportProductsExcelRequest $request)
    {
        if (!empty($request->getErrors())) {
            return response()->json($request->getErrors(), Response::HTTP_FORBIDDEN);
        }
        Excel::import(new ProductImport(), $request->request()->file('file')->store('files'));

        return  $this->sendResponse('Saved Successfully');
    }

}
