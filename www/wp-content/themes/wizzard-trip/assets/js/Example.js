/**
 * Example of an structure of plugin
 *
 * @version 1.0.0 - Applied new layout
 * @author Marcos Freitas <https://github.com/marcosfreitas>
 */

let Example;

/**
 * Constructor
 */
Example = function () {

    'use strict';

    this.config = {
        api_url: window.location.protocol + '//' + window.location.host + '/wp-json/wp/v2',
        site_url: window.location.protocol + '//' + window.location.host
    };

	this.data = {
        content: {},
        search_args: {
            data: {
                orderby: 'date',
                order: 'desc',
                per_page: 12,
                _embed: 1
            }
        }
    };

    this.helper = new Helpers();

	this.DOM = {
        container : $('.js-ks-loader'),
        button: $('.js-ks-loader-button'),
        viewport : {
            window: {},
            container: {}
        }
    };

    Object.freeze(this.config);
    Object.seal(this.DOM);

    this.events();

};

/**
 * objects available for all instances
 */
OfferLoader.prototype = {

    events: function() {
        let self = this;

        self.DOM.button.off('click').on('click', function() {

            self.data.current_button = $(this);
            self.data.current_button.text('Carregando...').attr('disabled', true);

            self.data.current_button.off('ks-content-loaded').on('ks-content-loaded', function(e) {

                self.data.current_button.attr({'data-paged': self.data.search_args.data.paged});
                self.data.current_button.text(self.data.current_button.attr('data-original-text')).attr('disabled', false);;

                if (self.data.search_args.data.paged >= parseInt(self.data.total_pages)) {
                    self.data.current_button.hide();
                }

                self.mountHtml();
            });

            self.data.current_button.off('ks-prepared-search').on('ks-prepared-search', function(e) {
                self.getSomething();
            });

            self.prepareSearch.call(this, self);
        });



    },

    prepareSearch: function(self) {

        if (typeof self.data.total_pages === "undefined") {
            self.data.total_pages = self.data.current_button.attr('data-max-pages');
        }

        self.data.current_button.attr('data-max-pages', self.data.total_pages);

        self.data.paged = parseInt($(this).attr('data-paged'));
        self.data.paged++;

        self.data.search_args.data.categories = self.data.current_button.attr('data-category');
        self.data.search_args.data.page = self.data.paged;
        self.data.search_args.data.paged = self.data.paged;
        self.data.search_args.data.exclude = $(this).attr('data-ignored-posts');

        self.data.current_button.trigger('ks-prepared-search');

    },

    getSomething: function() {

        let self = this;

        self.data.search_args.url = self.config.api_url + '/posts/';

        let search = self.helper.ajax(self.data.search_args);

        $.when(search).then(
            function __response(json) {
                self.data.total_pages = parseInt(search.getResponseHeader('X-WP-TotalPages')) || 1;

                self.data.content = json;

                self.data.current_button.trigger('ks-content-loaded');
            },
            function __error(e) {
                $.error(e);
            }
        );
    },

    mountHtml: function() {
        let self = this;

        let html = '';

        Object.values(self.data.content).forEach(function(element) {

        });

        self.data.current_button.parents().closest('.container').find('.js-offer-loader').append(html);

        self.data.current_button.trigger('ks-content-mounted');

    },


    /**
     * Validates viewport, this module will be disabled on screen equal or below to 900px
     */
    getViewport : function() {

        let self = this;

        let w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        let h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

        self.DOM.viewport.window = {width: w, height: h};

        self.DOM.viewport.container = {
            width : self.DOM.container.width(),
            height: self.DOM.container.height()
        }

        self.data.current_button.trigger('ks-defined-viewport');

    }

};