/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to 
slow the page load.

*/

// as the page loads, cal these scripts
$(document).ready(function() {

	// add all your scripts here
    $('.featured').flexslider();

    //Fancybox stuff
    $(".post a[href$='.jpg'], .post a[href$='.jpeg'], .post a[href$='.png'], .post a[href$='.gif'], .post a[href$='.bmp']").fancybox({
        padding: 0,
        helpers: {
            title: null,
            overlay: null
        }
    });
 
}); /* end of as page load scripts */

// HTML5 Fallbacks for older browsers
$(function() {
    // check placeholder browser support
    if (!Modernizr.input.placeholder) {
        // set placeholder values
        $(this).find('[placeholder]').each(function() {
            $(this).val( $(this).attr('placeholder') );
        });
 
        // focus and blur of placeholders
        $('[placeholder]').focus(function() {
            if ($(this).val() == $(this).attr('placeholder')) {
                $(this).val('');
                $(this).removeClass('placeholder');
            }
        }).blur(function() {
            if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
                $(this).val($(this).attr('placeholder'));
                $(this).addClass('placeholder');
            }
        });
 
        // remove placeholders on submit
        $('[placeholder]').closest('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                if ($(this).val() == $(this).attr('placeholder')) {
                    $(this).val('');
                }
            });
        });
    }
});

