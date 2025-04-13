<?php

namespace App\Http\Controllers\Api\Country;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Country\CountryService;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    use ApiResponse;

    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $countries = $this->countryService->all();
        return $this->successResponse($countries, 'Countries fetched successfully');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_deleted' => 'boolean'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        return $this->countryService->store($request->all());
    }

    public function show($id)
    {
        $country = $this->countryService->find($id);
        return $this->successResponse($country, 'Country fetched successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'sometimes|required|string|max:255',
            'name_ar' => 'sometimes|required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_deleted' => 'boolean'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        return $this->countryService->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->countryService->destroy($id);
    }
}