        <!-- Footer -->
        <footer class="container-fluid">
            <div class="container">
                <div class="footer-wrapper">
                    <img src="<?= base_url('assets/image/bappeda-logo.png') ?>" alt="Logo-Bappeda">
                    <h4>Bappeda Kota Cilegon</h4>
                    <p>JL. Maulana Yusuf RT. 06 RW. 01, Citangkil, Cilegon, Banten, <br />Jl. Maulana Yusuf, Citangkil, Cilegon, Banten 42441</p>
                    <span>Copyright &copy; Perencanaan Pembangunan Penelitian dan Pengembangan Kota Cilegon Kota Cilegon - All Right Reserved.</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- Login Modal -->
    <div class="modal modal-md fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="second-title title text-green">Login</h3>
                    <button type="button" class="btn-close btn-close-registrationLogin" data-bs-dismiss="modal"></button>
                    <form id="loginForm" action="<?= base_url('auth/login') ?>" method="post">
                        <div class="form-group">
                            <input type="email" placeholder="Email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                        </div>
                        
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="text-center">
                            <span><small>Belum punya akun? <a href="#" id="openRegistration" class="text-decoration-none">Daftar disini</a></small></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Script of Library JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>

    <script>
        $(document).ready(function() {
            AOS.init();

            // Popup Video
            // ! ===> Use at homepage on Welcome section
            // =========================================
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });

            // Carousel Item
            // ! ===> Use at homepage on Produk Sections
            // =========================================
            $(".owl-carousel").owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                loop: true,
                margin: 25,
                stagePadding: 10,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            // Counter number when scroll on view
            // ! ===> Use at homepage on Peserta Sections
            // =========================================
            function isScrolledIntoView(elem) {
                var docViewTop = $(window).scrollTop();
                var docViewBottom = docViewTop + $(window).height();
                var elemTop = $(elem).offset().top;
                return elemTop < docViewBottom;
            }

            $(window).on('scroll', function() {
                $('.counter').each(function() {
                    var $this = $(this);
                    if (isScrolledIntoView($this) && !$this.hasClass('counted')) {
                        $this.addClass('counted');
                        $({
                            countNum: 0
                        }).animate({
                            countNum: $this.attr('data-count')
                        }, {
                            duration: 1000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                            }
                        });
                    }
                });
            });


            // Main Slider
            // ! ===> Use at homepage on Hero Sections
            // =========================================
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 3000
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            });



            // Navbar classs sticky manager
            // ! ===> Use at navbar when add the "not-sticky" class
            // =========================================
            const body = document.querySelector("body");
            const div = document.querySelector(".main-navbar");
            const observer = new ResizeObserver(entries => {
                for (let entry of entries) {
                    requestAnimationFrame(() => {
                        if (entry.contentRect.width <= 768) {
                            div.classList.add("is-sticky");
                            if (div.classList.contains("not-sticky")) {
                                div.classList.replace("not-sticky", "not-sticky-temp");
                            }
                        } else if (entry.contentRect.width > 768) {
                            if (div.classList.contains("not-sticky-temp")) {
                                div.classList.replace("not-sticky-temp", "not-sticky");
                                div.classList.remove("is-sticky");
                            }
                        }
                    });
                }
            });

            observer.observe(body);
        });
        // Registration panel functionality
        $(document).ready(function() {
            // Open registration panel when clicking on registration menu item
            $('a[href="#registrasi"]').on('click', function(e) {
                e.preventDefault();
                $('#registrationPanel').addClass('open');
                $('body').addClass('registration-open');
            });

            // Open registration from login modal
            $('#openRegistration').on('click', function(e) {
                e.preventDefault();
                $('#loginModal').modal('hide');
                setTimeout(function() {
                    $('#registrationPanel').addClass('open');
                    $('body').addClass('registration-open');
                }, 300);
            });

            // Close registration panel
            $('#closeRegistration').on('click', function() {
                $('#registrationPanel').removeClass('open');
                $('body').removeClass('registration-open');
            });

            // Close registration panel when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#registrationPanel').length && 
                    !$(e.target).closest('a[href="#registrasi"]').length && 
                    $('#registrationPanel').hasClass('open')) {
                    $('#registrationPanel').removeClass('open');
                    $('body').removeClass('registration-open');
                }
            });
            
            //Animation for page transition
            $('#main-page').addClass('page-loaded');

            $('a').not('[target="_blank"]').click(function (e) {
                const link = $(this).attr('href');
                if (link && !link.startsWith('#') && !link.startsWith('javascript')) {
                    e.preventDefault();
                    $('#main-page').removeClass('page-loaded').addClass('page-leave');
                    setTimeout(() => {
                        window.location.href = link;
                    }, 500);
                }
            });
        });
    </script>

    <?php ci()->load->view('/templates/registration_form'); ?>
    </body>

    </html>