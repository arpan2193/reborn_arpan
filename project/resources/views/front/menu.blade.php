 
  <?php $main_site = route('front.index'); ?>
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