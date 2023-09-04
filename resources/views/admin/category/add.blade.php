@extends("layouts.master_backend")
@section("cont")

<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.category") }}">ย้อนกลับ</a>
    <form method="POST" action="{{ route("dashboard.category.create") }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name">
          @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
