import $ from 'jquery';

/** App component. */
class App {
    init() {
        this.hidePreloader();
    }

    /** Hide preloader. */
    hidePreloader() {
        setTimeout(() => {
            $('.page-loader-wrapper').fadeOut();
        }, 50);
    }
}

export default App;
