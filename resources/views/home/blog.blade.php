<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">

    <!-- Section Title -->
    <h2 class="section-title py-3">AT THE NEXT CRUMB</h2>
    <div class="container mb-4">
        <form id="food-search-form" class="form-inline justify-content-center">
            <input id="food-search" type="text" class="form-control mr-2" style="max-width:420px;width:100%" placeholder="Search by title or price...">
            <button id="food-search-btn" type="submit" class="btn btn-primary mr-2">Search</button>
            <button id="food-clear-btn" type="button" class="btn btn-secondary">Clear</button>
        </form>
        <div id="food-no-results" class="text-muted mt-2" style="display:none;">No matching items found.</div>
    </div>

    <!-- Tabs content (Foods tab) -->
    <div class="tab-content" id="pills-tabContent">

        <!-- Foods tab pane -->
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">

            <div class="row" id="food-grid">
                <!-- Loop through each food item in $data -->
                @foreach ($data as $item)  

                    <div class="col-md-4 d-flex" data-title="{{ strtolower($item->title) }}" data-price="{{ $item->price }}">
                        <!-- Single food card -->
                        <div class="card bg-transparent border my-3 my-md-0 w-100">

                            <!-- Food Image -->
                            <img 
                                height="250" 
                                style="object-fit:cover;" 
                                src="food_img/{{ $item->image }}" 
                                alt="{{ $item->title }}" 
                                class="rounded-0 card-img-top mg-responsive"
                            >

                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Price badge -->
                                <h1 class="text-center mb-4">
                                    <a href="#" class="badge badge-primary">{{ $item->price }}</a>
                                </h1>

                                <!-- Food title -->
                                <h4 class="pt20 pb20">{{ $item->title }}</h4>

                                <!-- Food details / description -->
                                <p class="text-white">{{ $item->details }}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form action="{{ url('add_cart', $item->id) }}" method="POST">
                                @csrf
                                <!-- Quantity input -->
                                <input type="number" min="1" name="quantity" class="form-control" required>
                                <!-- Submit button -->
                                <input type="submit" value="Add to Cart" class="btn btn-primary mt-2 w-100">
                            </form>

                        </div> <!-- End of card -->
                    </div> <!-- End of col-md-4 -->

                @endforeach
            </div> <!-- End of row -->

        </div> <!-- End of tab-pane -->
    </div> <!-- End of tab-content -->
</div> <!-- End of container-fluid -->
<script>
  (function() {
    function ready(fn){
      if (document.readyState !== 'loading') { fn(); }
      else { document.addEventListener('DOMContentLoaded', fn); }
    }
    ready(function(){
      var form = document.getElementById('food-search-form');
      var input = document.getElementById('food-search');
      var clearBtn = document.getElementById('food-clear-btn');
      var noResults = document.getElementById('food-no-results');
      var grid = document.getElementById('food-grid');
      if (!input || !grid) return;

      var items = Array.prototype.slice.call(grid.querySelectorAll('[data-title][data-price]'));
      // Cache original display so we can restore correctly (flex/block)
      var originalDisplay = new Map();
      items.forEach(function(el){ originalDisplay.set(el, getComputedStyle(el).display || ''); });

      function toLower(v){ return (v == null ? '' : String(v)).toLowerCase(); }

      function titleText(el){
        var h4 = el.querySelector('h4');
        return h4 ? toLower(h4.textContent) : toLower(el.getAttribute('data-title'));
      }

      function digitsOnly(str){ return (str || '').replace(/[^0-9]/g,''); }

      function applyFilter(q){
        var query = toLower(q.trim());
        var queryNum = digitsOnly(q);
        var anyVisible = false;
        items.forEach(function(el){
          if (!query) {
            el.style.display = originalDisplay.get(el) || '';
            anyVisible = true;
            return;
          }
          var titleMatch = titleText(el).indexOf(query) !== -1;
          var priceAttr = String(el.getAttribute('data-price') || '');
          var priceMatch = queryNum.length > 0 && digitsOnly(priceAttr).indexOf(queryNum) !== -1;
          var match = titleMatch || priceMatch;
          el.style.display = match ? (originalDisplay.get(el) || '') : 'none';
          if (match) anyVisible = true;
        });
        if (noResults) noResults.style.display = anyVisible ? 'none' : '';
      }

      if (form) form.addEventListener('submit', function(e){ e.preventDefault(); applyFilter(input.value); });
      ['input','keyup','change'].forEach(function(evt){ input.addEventListener(evt, function(){ applyFilter(input.value); }); });
      if (clearBtn) clearBtn.addEventListener('click', function(){ input.value=''; applyFilter(''); input.focus(); });
    });
  })();
  </script>
