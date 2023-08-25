@extends("layouts.master_backend")
@section("cont")

<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.product.add") }}">เพิ่มข้อมูล</a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($products as $data)
                <tr>
                    <th scope="row">
                        {{ $data->id }}
                    </th>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>
                        {{ $data->price }}
                    </td>
                    <td>
                        None
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('dashboard.product.edit', $data->id) }}">
                            แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard.product.destroy', $data->id) }}">
                            ลบ
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
