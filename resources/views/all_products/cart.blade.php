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
                    @if($count==0)
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
                    @else
            <div class="col-lg-11 m-l-10 m-b-15">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Quantity</th>
                                    <th class="column-4">Total</th>
                                    <th class="column-5">Remove</th>
                                </tr>
                                <?php
                                $totalprice = 0;
                                ?>
                                @foreach($cart as $cart)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <a href="{{url('product-detail',$cart->product_id)}}">
                                        <img src="products/{{$cart->product_image}}" alt="IMG"></a>
                                            <a href="products/{{$cart->product_image}}">
                                            <span class=" pe-7s-expand1"></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="column-2">{{$cart->product_title}}</td>
                                    <td class="column-3">{{$cart->quantity}}</td>
                                    <td class="column-4">
                                        ${{$cart->price}}
                                    </td>
                                    <td class="column-5"><a href="{{url('/remove_cart',$cart->id)}}" onclick="return confirm('Are You Certain About Removing This Product from Your Cart?')" style="text-decoration: none; color: inherit;"><span class="fa fa-minus-square trans-03 hov-cl1 pointer"></span></td></a>
                                    <?php
                                    $totalprice = $totalprice + $cart->price;
                                    ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-t-100 m-b-10 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl0 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl0">
                                Shipping Address:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl0">
                                {{$add}}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-10 ">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl0">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                ${{$totalprice}}
                            </p>
                        </div>
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl0">
                            Delivery charges:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                $2.1
                            </p>
                            
                        </div>
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl0">
                            Promotion Applied::
                            </span>
                        </div>

                        <div class="size-10 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                               - $2.1
                            </p>
                            
                        </div>
                    </div>


                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl0">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl0">
                            ${{$totalprice}}
                            </span>
                        </div>
                    </div>
                    <div class=" text-center">
                    <div class="">
                            <span class="mtext-101 cl0">
                            How Would You Like to Proceed with Your Order?
                            </span>
                        </div>
                        <form action="/cod_order" method="POST">
                            @csrf
                    <button class=" m-tb-10 stext-101 cl0 size-101 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Cash on Delivery (COD)
                    </button>
                        </form>
                    <div class="">
                            <span class="mtext-101 cl0">
                                OR
                            </span>
                        </div>
                        <form action="{{route('checkout')}}" method="POST">
                            @csrf
                    <button class=" m-tb-10 stext-101 cl0 size-101 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Card Transaction
                    </button>
                        
                        </form>
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