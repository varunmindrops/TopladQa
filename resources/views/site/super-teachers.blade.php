@extends('layouts.super-layouts')
@section('content')
<section class="ftco-section faclt-edit-page super-page">
    <div class="container-fluid">
        <div class="row">
            <div class="edit_contents">
                <div class="sidebar_super">
                    <div class="wrap_left_view">
                        <div class="super_logo">
                            <a class="navbar-brand" href="/"><img src="https://demo.mindrops.com/raghav-academy/img/logo.png" alt="logo"></a>
                        </div>
                        <div class="wrap_tabs">
                            <div class="nav flex-column nav-pills nav-pills-custom">
                                <a class="nav-link active" href="">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Manage Teachers</span></a>
                                <a class="nav-link" href="">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Manage Students</span></a>
                                <a class="nav-link " href="">
                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Manage Coupons</span></a>
                                <a class="nav-link " href="">
                                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Manage Orders</span></a>
                                <a class="nav-link " href="">
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Logout</span></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="content_super">


                    <div class="wrap_tab_contents">

                        <div class="card_info shadow">
                            <h4 class="font-italic mb-2">Manage Teachers</h4>


                            <div class="col-lg-12 coupon_table">
                                <div class="table-responsive super_table">
                                    <table id="manage-teachers" class="table table-striped table-bordered data-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Courses</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Abhilash</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1), </span><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>


                                            <tr>
                                                <td>001</td>
                                                <td>Abhilash</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Ayush</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Kunal</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1), </span><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Ankita</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Pankaj</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1), </span><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Neeraj</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>001</td>
                                                <td>Abhilash</td>
                                                <td class="multi-courses"><span>Fundamentals of Economics and Management
                                                        (Paper-1), </span><span>Fundamentals of Economics and Management
                                                        (Paper-1), </span><span>Fundamentals of Economics and Management
                                                        (Paper-1)</span></td>
                                                <td class="super-call-btns"><button type="submit" class="table_btn edit_linker"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>

                                                    <button type="submit" class="table_btn trash_linker delete-coupon"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
