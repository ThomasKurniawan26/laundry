@include('partials.header')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Input Data Paket</h3>
                </div>
                <form action="/paket/prosestambah" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Outlet</label>
                            <div class="col-sm-9">
                                <select name="id_outlet" class="form-control" id="">
                                    <option value="" selected disabled>Pilih Nama Outlet</option>
                                    @foreach ($datao as $name)
                                    <option value="{{ $name->id}}">{{ $name->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="nama_paket" id="nama">
                                <input type="text" class="form-control" name="nama_paket" id="nama_paket"
                                    placeholder="Nama " required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                            <div class="col-sm-9">
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option selected disabled>Pilih Jenis Paket</option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bad cover">Bad Cover</option>
                                    <option value="kaos">Kaos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row username">
                            <label for="username" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="harga" id="harga"
                                    placeholder="Harga Paket" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Data Paket</h3>
                </div>
                <div class="card-body">
                    @if(session() -> exists('alert'))
                    <div class="alert alert-{{session()->get('alert') ['bg']}} alert-dismissible fade show"
                        role="alert">
                        {{session()-> get('alert')['message']}}
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Nama Outlet</th>
                                <th>Nama Paket</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tbl_paket as $i => $paket)
                            <tr>
                                <td>{{ $paket->id }}</td>
                                <td>{{ $paket->outlet->nama}}</td>
                                <td>{{ $paket->nama_paket }}</td>
                                <td>{{ $paket->jenis }}</td>
                                <td>{{ $paket->harga }}</td>

                                <td>
                                    <div class="button">
                                        <a href="javascript:;" data-toggle="modal" data-target="#modalEdit{{ $i }}"
                                            class="btn btn-success"><i class="fa fa-edit">Edit</i></a>
                                        <a href="{{url('/paket/delete/' .$paket -> id)}}" class="btn btn-danger"><i
                                                class="fa fa-edit">Delete</i></a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{$tbl_paket->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($tbl_paket as $i => $paket)
<div class="modal fade" id="modalEdit{{ $i }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/paket/edit/edit-paket/' . $paket->id) }}">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_paket" class="form-control" placeholder="Nama"
                            value="{{ $paket->nama_paket }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <select name="id_outlet" class="form-control">
                                @foreach ($datao as $name)
                                    <option value="{{ $paket->id }}"
                                        {{ $name->id == $paket->id ? 'selected' : '' }}>
                                        {{ $name->nama }}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="jenis" class="form-control">
                                <option value="kiloan" {{ $paket->jenis == 'kiloan' ? 'selected' : '' }}>Kiloan</option>
                                <option value="selimut" {{ $paket->jenis == 'selimut' ? 'selected' : '' }}>selimut</option>
                                <option value="bad cover" {{ $paket->jenis == 'bed cover' ? 'selected' : '' }}>Bed Cover</option>
                                <option value="kaos" {{ $paket->jenis == 'kaos' ? 'selected' : '' }}>Kaos</option>
                                
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Harga Paket"
                            value="{{ $paket->harga }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@include('partials.footer')
