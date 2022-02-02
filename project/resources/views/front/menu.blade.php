 
  <section class="filter">
        <div class="container">
            <div class="row d-flex">
                    <div class="col-sm-6">
                        <h1 class="filter-titel text-center" id="flip">Filters</h1>
                    </div>
                    <div class="col-sm-6">
                        <h1 class="side-menu-panel">
                            Menu
                        </h1>
                    </div>
                </div>

            </div>
            <div class="menu-panel">
             <button type="button" class="btn-close" ></button>
                <ul class="cat-list">
                    <li><a href="{{ route('front.index') }}"> Home </a></li>
                    <li><a href="{{ route('front.productfeatured') }}">Featured</a></li>
                    <li><a href="{{ route('front.productcategory', 'custom-made') }}">Custom made</a></li>
                    <li><a href="{{ route('front.productcategory', 'pre-loved') }}">Pre-loved</a></li>
                    <li><a href="{{ route('front.productcategory', 'alternative') }}">Alternative</a></li>
                    <li><a href="{{ route('front.productcategory', 'accessories') }}">Accessories</a></li>
                    <li><a href="{{ route('front.productcategory', 'adopted') }}">Adopted</a></li>
                    <li><a href="{{ route('front.nurseries') }}">Nurseries</a></li>
                    <li><a href="{{ route('front.createnursery')}}" class="nursery-btn">Create Your Nursery</a></li>
                </ul>
            </div>
    </section> 