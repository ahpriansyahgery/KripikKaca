<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Index - Yummy Bootstrap Template</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('user/assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('user/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('user/assets/css/main.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body class="index-page">


    <main class="main">
      @include('components.navbar')

      @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">
      <div class="container">
        <div class="row gy-3">
          <div class="col-lg-3 col-md-6 d-flex">
            <i class="bi bi-geo-alt icon"></i>
            <div class="address">
              <h4>Address</h4>
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
              <p></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex">
            <i class="bi bi-telephone icon"></i>
            <div>
              <h4>Contact</h4>
              <p>
                <strong>Phone:</strong> <span>+1 5589 55488 55</span><br />
                <strong>Email:</strong> <span>info@example.com</span><br />
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex">
            <i class="bi bi-clock icon"></i>
            <div>
              <h4>Opening Hours</h4>
              <p>
                <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br />
                <strong>Sunday</strong>: <span>Closed</span>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h4>Follow Us</h4>
            <div class="social-links d-flex">
              <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>
          © <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong>
          <span>All Rights Reserved</span>
        </p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<!-- jQuery & AJAX -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function () {
    let deleteItemId = null;

    // Simpan ID item saat tombol Delete ditekan
    $('.btn-delete').on('click', function () {
        deleteItemId = $(this).data('id');
    });

    // Saat tombol Hapus dalam modal diklik
    $('#confirmDeleteBtn').on('click', function (event) {
        event.preventDefault(); // Mencegah submit form dan refresh halaman

        if (deleteItemId) {
            $.ajax({
                url: "/cart/" + deleteItemId, // Route Laravel
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Pastikan CSRF token benar
                    _method: "DELETE"
                },
                success: function (response) {
                    if (response.success) { // Pastikan respons dari server sukses
                        // **Sembunyikan modal setelah sukses**
                        $('#confirmDeleteModal').modal('hide');

                        // **Hapus backdrop modal yang tertinggal**
                        setTimeout(() => {
                            $('.modal-backdrop').remove();
                            $('body').removeClass('modal-open');
                        }, 300);

                        // **Hapus baris item dari tabel tanpa refresh**
                        $('#cart-item-' + deleteItemId).fadeOut(300, function () {
                            $(this).remove();
                          // Update nomor urut
                            $('.cart-item-row').each(function (index) {
                          $(this).find('.item-number').text(index + 1);
                          });
                        });

                        // **Perbarui total harga di tampilan**
                        $('#total-price').text('Rp ' + response.totalHarga.toLocaleString());

                        // **Alihkan fokus setelah modal tertutup**
                        setTimeout(() => {
                            $('body').focus();
                        }, 300);
                    } else {
                        alert("Gagal menghapus item. Silakan coba lagi.");
                    }
                },
                error: function (xhr) {
                    $('#errorModal').modal('show'); // Tampilkan modal error jika gagal
                }
            });
        }
    });
    
});

// Add Product 
$(document).on('click', '.btn-add-to-cart', function () {
    let form = $(this).closest('.add-to-cart-form');
    let productId = form.data('product-id');
    let productVarianId = form.find('.product_varian_id').val();
    let jumlahProduct = form.find('.jumlah_product').val();

    $.ajax({
        url: "/cart/add/" + productId,
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId,
            product_varian_id: productVarianId,
            jumlah_product: jumlahProduct
        },
        success: function (response) {
            // ✅ Pastikan modal ada di HTML
            $('#cartMessageModal .modal-body').html(response.message);
            $('#cartMessageModal').appendTo('body').modal('show');
           
            // ✅ Hilangkan modal setelah 3 detik
            setTimeout(() => {
                $('#cartMessageModal').modal('hide');
            }, 3000);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert("Terjadi kesalahan, coba lagi.");
        }
    });
});


// Update jumlah 
$(document).ready(function () {
    $('.update-cart').on('change', function () {
        let cartitemsId = $(this).data('id');
        let jumlahProduct = $(this).val();

        $.ajax({
            url: "/cart/update/" + cartitemsId,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                jumlah_product: jumlahProduct
            },
            success: function (response) {
                if (response.success) {
                    // Update subtotal produk di tampilan
                    $('#subtotal-' + cartitemsId).text('Rp' + response.subTotal.toLocaleString());

                    // Update total harga di tampilan
                    $('#total-price').text('Rp' + response.totalHarga.toLocaleString());
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan, coba lagi.");
            }
        });
    });
});







</script>

  

    <!-- Main JS File -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

  </body>
</html>

