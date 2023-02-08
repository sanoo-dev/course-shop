@extends('layouts.admin.admin_template')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sinh viên liên hệ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main')
    <section class="content">
        <div class="container-fluid">
            <!-- All Category -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả học viên đã liên hệ</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%">#</th>
                                        <th>Tên học viên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Tin nhắn</th>
                                        <th style="width: 10%">Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td class="text-center">
                                                <button class="btn bg-gradient-primary"
                                                    onclick="showMessage('{{ $contact->message }}')">
                                                    Hiển thị
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <a href=""
                                                    onclick="return areYouSure('contacts/delete/{{ $contact->id }}')"
                                                    class="btn btn-sm bg-gradient-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $contacts->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all form -->
        </div><!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="show_message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="show_message">Tin nhắn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="message">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- show desc -->
        <script type="text/javascript">
            function showMessage(message) {
                $('#message').html(message)
                $('#show_message').modal('show');
            }
        </script>
    </section>
@endsection
