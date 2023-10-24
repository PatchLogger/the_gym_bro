<section id="portfolio" class="portfolio-area">
    <div class="container">
        <h2 class="block_title">Section </h2>
        <div class="row port cs-style-3">
            <?php
                $catagory;
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                <a href="{{route('dashboard', ['category' => 'Adjustable_Dumbbells'])}}">
                    <img src="home/assets/images/Adjustable_Dumbbells.png" alt="img04">
                </a>
                    <figcaption>
                        <h3>Adjustable<br>Dumbbells</h3>
                        <a href="{{route('dashboard', ['category' => 'Adjustable_Dumbbells'])}}" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                <a href="{{route('dashboard', ['category' => 'Treadmills']) }}">
                    <img src="home/assets/images/Treadmills.png" alt="img01">
                </a>
                    <figcaption>
                        <h3>Treadmills</h3>
                        <a href="{{route('dashboard', ['category' => 'Treadmills']) }}" class="button" >Take a look</a>
                    </figcaption>   
                </figure>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                <figure>
                <a href="{{route('dashboard', ['category' => 'Home_Gyms']) }}">
                    <img src="home/assets/images/HomeGyms.png" alt="img02">
                </a>
                    <figcaption>
                        <h3>Home Gyms</h3>
                        <a href="{{route('dashboard', ['category' => 'Home_Gyms']) }}" class="button" >Take a look</a>
                    </figcaption>
                </figure>
            </div>

            <div class="col-xs-12">
                <div class="btn-center"><a href="{{route('dashboard', ['category' => 'All_Products']) }}" class="big button">All Products</a></div>
            </div>
        </div>
    </div><!-- container -->
</section><!-- portfolio -->