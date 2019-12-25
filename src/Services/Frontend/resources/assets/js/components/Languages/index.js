import $ from 'jquery';

/** Languages component. */
class Languages {
    /** Initialize event listeners. */
    init() {
        this.onToggleLanguagesDropdown();
    }

    /** Toggle languages dropdown panel event. */
    onToggleLanguagesDropdown() {
        $('#select-languages').on('click', function () {
            $(this).siblings('#dropdown-languages').toggleClass('show')
        });
    }
}

export default Languages;
