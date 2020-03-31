@extends('layouts.master')

@section('content')

    <div class="app-title">
        <h1><i class="fa fa-shopping-basket fa-fw"></i> अन्न खरीद/बिक्रि</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title text-center">
                    अन्न खरीद विवरण
                </div>
                <table class="table table-sm table-bordered table-hover">
                    <thead class="bg-danger text-white">
                        <th>मिति</th>
                        <th>किसानको नाम</th>
                        <th>प्रकार/प्रजाति</th>
                        <th>तौल</th>
                        <th>खरीद रकम</th>
                    </thead>
                    <tbody>
                        @if (count($buyNSells) > 0)
                            @foreach ($buyNSells as $buyNSell)
                                <tr>
                                    @if ($buyNSell->type == "खरीद")
                                        <td><span class="badge badge-pill badge-info"> {{ $buyNSell->created_date }} </span></td>
                                        <td>{{ $buyNSell->food->name }}</td>
                                        <td>{{ $buyNSell->food->variety." (".$buyNSell->food->species." )" }}</td>
                                        <td>{{ $buyNSell->weight }}</td>
                                        <td>{{ "Rs " . $buyNSell->amount }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title text-center">
                    अन्न बिक्रि विवरण
                </div>
                <table class="table table-sm table-bordered table-hover">
                    <thead class="bg-danger text-white">
                        <th>मिति</th>
                        <th>किसानको नाम</th>
                        <th>प्रकार/प्रजाति</th>
                        <th>तौल</th>
                        <th>बिक्रि रकम</th>
                    </thead>
                    <tbody>
                        @if (count($buyNSells) > 0)
                            @foreach ($buyNSells as $buyNSell)
                                @if ($buyNSell->type == "बिक्रि")
                                    <td><span class="badge badge-pill badge-info"> {{ $buyNSell->created_date }} </span></td>
                                    <td>{{ $buyNSell->food->name }}</td>
                                    <td>{{ $buyNSell->food->variety." (".$buyNSell->food->species." )" }}</td>
                                    <td>{{ $buyNSell->weight }}</td>
                                    <td>{{ "Rs " . $buyNSell->amount }}</td>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection