@extends('template.site.layout.layout')
@section('app')
    <div class="container my-5">
        <h3 class="mb-4">Domain Listed ({{ $listedcount }})</h3>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Domain</th>
                        <th>Buy Now</th>
                        <th>Floor Price</th>
                        <th>Minimum Offer</th>
                        <th>Sale lander</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td>{{ $domain->name }}</td>
                            <td>{{ '$' . number_format($domain->buy_now_price, 2) }}</td>
                            <td>{{ '$' . number_format($domain->floor_price, 2) }}</td>
                            <td>{{ '$' . number_format($domain->minimum_offer, 2) }}</td>
                            <td>{{ '$' . number_format($domain->sale_lander, 2) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-icon icon-left btn-info dropdown-toggle" type="button" id="dropdownMenuButton2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Buy</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $domains->appends(['search' => $search])->links() }}
        </div>
    </div>
@endsection
