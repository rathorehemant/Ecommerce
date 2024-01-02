@include('components.header')
@include('components.sidebar')

<div class="col-auto col-md-9 col-xl-10 px-sm-12 table">
    @if($products->count() > 0)
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
  <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Added On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ ucfirst($product->title) }}</td>
                <td><img src="{{ $product->image }}" class="img-thumbnail" height = "150" width = "130" alt="Product Image"></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>

@else
@php 
echo 'No prduct';
@endphp
@endif
</div>

@include('components.footer')