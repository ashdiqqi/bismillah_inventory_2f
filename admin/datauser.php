<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <h6><b>&copy; Copyright@2020|GPIB CINERE|</b></h6>
    </center>
</div>

<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        New</span>
                    <span class="fw-light">
                        User
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Full name</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="text" class="form-control form-control-lg" />

                            </div>
                        </div>
                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">NIM</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="nim" class="form-control form-control-lg" />

                            </div>
                        </div>

                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Email address</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="email" class="form-control form-control-lg"
                                    placeholder="example@example.com" />

                            </div>
                        </div>

                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">No telp</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="no_hp" class="form-control form-control-lg" />
                            </div>
                        </div>

                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Upload Foto</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input class="form-control form-control-lg" id="formFileLg" type="file" />
                                <div class="small text-muted mt-2">Upload photo. Max
                                    file
                                    size 50 MB</div>

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="px-5 py-4">
                            <button type="submit" class="btn btn-primary btn-lg">Tambah User</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>