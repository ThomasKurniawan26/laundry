@include('partials.header')

<section>
    <div class="container-fluid mt-5">
        <div class="row" ng-app="app" ng-controller="transaksiController">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Input Transaksi</h3>
                    </div>
                  <form action="{{ url('/transaksi/prosestambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="id" class="col-sm-4 col-form-label">Nama Outlet</label>
                                    <div class="col-sm-8">
                                        <select name="id_outlet" class="form-control" id="">
                                            <option value="" selected disabled>Pilih Nama Outlet</option>
                                            @foreach ($dataoutlet as $i)
                                            <option value="{{ $i->id}}">{{ $i->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id" class="col-sm-4 col-form-label">Nama Member</label>
                                    <div class="col-sm-8">
                                        <select name="id_member" class="form-control" id="">
                                            <option value="" selected disabled>Pilih Member</option>
                                            @foreach ($datamember as $i)
                                            <option value="{{ $i->id}}">{{ $i->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Ambil</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" name="tgl" id="tgl" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Bayar</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" name="tgl_bayar" id="tgl_bayar"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Batas Waktu</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" name="batas_waktu"
                                            id="batas_waktu" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Diskon</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="diskon" id="diskon" value="0"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Pajak</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="pajak" id="pajak" placeholder="Rp"
                                            required value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_ambil" class="col-sm-4 col-form-label">Biaya Tambahan</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="biaya_tambahan" id="pajak"
                                            placeholder="Rp" required value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                            </div>
                            </div>
                         </div>
                          <div class="row justify-content-center mt-3" id="paket">
                            <div class="col-md-8">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Paket</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Action</td>
                                                <th>Nama Paket</th>
                                                <th>Qty</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <button type="button" id="addPaket" class="btn btn-success">Tambah
                                                        Paket</button>
                                                </td>
                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <select name="id_paket[]" id="" class="form-control" required>
                                                                <option selected disabled>Pilih Nama Paket</option>
                                                                @foreach($datapaket as $dp)
                                                                <option value="{{ $dp -> id }}">{{ $dp -> nama_paket }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="qty[]">
                                                </td>
                                                <td>
                                                    <input type="textarea" class="form-control" placeholder=""
                                                        name="keterangan[]">
                                                </td>
                                            </tr>
                                        </tbody>
                         
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                    </form>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="col-md-12 mt-5">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Data Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 30px">Id Transaksi</th>
                                    <th>Status</th>
                                    <th>Status Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.transaksi  | orderBy: '-kd_pemesanan'">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="card-footer justify-content-between">
                                            <button type="submit" class="btn btn-danger">Clear</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  --}}
            <section id="table-transaksi">
                <div class="container-fluid mt-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold ">TABEL DATA TRANSAKSI</h6>
                        </div>

                        <div class="card-body">

                            @if(session()->exists('alert'))
                            <div class="alert alert-{{ session()->get('alert')['bg'] }} alert-dismissible fade show"
                                role="alert">
                                {{ session()->get('alert')['message'] }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error )
                                {{ $error }}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Outlet</th>
                                            <th>Kode Invoice</th>
                                            <th>Nama Member</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Batas Waktu</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Biaya Tambahan</th>
                                            <th>Diskon</th>
                                            <th>Pajak</th>
                                            <th>Status</th>
                                            <th>Dibayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($transaksi) == 0)
                                        <tr>
                                            <td colspan="14" class="text-center bg-danger text-white">
                                                Data Empty!
                                            </td>
                                        </tr>
                                        @endif
                                        
                                        @foreach($transaksi as $index => $detailtransaksi)                                        
                                        <tr>
                                            <td>{{ $index + $transaksi->firstItem() }}</td>
                                            <td>{{ $detailtransaksi->id}}</td>
                                            <td>{{ $detailtransaksi->outlet->nama}}</td>
                                            <td>{{ $detailtransaksi->kode_invoice }}</td>
                                            <td>{{ $detailtransaksi -> id_member }} 
                                                {{ $detailtransaksi -> member -> nama ?? ''}}
                                            </td>
                                            <td>{{ $detailtransaksi->tgl }}</td>
                                            <td>{{ $detailtransaksi->batas_waktu }}</td>
                                            <td>{{ $detailtransaksi->tgl_bayar }}</td>
                                            <td>{{ $detailtransaksi->biaya_tambahan }}</td>
                                            <td>{{ $detailtransaksi->diskon }}</td>
                                            <td>{{ $detailtransaksi->pajak }}</td>
                                            <td class="text-dark">{{ $detailtransaksi->status }}</td>
                                            <td class="{{ $detailtransaksi -> dibayar == 'dibayar' ? 'text-success' : 'text-danger' }}">{{ $detailtransaksi->dibayar }}</td>

                                            <td>
                                                <button class="btn btn-success btn-sm rounded mb-1" data-toggle="modal"
                                                    data-target="#ModalEditTransaksi{{ $index }}">
                                                    <i class="fa fa-edit">Edit</i>
                                                </button>

                                                <a class="btn btn-danger btn-sm rounded mb-1"
                                                    href="{{ url('/transaksi/detail_transaksi/' . $detailtransaksi->id) }}">
                                                    <i class="fa fa-edit">Detail</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Total ada {{ $transaksi->total() }} Data Paket
                                <div class="d-flex justify-content-end">
                                    {{ $transaksi->links() }}
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@foreach($transaksi as $index => $a)

<div class="modal fade" id="ModalEditTransaksi{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Edit Transaksi</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/transaksi/edit/edit-transaksi/' . $a->id) }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <button disabled class="badge badge-primary">Id Transaksi</button>
                        <input type="text" class="form-control" value="{{ $a->id }}" readonly>
                    </div>

                    <div class="form-floating mb-3">
                        <button disabled class="badge badge-success mb-1">Status</button>
                        <select name="status" class="form-control d-flex justify-content-center">
                            <option value="baru" {{ $a->status == 'baru' ? 'selected' : '' }} class="text-secondary">
                                Baru</option>
                            <option value="proses" {{ $a->status == 'proses' ? 'selected' : '' }} class="text-dark">
                                Proses</option>
                            <option value="selesai" {{ $a->status == 'selesai' ? 'selected' : '' }}
                                class="text-primary">Selesai</option>
                            <option value="diambil" {{ $a->status == 'diambil' ? 'selected' : '' }}
                                class="text-success">Diambil</option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <button disabled class="badge badge-secondary mb-1">Dibayar</button>
                        <select name="dibayar" class="form-control">
                            <option value="dibayar" {{ $a->dibayar == 'dibayar' ? 'selected' : '' }}
                                class="text-success">Dibayar</option>
                            <option value="belum_dibayar" {{ $a->dibayar == 'belum_dibayar' ? 'selected' : '' }}
                                class="text-danger">Belum Dibayar</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Simpan
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@include('partials.footer')
<script>
    function deletePaket(i) {
        $(`.paket-item-${i}`).remove();
    }

    $(function () {
        let paket = 2;

        $('#addPaket').click(function () {
            $('#paket').append(`

            <div class="col-md-8 mt-3 paket-item-${paket}">
                 <label for="">
                        Nama Paket*
                        <i class="fas fa-trash-alt ml-2 text-danger" onclick="deletePaket('${paket}')"></i>
                    </label>
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tambah paket</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Paket</th>
                                        <th>Qty</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select name="id_paket[]" class="form-control">
                                                        ${ $('[name*=id_paket]').html() }
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" name="qty[]"class="form-control">
                                        </td>
                                        <td>
                                            <input type="textarea" name="keterangan[]" class="form-control" placeholder="">
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

        `);

            paket++;
        });


    });

</script>
