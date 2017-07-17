/*
 Copyright (c) 2007-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
 */

var config = {};

// Set your configuration options below.

// Examples:
// config.language = 'pl';
// config.skin = 'jquery-mobile';
config.plugins = [
    'Watermark'
];
config.Watermark = {

    // Optional, hide or show save button (default to true)
    overwriteButton: false,

    // Optional, hide or show save as new file button (default to true)
    newFileButton: true,

    // Optional, file suffix if save as new file (default to "-watermark")
    newFileSuffix: '-branded',

    // Required, watermark presets.
    watermarks: [

        {
            // All config options (file, label and size) ARE REQUIRED.

            // URL to image file, for better results use PNG files
            // with suitable resolution.
            file: '<STRING: URL TO WATERMARK IMAGE>',

            // Text label to show in watermark selector.
            label: '<STRING: LABEL FOR WATERMARK>',

            // Max size height/width for watermark in percents/px of main image.
            // Example:
            //   If main image is 1600x1200 and size is set to 10,
            //   then watermark will have max width 160px
            //   and height 120px, if the image is smaller than
            //   this size, then it will not be up-scaled.
            //   If value is set in px, then the watermark will not exceed dimensions.
            size: '<STRING: MAX SIZE FOR IMAGE>[px|%]',

            // Set position for this waterark.
            // Value is space separated vertical and horizontal
            // '<top|middle|bottom> <left|center|right>',
            position: '<STRING: top|middle|bottom left|center|right>',

        },

        // Simple example.
        {
            file: 'https://perfectpropertyvn.com/imgweb/logo.png',
            label: 'Your home we care',
            size: '10',
            position: 'bottom right'
        },

        // ...
    ]
};
CKFinder.define( config );
