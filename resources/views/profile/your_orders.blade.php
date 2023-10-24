<!DOCTYPE html>
<html lang="en">

<head>
    @include('all_products.headerlinks')
</head>

<body class="" style="background-color: #1e1e1e;">

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-130" style="background-color: #1e1e1e;">
        <div class="container rounded-div" style="background-color: #2d2d30	;">
            @include('all_products.header')
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                    </div>
                    @endif
                    <!-- @if(!$data)
                    <div class=" size-303 center p-tb-112 p-lr-112">
                        <span class="fa fa-cart-plus empty-cart cl8"></span><br>
                        <div class="">
                            <span class=" mtext-106 cl4 ">
                            Cart Is Vacant.<br>Let's Fill It Up! 
                            </span>
                            <a href="{{url('/dashboard')}}" style="text-decoration: none; color: inherit;">
                            <span class=" mtext-106 cl1 ">
                            Click Here.
                            </span></a>
                        </div>
                    </div>
                    @else -->
            <div class="col-lg-11 m-l-10 m-b-15">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Quantity</th>
                                    <th class="column-3">Dayment<br>Status</th>
                                    <th class="column-3">Delivery<br>Status</th>
                                    <th class="column-4">Total</th>
                                    <th class="column-5">Cancle<br>Order</th>
                                </tr>
                                <?php
                                $totalprice = 0;
                                ?>
                                @foreach($data as $data)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <a href="{{url('product-detail',$data->product_id)}}">
                                        <img src="products/{{$data->product_image}}" alt="IMG"></a>
                                            <a href="products/{{$data->product_image}}">
                                            <span class=" pe-7s-expand1"></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="column-2">{{$data->product_title}}</td>
                                    <td class="column-3">{{$data->quantity}}</td>
                                    <td class="column-3">{{$data->payment_status}}</td>
                                    <td class="column-3">{{$data->delivery_status}}</td>
                                    <td class="column-4">
                                        ${{$data->price}}
                                    </td>
                                    @if ($data->delivery_status=='PENDING')
                                    <td class="column-5"><a href="{{url('/cancle_order',$data->id)}}" onclick="return confirm('Are You Certain You Want to Cancel Your Order?')" style="text-decoration: none; color: inherit;"><span class="fa fa-minus-square trans-03 hov-cl1 pointer"></span></td></a>
                                    @else
                                    <td class="column-5">Prohibited</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

    </section>
    <!-- Footer -->
    @include('all_products.footer')

    <!-- Back to top -->
    <div class="btn-back-to-top" id="	myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
    @include('all_products.js')
</body>

</html>