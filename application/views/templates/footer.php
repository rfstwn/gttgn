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
    
    <?php ci()->load->view('/modal/registration_form'); ?>
    <?php ci()->load->view('/modal/login_form'); ?>


    <!-- Script of Library JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>
        <?php if($this->session->flashdata('success')): ?>
            toastr.success("<?= $this->session->flashdata('success') ?>");
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            toastr.error("<?= $this->session->flashdata('error') ?>");
        <?php endif; ?>

        $(document).ready(function() {
            AOS.init();

            // Carousel Item
            // ! ===> Use at homepage on Produk Sections
            // =========================================
            $(".owl-carousel").owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                loop: false,
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

            // Password Toggle Functionality
            // =========================================
            $(".toggle-password").click(function() {
                var input = $(this).closest('.password-wrapper').find('input');
                var icon = $(this).find('i');
                
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    icon.removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    input.attr("type", "password");
                    icon.removeClass("fa-eye").addClass("fa-eye-slash");
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
        });
    </script>

    </body>

    </html>