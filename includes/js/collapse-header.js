/*!
  jQuery a11yExpandable plugin
  @name jquery.a11yExpandable.js
  @author Heydon (heydon@heydonworks.com or @heydonworks)
  @version 1.0
  @date 01/01/2013
  @category jQuery Plugin
  @copyright (c) 2015 (Heydon Pickering)
  @license Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) license.
*/
jQuery(document).ready(function () {

	(function ($) {
		$.fn.a11yExpandable = function () {

			return this.each(function () {

				var elem = $(this);
				var plugin = this;

				// set the ARIA state and relationship attributes
				elem.attr({
					'aria-expanded': 'false',
					'aria-controls': elem.attr('data-expandable')
				});

				// find the element to expand by id
				var expandable = $('#' + elem.attr('data-expandable')).attr({
					'aria-hidden': 'true',
					'class': 'expandable'
				});

				// click handler
				elem.on('click', function () {

					// Cast the expanded state as a boolean
					var expanded = $(this).attr('aria-expanded') === 'false' ? false : true;

					// Switch the states of aria-expanded and aria-hidden
					elem.attr('aria-expanded', !expanded);
					expandable.attr('aria-hidden', expanded);

				});

			});

		};
	}(jQuery));

	jQuery('[data-expandable]').a11yExpandable();
});