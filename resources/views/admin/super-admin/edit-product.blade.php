@extends('layouts.admin-layout')

@section('content')

                    @include('admin.super-admin.layouts.sidebar')
                    <div class="content_super supar_main_cont">
                    <div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Product info</h4>
                                <div class="form_data d-flex justify-content-between align-items-center wrap_in_form">
                                    @if($user->product->isEmpty())
                                    <div class="table_layut col-md-12 add_products">
                                        <div class="first_product">
                                            <p>Note: Currently there is no product. Click on Add Product link to
                                                add your first Product.</p>
                                            <div class="form-group update_btns p-0">
                                                <a href="/registration/product-registration.php?user_id={{Auth::id()}}"
                                                    class="btn btn-primary linked_btn f-size" target="_blank">Add
                                                    Product</a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="table_layut col-md-12 product_table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Subject Name</th>
                                                        <th class="fixer_wider">Min Price</th>
                                                        <th class="fixer_wider">Max Price</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($user['product'] as $product)
                                                    <tr>
                                                        <td>{{$product['subject']['name']}}</td>
                                                        <td> <span class="rupy_iconer"><i class="fa fa-inr"
                                                                    aria-hidden="true"></i></span>
                                                            <?php $arr = $product->toArray();
                                                            echo min(array_column($arr['product_price'], 'proposed_market_price'));  ?> </td>
                                                        <td> <span class="rupy_iconer"><i class="fa fa-inr"
                                                                    aria-hidden="true"></i></span>
                                                            <?php $arr = $product->toArray();
                                                            echo max(array_column($arr['product_price'], 'proposed_market_price'));  ?> </td>
                                                        <td>
                                                            <a title="Edit"
                                                                href="/registration/product-registration.php?id={{ $product['id'] }}"
                                                                class="table_btn edit_linker" target="_blank"><span><i
                                                                        class="fa fa-pencil"
                                                                        aria-hidden="true"></i></span></a>
                                                            <form class="common_lines"
                                                                action="/teacher/product/{{$product['id']}}"
                                                                method="POST" name="delete_product">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button title="Delete" type="submit"
                                                                    class="table_btn trash_linker"
                                                                    onclick="return confirm('Are you sure you want to delete this product?')"><span><i
                                                                            class="fa fa-trash"
                                                                            aria-hidden="true"></i></span></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group update_btns p-0">
                                            <a href="/registration/product-registration.php?user_id={{Auth::id()}}"
                                                target="_blank" class="btn btn-primary linked_btn f-size">Add More
                                                Products <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
               
@endsection