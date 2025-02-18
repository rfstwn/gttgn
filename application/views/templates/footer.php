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


    <!-- Script of Library JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });

        var swiper = new Swiper('.swiper-container', {
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
    </script>
    <script>
        $(document).ready(function() {
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
        });
    </script>
    <script>
        $(document).ready(function() {
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
        });
    </script>
    </body>

    </html>