@extends('template.member.layout.layout')
@section('section-body')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="float-left">
                    <h4><i class="fas fa-globe"></i> Domains List</h4>
                    </div>
                <div class="float-right">
                    <button type="button" class="btn btn-dark btn-icon icon-left">
                        <i class="fas fa-list"></i> Listed <span class="badge badge-transparent">{{$listedcount}}</span>
                      </button>
                      <button type="button" class="btn btn-danger btn-icon icon-left">
                        <i class="fas fa-unlink"></i> On Hold <span class="badge badge-transparent">{{$holdcount}}</span>
                      </button>

                </div>

            </div>
            </div>
            <div class="card-body">
                <div class="container">
                    @include('template.member.domains.message')
                    <!-- Search Form -->
                    <div class="float-left">
                        <!-- Add New Domain Button -->
                        <a href="{{ route('domains.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add
                            Domain</a>
                        <button class="btn btn-primary mb-3" title="Import" data-toggle="modal"
                            data-target="#exampleModal"> Import<i class="fas fa-file-import"></i></i></button>
                        <a href="{{ route('domains.export') }}" title="Export" class="btn btn-primary mb-3">
                            Export <i
                                class="fas fa-file-export"></i> </a>
                    </div>
                    <div class="float-right">
                        <form action="{{ route('domains.index') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control" name="search" type="search" placeholder="Search"
                                    value="{{ $search }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>



                    <!-- Domains Table -->
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'id', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        ID
                                        @if ($sortBy === 'id')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'name', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        Name
                                        @if ($sortBy === 'name')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'status', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        Status
                                        @if ($sortBy === 'status')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'buy_now_price', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        Buy Now Price
                                        @if ($sortBy === 'buy_now_price')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'floor_price', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        Floor Price
                                        @if ($sortBy === 'floor_price')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'minimum_offer', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                       Minimum Offer
                                        @if ($sortBy === 'minimum_offer')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a
                                        href="{{ route('domains.index', ['sortBy' => 'sale_lander', 'sortOrder' => $sortOrder === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">
                                        Sale Lander
                                        @if ($sortBy === 'sale_lander')
                                            <i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>
                                        @else
                                            <i class="fas fa-sort"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($domains as $domain)
                                <tr>
                                    <td>{{ $domain->id }}</td>
                                    <td>{{ $domain->name }}</td>
                                    <td>{{ $domain->status }}</td>
                                    <td>{{  '$' . number_format($domain->buy_now_price, 2) }}</td>
                                    <td>{{ '$' .number_format($domain->floor_price,2) }}</td>
                                    <td>{{ '$' .number_format($domain->minimum_offer,2) }}</td>
                                    <td>{{ '$' .number_format($domain->sale_lander,2) }}</td>

                                    <td>
                                        <a href="{{ route('domains.edit', $domain->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('domains.destroy', $domain->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $domains->appends(['search' => $search])->links() }}
                    </div>
                </div>

            </div>

        </div>






    </div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('domains.import') }}" enctype="multipart/form-data" class="mb-3">
                    <div class="modal-body">
                        @csrf
                        <input type="file" name="file" class="form-control mb-2">
                        {{-- <button type="submit" class="btn btn-success">Import Domain</button> --}}

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import Domain</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
