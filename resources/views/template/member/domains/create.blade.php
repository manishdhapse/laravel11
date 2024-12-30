@extends('template.member.layout.layout')
@section('section-body')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Add Domain</h4>
            </div>
            <div class="container">
                 @include('template.member.domains.message')
                <h1>Add New Domain</h1>
                <form action="{{ route('domains.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Domain Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Listed">Listed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buy_now_price" class="form-label">Buy Now Price</label>
                        <input type="number" name="buy_now_price" id="buy_now_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="floor_price" class="form-label">Floor Price</label>
                        <input type="number" name="floor_price" id="floor_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="minimum_offer" class="form-label">Minimum Offer</label>
                        <input type="number" name="minimum_offer" id="minimum_offer" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="sale_lander" class="form-label">Sale Lander</label>
                        <input type="number" name="sale_lander" id="sale_lander" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
@endsection
