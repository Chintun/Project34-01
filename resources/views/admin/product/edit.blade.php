@extends("layouts.master_backend")
@section("cont")

<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.product") }}">ย้อนกลับ</a>
    <form method="POST" action="{{ route("dashboard.product.update") }}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" value="{{ $product->name }}">
          @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Price</label>
          <input type="Number" class="form-control" name="price" value="{{ $product->price }}">
          @error('price')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
