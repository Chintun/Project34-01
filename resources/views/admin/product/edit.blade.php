@extends("layouts.master_backend")
@section("cont")

<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.product") }}">ย้อนกลับ</a>
    <form method="POST" action="{{url('dashboard/product/update/'.$product->product_id)}}">
        @csrf

        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" value="{{ $product->name }}">
          @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" name="price">
            @error('price')
              <span class="text-danger">
                  {{ $message }}
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Descrpiption</label>
            <input type="text" class="form-control" name="descrpiption">
            @error('descrpiption')
              <span class="text-danger">
                  {{ $message }}
              </span>
            @enderror
          </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
