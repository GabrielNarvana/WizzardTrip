/**
 * @version 3.0.5
 * @author Marcos Freitas <https://github.com/marcosfreitas>
 * @bugfix fixed verification for a valid URL into assets, considering host URL to not provide a wrong autoformat
 * @major @bugfix autofix url format, removed assets and api suffixes
 * @param {*} params
 */

var App = function(params) {
	'use strict';

	this.app = {
		protocol : '',
		host : "",
		instances : "",
		vendors : []
	};
	var  self = this;

	this.getInstances = function () {
		return self.app.instances;
	};

	this.getVendors = function () {
		return self.app.vendors;
	};

	this.setInstances = function(instances) {
		if (typeof instances !== 'undefined') {
			instances.forEach(function (value, index) {
                //self.app.instances += value;
                self.blobCode(value);
			}, this);
		}
		return this;
    };

    this.blobCode = function (code) {
        console.log(code);
        var blob = new Blob([code], {type: 'text/javascript'});
        var urlCreator = window.URL || window.webkitURL;
        var url = urlCreator.createObjectURL( blob );

        self.setVendors([url]);

        // Add a the script tag to the head
        /*var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = url;
        // Bind the callback (depends on browser compatibility).
        script.onreadystatechange = callback;
        script.onload = callback;
        // Load the script
        head.appendChild(script);*/
    }

	this.setVendors = function (vendors) {
		if (typeof vendors !== 'undefined') {
			vendors.forEach(function (value, index) {

				// for api calls
				if (typeof value === 'object') {
					// can define multiple api urls by value
					value.forEach(function(url, i) {
						if (!self.isURL(url)) {
							// fix internal api url
							value = self.app.host + value;
						}
					}, this);
				} else if (!self.isURL(value)) {
					// fix internal asset url
					value = self.app.host + value;
				}

				self.app.vendors.push(value);

			}, this);
		}

		return this;
	};

	this.isURL = function(url) {
		var pattern = /(http(s)?:\/\/.)(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/gi;
		if(!pattern.test(url) && url.indexOf('http://localhost') < 0 && url.indexOf(this.app.host) < 0) {
			return false;
		}
		return true;
	}

	this.app.protocol = window.location.protocol === 'https:' ? 'https:' : 'http:';
	this.app.host = this.app.protocol + '//' + window.location.host + '/';


	if (typeof params.host !== 'undefined') {
		this.app.host = params.host;
	}

	if (typeof params.vendors !== 'undefined') {
		this.setVendors(params.vendors);
	}

	if (typeof params.instances !== 'undefined') {
		this.setInstances(params.instances);
	}

	return this;

};