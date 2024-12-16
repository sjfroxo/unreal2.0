<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        svg {
            width: 0.5%;
        }
    </style>
</head>
<body>
<div class="container my-5 py-5 px-5 mx-5">
    <a href="{{ route('products.index') }}" class="btn">Сбросить фильтры</a>
    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
        <div class="d-flex">
            <div>
                <h5>Авто</h5>
                @foreach($productsName as $productName)
                    <div class="form-check m-2">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="product_name"
                            value="{{ $productName }}"
                            id="product_name_{{ Str::slug($productName) }}">
                        <label
                            class="form-check-label"
                            for="product_name_{{ Str::slug($productName) }}">
                            {{ $productName }}
                        </label>
                    </div>
                @endforeach
            </div>

            @foreach($properties as $property)
                <div>
                    <h5>{{ $property->name }}</h5>
                    @foreach($property->propertiesList as $prop)
                        <div class="form-check m-2">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="{{ $property->slug }}"
                                value="{{ $prop->value }}"
                                id="car_body_{{ Str::slug($prop->value) }}">
                            <label
                                class="form-check-label"
                                for="car_body_{{ Str::slug($prop->value) }}">
                                {{ $prop->value }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

{{--            <div>--}}
{{--                @foreach($carBodies as $carBody)--}}
{{--                    <h5>{{ $carBody->name }}</h5>--}}
{{--                    @foreach($carBody->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="car_body"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="car_body_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="car_body_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($engineTypes as $engineType)--}}
{{--                    <h5>{{ $engineType->name }}</h5>--}}
{{--                    @foreach($engineType->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="type_of_engine"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="type_of_engine_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="type_of_engine_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($driveTypes as $driveType)--}}
{{--                    <h5>{{ $driveType->name }}</h5>--}}
{{--                    @foreach($driveType->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="type_of_drive"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="type_of_drive_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="type_of_drive_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($transmissions as $transmission)--}}
{{--                    <h5>{{ $transmission->name }}</h5>--}}
{{--                    @foreach($transmission->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="type_of_transmission"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="type_of_transmission_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="type_of_transmission_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($engineCapacities as $engineCapacity)--}}
{{--                    <h5>{{ $engineCapacity->name }}</h5>--}}
{{--                    @foreach($engineCapacity->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="engine_capacities"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="engine_capacities_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="engine_capacities_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}л--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($fuelConsumptions as $fuelConsumption)--}}
{{--                    <h5>{{ $fuelConsumption->name }}</h5>--}}
{{--                    @foreach($fuelConsumption->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="fuel_consumptions"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="fuel_consumptions_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="fuel_consumptions_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}л/100км--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($carsColor as $carColor)--}}
{{--                    <h5>{{ $carColor->name }}</h5>--}}
{{--                    @foreach($carColor->propertiesList as $property)--}}
{{--                        <div class="form-check m-2">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="cars_color"--}}
{{--                                value="{{ $property->value }}"--}}
{{--                                id="cars_color_{{ Str::slug($property->value) }}">--}}
{{--                            <label--}}
{{--                                class="form-check-label"--}}
{{--                                for="cars_color_{{ Str::slug($property->value) }}">--}}
{{--                                {{ $property->value }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>

        <div style="display: flex; gap: 10px;">
            <input
                type="number"
                class="form-control"
                placeholder="Цена от:"
                name="price_from"
            >
            <input
                type="number"
                class="form-control"
                placeholder="Цена до:"
                name="price_to"
            >
        </div>

        <div style="display: flex; gap: 10px;">
            <input
                type="number"
                class="form-control"
                placeholder="Пробег от:"
                name="mileage_from"
            >
            <input
                type="number"
                class="form-control"
                placeholder="Пробег до:"
                name="mileage_to"
            >
        </div>
        <button type="submit" class="btn btn-primary mt-3">Применить</button>
    </form>

    <ul class="list-group mt-3">
        @foreach($products as $product)
            <li class="list-group-item">
                <h4>{{ $product->name }} ({{ $product->price }} руб.)</h4>
                <ul>
                    @foreach($product->properties as $property)
                        <li>
                            @if($property->name == 'Расход топлива')
                                {{ $property->name }}: {{ $property->pivot->value }}л/100км
                            @elseif($property->name == 'Объем двигателя')
                                {{ $property->name }}: {{ $property->pivot->value }}л
                            @else
                                {{ $property->name }}: {{ $property->pivot->value }}
                            @endif
                        </li>
                    @endforeach
                    <li>Пробег: {{ $product->mileage }} км</li>
                </ul>
            </li>
        @endforeach
        <div class="mt-3">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </ul>
</div>
</body>
</html>
