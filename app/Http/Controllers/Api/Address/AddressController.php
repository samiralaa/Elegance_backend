<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreRequestAddress;
use App\Models\Address;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use ApiResponseTrait;
    protected $AddressService;
    public function __construct(Address $AddressService)
    {
        $this->AddressService = $AddressService;
    }

    public function index(){
        try {
            // $brands = $this->brandService->getAllBrands();
            $address =  $this->AddressService->all();
            return $this->successResponse($address);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());

        }
        //     if ($address) {
        //         return response()->json([
        //             'message' => 'Address all found',
        //             'data' => $address
        //         ], 200);
        //     }

        //     return response()->json([
        //         'message' => 'Address not found all'
        //     ], 404);
        }

    public function store(StoreRequestAddress $request)
    {
        // $data = $request->validated();
        // $address = $this->AddressService->create($data);
        // return response()->json([
        //     'message' => 'Address created successfully',
        //     'data' => $address
        // ], 201);
        try {
            $data = $request->validated();
        $address = $this->AddressService->create($data);
            return $this->successResponse($address);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());

        }

    }

    public function show(int $id)
    {

        // $address = $this->AddressService->find($id);
        try {
            $address = $this->AddressService->find($id);
            return $this->successResponse($address);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());

        }
        //  dd($address);
        // if ($address) {
        //     return response()->json([
        //         'message' => 'Address found',
        //         'data' => $address
        //     ], 200);
        // }

        // return response()->json([
        //     'message' => 'Address not found mazen'
        // ], 404);

    }
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $address = $this->AddressService->find($id);
        // if ($address) {
        //     $address->update($data);
        //     return response()->json([
        //         'message' => 'Address updated successfully',
        //         'data' => $address
        //     ], 200);
        // }
        // return response()->json([
        //     'message' => 'Address not found'
        // ], 404);
        try {
            $data = $request->all();
            $address = $this->AddressService->find($id);
            $address->update($data);
            return $this->successResponse($address);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());

        }
    }

    public function delete(int $id)
    {
        try {
            $address = $this->AddressService->find($id);
            return $this->successResponse($address);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());

        }
        // $address = $this->AddressService->find($id);
        // if ($address) {
        //     $address->delete();
        //     return response()->json([
        //         'message' => 'Address deleted successfully'
        //     ], 200);
        // }
        // return response()->json([
        //     'message' => 'Address not found'
        // ], 404);
    }
}
