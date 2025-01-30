@extends('layouts.app')

@section('content')
<section id="menu" class="menu section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Menu</h2>
    
  </div>
  <!-- End Section Title -->
 
  <div class="container">
    <ul
      class="nav nav-tabs d-flex justify-content-center"
      data-aos="fade-up"
      data-aos-delay="100"
    >

    @foreach ($categories as $index => $categorie)

      <li class="nav-item">
        <a
          class="nav-link {{ $index == 0 ? 'active' : '' }}"
          data-bs-toggle="tab"
          href="#category-{{ $categorie->id }}">
        
          <h4>{{ $categorie->name }}</h4>
        </a>
      </li>
      @endforeach
    </ul>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      @foreach ($categories as $index => $categorie)
          
    
      <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="category-{{ $categorie->id }}">
        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>{{ $categorie->name }}</h3>
        </div>

        @forelse ($categorie->products as $product)
            
       
        <div class="row ">
          <div class="col-4 menu-item">
            <a href="{{ asset('user/assets/img/menu/menu-item-1.png') }}" class="glightbox"
              ><img
                src="{{ asset('user/assets/img/menu/menu-item-1.png') }}"
                class="menu-img img-fluid"
                alt=""
            /></a>
            <h4>{{ $product->name }}</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">Rp.{{ $product->price }}</p>
          </div>
          <!-- Menu Item -->

         
          <!-- Menu Item -->

       
          <!-- Menu Item -->

        
          <!-- Menu Item -->
        </div>
        @empty
        <p class="text-center">No products available in this category.</p>
        @endforelse
      </div>
     

      <!-- End Starter Menu Content -->

    
      <!-- End Breakfast Menu Content -->

     
      <!-- End Lunch Menu Content -->

      
      <!-- End Dinner Menu Content -->
      @endforeach
    </div>
  </div>
</section>
@endsection