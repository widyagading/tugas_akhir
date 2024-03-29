@extends('template')
@section('content')
<section class="main-section">
    <div class="content">
        <h1>Data penjualan</h1>
        @if(Session::has('alert_message'))
        <div class="alert alert-success">
            <strong>{{ Session::get('alert_message') }}</strong>
        </div>
        @endif
        <hr>
        <?php if (Session::get('hak_akses')=="admin") { ?>
        <a href="{{ route('penjualan.create') }}" class="btn btn-sm btn-primary">Tambah penjualan</a>
      <?php } ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Kd_barang</th>
                <th>jumlah</th>
                <th>Total_Harga</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php $no = 2; @endphp
            @foreach($data as $datas)
                <tr>
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->kd_barang }}</td>
                    <td>{{ $datas->jumlah }}</td>
                    <td>{{ $datas->total_harga }}</td>
                    <td>

                      <?php if (Session::get('hak_akses')=="admin") { ?>
                        <form action="{{ route('penjualan.destroy', $datas->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('penjualan.edit', $datas->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form><?php } ?>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
