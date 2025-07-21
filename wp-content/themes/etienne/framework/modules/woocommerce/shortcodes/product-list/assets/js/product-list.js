(function($) {
    'use strict';

    var productList = {};
    eltdf.modules.productList = productList;

    productList.eltdfOnDocumentReady = eltdfOnDocumentReady;
    productList.eltdfOnWindowLoad = eltdfOnWindowLoad;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfInitProductListAnimation();
    }

    /**
     * Initializes product list article animation
     */
    function eltdfInitProductListAnimation(){
        var portList = $('.eltdf-pl-holder.eltdf-pl-has-animation');

        if(portList.length && !Modernizr.touch){
            var showArticle = function(article) {
                article
                    .addClass('eltdf-item-show')
                    .one(eltdf.transitionEnd, function() {
                        article.addClass('eltdf-item-shown');
                    });
            }

            var upwards = function(list) {
                var aritcles = list.find('.eltdf-pli:not(".eltdf-item-shown")');

                aritcles.appear(function (l) {
                    var article = $(this);
                    showArticle(article);
                }, {accX: 0,accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
            }

            var randomize = function(list) {
                var articles = list.find('.eltdf-pli'),
                    cycle = 2, // rewind delay
                    counter = 0,
                    delay = 200;

                var resetCounter = function() {
                    counter = 0;
                }

                articles.appear(function(l) {
                    var article = $(this);

                    counter++;
                    counter == cycle && resetCounter();

                    article.css('transition-delay', counter * delay+ 'ms');
                    showArticle(article);
                }, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
            }

            portList.each(function(){
                var list = $(this),
                    animationType = list.hasClass('eltdf-pl-animation-upwards') ? 'upwards' : 'randomize';

                animationType == 'upwards' && upwards(list);
                animationType == 'randomize' && randomize(list);
            });
        }
    }

})(jQuery);