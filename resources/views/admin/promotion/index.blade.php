@extends("layouts.master_backend")
@section("cont")

<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.promotion.add") }}">เพิ่มข้อมูล</a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($promotion as $data)
                <tr>
                    <th scope="row">
                        {{ $data->promotion_id}}
                    </th>
                    <td>
                        {{ $data->products->name }}
                    </td>
                    <td>
                        {{ $data->Price }}
                    </td>
                    <td>
                        Image
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('dashboard.promotion.edit', $data->promotion_id) }}">
                            แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard.promotion.destroy', $data->promotion_id) }}">
                            ลบ
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
