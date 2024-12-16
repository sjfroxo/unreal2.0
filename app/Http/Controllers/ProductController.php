<?php

namespace App\Http\Controllers;

use App\Filters\ProductsFilter;
use App\Filters\PropertiesFilter;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request, ProductsFilter $productsFilter, PropertiesFilter $propertiesFilter): View
    {
//        dd($request->all());

        $products = Product::query()
            ->select('products.id', 'products.name', 'products.price', 'products.mileage')
            ->with([
                'properties' => fn($query) => $query->select('name')
            ])
            ->filter($productsFilter->setRequest($request))
            ->filter($propertiesFilter->setRequest($request))
//            ->dd()
            ->simplePaginate(10)
            ->appends($request->query());

        $productsName = Product::query()->distinct('name')->pluck('name');

        $properties = Property::query()
            ->with('propertiesList')
            ->get();

//        $properties = collect([
//            'Кузов',
//            'Тип двигателя',
//            'Привод',
//            'Коробка передач',
//            'Объем двигателя',
//            'Расход топлива',
//            'Цвет'
//        ]);
//
//        $results = [];
//        foreach ($properties as $propertyName) {
//            $results[$propertyName] = Property::query()
//                ->where('name', $propertyName)
//                ->with(['propertiesList' => fn($query) => $query->select('property_id', 'value')])
//                ->get();
//        }

//        $carBodies = $results['Кузов'];
//        $engineTypes = $results['Тип двигателя'];
//        $driveTypes = $results['Привод'];
//        $transmissions = $results['Коробка передач'];
//        $engineCapacities = $results['Объем двигателя'];
//        $fuelConsumptions = $results['Расход топлива'];
//        $carsColor = $results['Цвет'];
//
//
//        dd($properties);
        return view('products', compact(
            'products',
            'productsName',
            'properties'
//            'carBodies',
//            'engineTypes',
//            'driveTypes',
//            'transmissions',
//            'carsColor',
//            'engineCapacities',
//            'fuelConsumptions'
        ));
    }
}




