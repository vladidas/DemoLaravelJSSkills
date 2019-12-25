<header class="header  shadow-sm mb-1 bg-white rounded">
    <div class="container">
        @inject('localeMiddleware', \App\Services\Frontend\Http\Middleware\LocaleMiddleware)

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-collapse row">
                <div class="col-md-2 col-sm-2">
                    <a href="{{ route('frontend.home') }}" class="mr-auto mt-2">
                        <img src="{{ asset('assets/frontend/img/logo.jpg') }}" class="logo"/>
                    </a>
                </div>

                <div class="col-md-8 col-lg-3 col-sm-8 text-right pr-0">
                    <a href="#" class="header-contacts">{{ __('app.btn.contact_href') }}</a>
                </div>

                <div class="pr-2 col-lg-1 col-md-1 col-sm-2 text-right pl-0">
                    <nav class="bg-white nav-item dropdown">
                        <a class="nav-link dropdown-toggle select-languages text-uppercase"
                           id="select-languages">{{ app()->getLocale() }}</a>

                        <div class="dropdown-menu" id="dropdown-languages">
                            @foreach(config('app.locales') as $locale)
                                @if(app()->getLocale() !== $locale)
                                    <a class="dropdown-item text-uppercase"
                                       href="{{ $localeMiddleware::getUrlWithLocale($locale) }}">{{ $locale }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </nav>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 p-0 text-right">
                    <form class="my-2 my-lg-0">
                        <div class="row">
                            <div class="col-md-6 col-lg-7 col-sm-12 p-0">
                                <input class="form-control"
                                       type="search"
                                       placeholder="{{ __('app.btn.search') }}"
                                       aria-label="Search"
                                >
                                <span class="fa fa-search form-control-feedback search-icon"></span>
                            </div>

                            <div class="col-md-0 pr-1 pl-1"></div>

                            <button class="btn header-search-btn col-md-5 col-lg-4 col-sm-12" type="submit">{{ __('app.btn.search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-white row p-0 pt-1">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @php($routeName = request()->route()->getName())
                    <li class="nav-item @if($routeName === 'frontend.home') active @endif">
                        <a class="nav-link" href="{{ route('frontend.home') }}">{{ __('app.label.about_us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('app.label.places_list') }}</a>
                    </li>
                    <li class="nav-item @if($routeName === 'frontend.sub-districts.show') active @endif">
                        <a class="nav-link" href="#">{{ __('app.label.view') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('app.label.contacts') }}</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</header>
