@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari...">
                            <button class="btn btn-info" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="py-1">
                                    1
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim adipisci temporibus dolore quos accusantium repellendus dolorem quod doloremque. Saepe ad sequi quisquam similique corrupti. Mollitia rerum perspiciatis consequuntur ea.</p>
                                </td>
                                <td>
                                    Sliwik Saja
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    1
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim adipisci temporibus dolore quos accusantium repellendus dolorem quod doloremque. Saepe ad sequi quisquam similique corrupti. Mollitia rerum perspiciatis consequuntur ea.</p>
                                </td>
                                <td>
                                    Sliwik Saja
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    1
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim adipisci temporibus dolore quos accusantium repellendus dolorem quod doloremque. Saepe ad sequi quisquam similique corrupti. Mollitia rerum perspiciatis consequuntur ea.</p>
                                </td>
                                <td>
                                    Sliwik Saja
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
