/**
 * Handles live search for the shortcode search form.
 */
class LiveSearchShortcode {

    constructor() {

        // Search input field.
        this.searchField = jQuery(".search-term-shortcode");

        // Search results wrapper.
        this.resultsWrapper = jQuery(
            ".wrapper-data-container-shortcode-data-posts"
        );

        // Run search when the user types.
        this.searchField.on(
            "keyup",
            this.getResults.bind(this)
        );

        // Hide results on page load.
        this.resultsWrapper.hide();
    }


    /**
     * Get and display search results.
     */
    getResults() {

        // Show results area and loading icon.
        this.resultsWrapper.show();
        this.searchField.addClass("loadinggif");

        const searchTerm = this.searchField.val();
        const postId = jQuery("#search_post_id").val();

        // Send request to the REST API.
        jQuery.getJSON(
            liveSearchDataPosts[1].root_url +
            "namespace/v11/search_post_types/" +
            searchTerm +
            "/" +
            postId,
            function (results) {

                // Remove loading icon.
                jQuery(".search-term-shortcode").removeClass("loadinggif");

                if (results.length > 0) {

                    // Display search results.
                    const html = results.map(
                        item =>
                            `<div>
                                <a href="${item.post_name}">
                                    ${item.post_title}
                                </a>
                            </div>`
                    ).join("");

                    jQuery(".data-container-shortcode")
                        .html(html)
                        .show();

                    jQuery(".no-data-shortcode").hide();

                } else {

                    // Display "no results" message.
                    jQuery(".no-data-shortcode")
                        .html(liveSearchDataPosts[0].not_found_data)
                        .show();

                    jQuery(".data-container-shortcode").hide();
                }
            }
        );
    }
}


// Initialize live search.
const liveSearchShortcode = new LiveSearchShortcode();