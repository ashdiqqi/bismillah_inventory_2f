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
                        <a href="#">Akun</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Akun Saya</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <!DOCTYPE html>
                            <html lang="en">

                            <head>
                                <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
                                    rel="stylesheet">
                                <style type="text/css">
                                    body {

                                        background-color: #f2f6fc;
                                        color: #69707a;
                                    }

                                    .img-account-profile {
                                        height: 10rem;
                                    }

                                    .rounded-circle {
                                        border-radius: 50% !important;
                                    }

                                    .card {
                                        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
                                    }

                                    .card .card-header {
                                        font-weight: 500;
                                    }

                                    .card-header:first-child {
                                        border-radius: 0.35rem 0.35rem 0 0;
                                    }

                                    .card-header {
                                        padding: 1rem 1.35rem;
                                        margin-bottom: 0;
                                        background-color: rgba(33, 40, 50, 0.03);
                                        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
                                    }

                                    .form-control,
                                    .dataTable-input {
                                        display: block;
                                        width: 100%;
                                        padding: 0.875rem 1.125rem;
                                        font-size: 0.875rem;
                                        font-weight: 400;
                                        line-height: 1;
                                        color: #69707a;
                                        background-color: #fff;
                                        background-clip: padding-box;
                                        border: 1px solid #c5ccd6;
                                        -webkit-appearance: none;
                                        -moz-appearance: none;
                                        appearance: none;
                                        border-radius: 0.35rem;
                                        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                    }

                                    .nav-borders .nav-link.active {
                                        color: #0061f2;
                                        border-bottom-color: #0061f2;
                                    }

                                    .nav-borders .nav-link {
                                        color: #69707a;
                                        border-bottom-width: 0.125rem;
                                        border-bottom-style: solid;
                                        border-bottom-color: transparent;
                                        padding-top: 0.5rem;
                                        padding-bottom: 0.5rem;
                                        padding-left: 0;
                                        padding-right: 0;
                                        margin-left: 1rem;
                                        margin-right: 1rem;
                                    }
                                </style>
                            </head>

                            <body>
                                <div class="container-xl px-4 mt-4">


                                    <hr class="mt-0 mb-4">
                                    <div class="row">
                                        <div class="col-xl-4">

                                            <div class="card mb-4 mb-xl-0">
                                                <div class="card-header">Profile Picture</div>
                                                <div class="card-body text-center">

                                                    <img class="img-account-profile rounded-circle mb-2"
                                                        src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>

                                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger
                                                        than 5 MB</div>

                                                    <button class="btn btn-primary" type="button">Upload new
                                                        image</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">

                                            <div class="card mb-4">
                                                <div class="card-header">Account Details</div>
                                                <div class="card-body">
                                                    <form>

                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputUsername">Nama Lengkap

                                                            </label>
                                                            <input class="form-control" id="inputUsername" type="text"
                                                                placeholder="Enter your username" value="username">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputUsername">Nomor Induk

                                                            </label>
                                                            <input class="form-control" id="inputUsername" type="text"
                                                                placeholder="Enter your nip" value="username">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputEmailAddress">Email
                                                                address</label>
                                                            <input class="form-control" id="inputEmailAddress"
                                                                type="email" placeholder="Enter your email address"
                                                                value="name@example.com">
                                                        </div>

                                                        <div class="row gx-3 mb-3">

                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputPhone">Phone
                                                                    number</label>
                                                                <input class="form-control" id="inputPhone" type="tel"
                                                                    placeholder="Enter your phone number"
                                                                    value="555-123-4567">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="small mb-1"
                                                                    for="inputBirthday">Birthday</label>
                                                                <input class="form-control" id="inputBirthday"
                                                                    type="text" name="birthday"
                                                                    placeholder="Enter your birthday"
                                                                    value="06/10/1988">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="button">Save
                                                            changes</button>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                                <script
                                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
                                <script type="text/javascript">

                                </script>
                            </body>

                            </html>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>