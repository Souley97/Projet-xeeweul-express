<header id="site-header"
class="site-header header-fw-1 d-flex align-items-center shadow-sm border-bottom fixed-top">
<div class="container-fluid container-header">
    <div class="row align-items-center">
        <div class="col-1 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
            <div class="d-flex align-items-center">
                <div class="navbar-toggler-btn navbar-light d-xl-none">
                    <button id="toggle-nav" class="btn border-0 navbar-toggler shadow-none" type="button">
                        <span class="btn__icon icon-menu"></span>
                    </button>
                </div>
                <div class="logo-lg d-none d-lg-block">
                    <div class="custom-logo-wrap"><a href="/videos" class="custom-logo-link"
                            rel="home"><img width="300" height="50"
                                src="/images/bg/xe/logoXeWhite.png" alt="logo Xeeweul Express"
                                class="custom-logo" alt="Xeeweul Express" /></a></div>
                </div>
            </div>
        </div>
        <div class="col-center col-7 col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-6 top-0">
            <div class="d-flex">
                <div class="logo-sm mx-md-auto me-sm-auto d-block d-lg-none">
                    <div class="custom-logo-wrap"><a href=" class="custom-logo-link"
                            rel="home"><img width="300" height="50"
                            src="/images/bg/xe/logoXeWhite.png" alt="logo Xeeweul Express"
                                class="custom-logo" alt="Xeeweul Express" /></a></div>
                </div>
            </div>
            <div id="site-search" class="site-search search-form-wrap d-none d-lg-block">

                <form action="{{route('videos.search')}}" class="search-form advanced-search d-flex" method="get">
                    <button class="toggle-search btn btn-sm border-0 shadow-none d-block d-lg-none p-2"
                        type="button">
                        <span class="icon-left-open"></span>
                    </button>
                    <div class="input-group-wrap position-relative w-100">

                        <input id="search-input"  x-data="{ query: '' }" x-model="query" @input="search"
                            class="form-control shadow-none ps-4 search-input autocomplete" autocomplete="off"
                            aria-label="Search" name="s" placeholder="Search here..." type="text"
                            value>
                        <input type="hidden" id="search-input"  x-data="{ query: '' }" x-model="query" @input="search" name="search">
                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="071ff67130" />
                        <div class="advanced-search-filter dropdown w-100">
                            <button type="button" class="btn btn-advanced-search shadow-none p-0 m-0"
                                id="advanced-search-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown">
                                <span class="btn__icon icon-sliders"></span>
                            </button>


                        </div>
                        <button class="btn btn-outline-secondary px-4 btn-main shadow-none" type="submit">
                            <span class="btn__icon icon-search"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
            <div class="header-user d-flex align-items-center">
                <div class="ms-auto d-flex align-items-center gap-1 gap-sm-1 gap-lg-2">
                    <div class="header-user__search d-lg-none">
                        <button type="button" class="toggle-search btn btn-sm border-0 shadow-none p-1">
                            <span class="btn__icon icon-search"></span>
                        </button>
                    </div>
                    <div class="header-user__cart user__cart-float">
                        <div class="dropdown">
                            <button class="btn btn-cart shadow-none px-2 position-relative"
                                data-bs-toggle="dropdown" data-bs-display="static">
                                <span class="btn__icon centerxy icon-cart-plus"></span>
                                <span class="position-absolute cart-count">
                                    <span class="badge bg-danger">
                                        10 </span>
                                </span>
                            </button>
                            <div
                                class="border-top dropdown-menu dropdown-menu-end dropdown-menu-mini-cart drm-always-visible">
                                <div class="widget_shopping_cart_content">
                                    <p class="woocommerce-mini-cart__empty-message">No products in the cart.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-user__dropdown ms-0 ms-lg-3">
                        <a class="btn btn-login px-lg-3 d-flex align-items-center btn-sm"
                            href="../../wp-login.html">
                            <span class="btn__icon icon-user-circle"></span>
                            <span class="btn__text text-white d-lg-block d-none ms-2">Sign In</span>
                        </a>
                    </div>
                    <div class="header-theme-switcher">
                        <button class="btn theme-switcher outline-none shadow-none p-1" id="theme-switcher">
                            <span class="btn__icon icon-moon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

  <script>
        function search() {
            // Code de recherche à implémenter ici
            // Utilisez Ajax pour interroger le serveur Laravel et récupérer les résultats de la recherche
            // Mettez à jour la variable Alpine.js 'results' avec les résultats
        }

        // Initialisation d'Alpine.js
        document.addEventListener('alpine:init', () => {
            Alpine.data('index', () => ({
                query: '',
                results: [],
                search: debounce(search, 500),
            }));

            // Fonction debounce pour éviter les appels excessifs pendant la saisie
            function debounce(func, delay) {
                let timeout;
                return function () {
                    const context = this;
                    const args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        func.apply(context, args);
                    }, delay);
                };
            }
        });
    </script>
