(function ($) {
    "use strict";

    var yithWishlistSinglePageAdd = {};
    eltdf.modules.yithWishlistSinglePageAdd = yithWishlistSinglePageAdd;

    yithWishlistSinglePageAdd.eltdfOnWindowLoad = eltdfOnWindowLoad;
    yithWishlistSinglePageAdd.eltdfOnDocumentReady = eltdfOnDocumentReady;

    $(window).load(eltdfOnWindowLoad);
    $(document).ready(eltdfOnDocumentReady);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
    }

    function eltdfOnDocumentReady() {
        yithWishlistSinglePage();
    }

    function yithWishlistSinglePage() {
        var yithWishlistSinglePageHolder = $('.single-product .yith-wcwl-add-to-wishlist'),
            yithWishlistSinglePageAddButton = yithWishlistSinglePageHolder.find('.yith-wcwl-add-button'),
            yithWishlistSinglePageBrowseButton = yithWishlistSinglePageHolder.find('.yith-wcwl-wishlistexistsbrowse');

        /*console.log(yithWishlistSinglePageAddButtonHolder);*/

        $( yithWishlistSinglePageAddButton ).on('click', function (e) {
            e.preventDefault();

            console.log('clicked');

            yithWishlistSinglePageAddButton.removeClass('show');
            yithWishlistSinglePageAddButton.addClass('hide').hide();

            yithWishlistSinglePageBrowseButton.removeClass('hide');
            yithWishlistSinglePageBrowseButton.addClass('show').show();

            /*if ( yithWishlistSinglePageAddButtonHolder.hasClass('show') ) {

                yithWishlistSinglePageAddButtonHolder.removeClass('show');
                yithWishlistSinglePageAddButtonHolder.addClass('hide');

                yithWishlistSinglePageBrowseButton.removeClass('hide');
                yithWishlistSinglePageBrowseButton.addClass('show');
            }*/
        });
    }

})(jQuery);