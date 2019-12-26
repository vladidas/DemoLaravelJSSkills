import $ from 'jquery';
import axios from 'axios';

/** Filter page component. */
class Filter {
    /** Declare variables. */
    constructor() {
        this.dropDownMenu = $('#dropdown-menu');
        this.searchUrl = '/sub-districts/search';
    }

    /** Initialize event listeners. */
    init() {
        this.onSearchSubDistricts();
    }

    /** Search sub-districts event. */
    onSearchSubDistricts() {
        const _this = this;
        $('input[name=sub-district-name]').on('keyup', function () {
            const subDistrictName = this.value.trim();

            _this.dropDownMenu.removeClass('show').empty();
            if (subDistrictName.length > 0) {
                _this.filter(subDistrictName)
            }
        });
    }

    /** Get sub-districts by name. */
    filter(subDistrictName) {
        axios.get(this.searchUrl, {
            params: {
                name: subDistrictName
            }
        })
        .then((response) => {
            if (response.data.data.items.length) {
                this.showDropDownList(response.data.data.items)
            }
        })
    }

    /** Build and show dropdown list. */
    showDropDownList(items) {
        this.dropDownMenu.removeClass('show').empty();
        for (const item of items) {
            this.dropDownMenu.append(
                `<a class="dropdown-item" href="${item.href}">${item.name}</a>`
            )
        }
        this.dropDownMenu.addClass('show');
    }
}

export default Filter;
