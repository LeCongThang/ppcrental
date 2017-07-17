/*
 * CKFinder - Watermark plugin
 * ===========================
 * https://github.com/dimitrov-adrian/ckfinder-watermark-plugin
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Adrian Dimitrov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

CKFinder.define(['jquery', 'backbone', 'marionette', 'doT'], function(jQuery, Backbone, Marionette, doT) {
  'use strict';

  return {

    // Available language files. Put them into the "lang" folder of you plugin.
    lang: 'en,bg',

    init: function(finder) {

      var icon = 'watermark-icon-white.png';

      // Detect if the black icon should be provided by looking for .ui-alt-icon class.
      // To provide different icons for LTR/RTL environment check finder.lang.dir.
      if ( jQuery( 'body' ).hasClass( 'ui-alt-icon' ) ) {
        icon = 'watermark-icon.png';
      }

      var css = '';
      css += '.ui-icon-watermark:after { background-image: url(' + this.path + '/gfx/' + icon + '); }';
      css += '.ui-watermark-page { text-align: center; }';
      css += '.ui-watermark-page #watermark-preview-frame { border:1px solid #b6b6b6; display:inline-block; position:relative }';
      css += '.ui-watermark-page #watermark-preview-watermark { display:none; }';
      css += '.ui-watermark-page #watermark-preview-image { max-width:100%; height:auto; display:block; }';
      this.addCss(css);

      // Add a button to the "Main" toolbar.
      finder.on('toolbar:reset:Main:file', function(evt) {
        if (evt.data.file.isImage()) {
          evt.data.toolbar.push({
            name: 'Watermark',
            label: finder.lang.Watermark.watermark,
            priority: 45,
            icon: 'watermark',
            action: function () {
              finder.request('watermarkPageAction', { file: evt.data.file });
            }
          });
        }
      });

      /**
       * Build Watermark image options page
       *
       * @param data
       */
      function watermarkPageAction(data) {

        var file = {
          name: data.file.get('name'),
          url: data.file.getUrl()
        };

        // Build options template.
        var template = '';
        template += '<div class="ui-watermark-page">';
        template += '  <h2>{{=it.text.title.replace("%", it.file.name)}}</h2>';
        template += '  <div>';
        template += '    <div id="watermark-preview-frame">';
        template += '      <img id="watermark-preview-watermark" src="" />';
        template += '      <img id="watermark-preview-image" src="{{=it.file.url}}" />';
        template += '    </div>';
        template += '  </div>';
        template += '  <div id="watermark-toolbar-actions">';
        template += '    <select name="watermark" data-inline="true">';
        template += '    {{~it.watermarks :watermark}}<option value="{{=watermark._index}}">{{=watermark.label}}</option>{{~}}';
        template += '    </select>';
        if (typeof(finder.config.Watermark.overwriteButton) == 'undefined' || finder.config.Watermark.overwriteButton) {
          template += '<button name="save" data-inline="true">{{=it.text.saveButtonText}}</button>';
        }
        if (typeof(finder.config.Watermark.newFileButton) == 'undefined' || finder.config.Watermark.newFileButton) {
          template += '<button name="save-as-new" data-inline="true">{{=it.text.saveAsNewButtonText}}</button>';
        }
        template += '    <button name="back" data-inline="true">{{=it.text.backButtonText}}</button>';
        template += '  </div>';
        template += '</div>';

        // Create a View class to be displayed in the page.
        var imageWatermarkOptionsView = Marionette.ItemView.extend({

          // Store current options.
          currentOptions: {
            file: null,
            position: null,
            size: 0
          },

          // Template.
          template: doT.template(template),

          // Handle events in template.
          events: {

            'change select': function(e) {

              if (e.currentTarget.name == 'watermark') {

                if (e.currentTarget.value == 'none' || e.currentTarget.value == '') {
                  this.currentOptions = {
                    file: null,
                    position: null,
                    size: 0
                  };
                }
                else {
                  this.currentOptions = finder.config.Watermark.watermarks[e.currentTarget.value];
                }

                var $watermark = jQuery('#watermark-preview-watermark', this.$el);
                if (!this.currentOptions.file) {
                  $watermark.hide();
                  return false;
                }

                $watermark
                  .not('.-event-watermark-reposition')
                  .addClass('-event-watermark-reposition')
                  .on('watermark-reposition', function(e, data) {

                    jQuery(this).show();

                    var maxSize = !isNaN(parseFloat(data.size)) && isFinite(data.size) ? data.size + '%' : data.size;
                    jQuery(this).css({
                      maxWidth: maxSize,
                      maxHeight: maxSize,
                      position: 'absolute'
                    });

                    var position = data.position.split(' ');
                    var watermarkStyle = {
                      marginTop: '',
                      marginLeft: '',
                      top: (position[0] == 'top' ? 0 : ''),
                      bottom: (position[0] == 'bottom' ? 0 : ''),
                      left: (position[1] == 'left' ? 0 : ''),
                      right: (position[1] == 'right' ? 0 : '')
                    };

                    // Middle.
                    if (position[0] == 'middle') {
                      watermarkStyle.top = '50%';
                      watermarkStyle.marginTop = -1 * Math.ceil(jQuery(this).height() / 2);
                    }

                    // Center.
                    if (position[1] == 'center') {
                      watermarkStyle.left = '50%';
                      watermarkStyle.marginLeft = -1 * Math.ceil(jQuery(this).width() / 2);
                    }
                    jQuery(this).css(watermarkStyle);
                  });

                var currentOptions = this.currentOptions;
                $watermark.attr('src', currentOptions.file);
                $watermark.trigger('watermark-reposition', currentOptions);
                $watermark.one('load', function() {
                  jQuery(this).trigger('watermark-reposition', currentOptions);
                });

              }

            },

            'click button': function(e) {
              if (e.currentTarget.name == 'save' || e.currentTarget.name == 'save-as-new') {

                if (!this.currentOptions.file) {
                  return;
                }

                finder.request('dialog', {
                  name: 'dialog-watermark-confirmdialog',
                  title: '',
                  template: e.currentTarget.name == 'save' ? finder.lang.Watermark.applyConfirm : finder.lang.Watermark.confirm,
                  buttons: ['ok','cancel']
                });
                finder.once('dialog:dialog-watermark-confirmdialog:ok', function(evt) {
                  this.makeProcessorRequest(e.currentTarget.name);
                  finder.request('dialog:destroy', { name: 'dialog-watermark-confirmdialog' });
                }.bind(this));
                finder.once('dialog:dialog-watermark-confirmdialog:cancel', function(evt) {
                  finder.request('dialog:destroy', { name: 'dialog-watermark-confirmdialog' });
                });
              }
              else if (e.currentTarget.name == 'back') {
                finder.request('page:destroy', { name: 'watermark-page' });
              }
            }

          },

          /**
           * Processor request action.
           */
          makeProcessorRequest: function(action) {

            // @TODO make this more nice.
            var selectedFiles = finder.request('files:getSelected');
            var file = selectedFiles.first();

            var params = this.currentOptions;
            params.fileName = file.get('name');
            params._action = action;
            params.newfile_suffix = finder.config.Watermark.newFileSuffix || '';

            // Show loader.
            finder.request('loader:show', { text: finder.lang.Watermark.processingText });

            // Make processing request.
            finder.request('command:send', {
              name: 'Watermark',
              folder: file.get('folder'),
              params: params
            }).done(function(response) {

              finder.request('loader:hide');

              if (response.status) {
                var $image = jQuery('#watermark-preview-image', this.$el);
                var imageUrl = $image.attr('src');
                var imageUrlNew = imageUrl.split('?')[0] + '?v=' + Date.now();
                $image.attr('src', imageUrlNew);
                jQuery(':input', this.$el).val('').trigger('change');
                this.currentOptions.file = null;
                this.currentOptions.position = null;
                finder.request('page:destroy', { name: 'watermark-page' });
                finder.request('folder:refreshFiles');
              }
              else {
                finder.request('dialog', {
                  name: 'dialog-watermark-errordialog',
                  title: finder.lang.Watermark.error,
                  template: finder.lang.Watermark.unexpectedError.replace('%', response.statusCode),
                  buttons: ['ok']
                });
                finder.once('dialog:dialog-watermark-errordialog:ok', function(evt) {
                  finder.request('dialog:destroy', { name: 'dialog-watermark-dialog' });
                });
              }

            }.bind(this));
          }

        });

        // Define view model options, so to allow overriding.
        var modelOptions = {
          text: finder.lang.Watermark,
          file: file,
          watermarks: [
            {
              _index: 'none',
              label: finder.lang.Watermark.choiceWatermark
            }
          ]
        };

        // Add watermark options.
        for (var i in finder.config.Watermark.watermarks) {
          if (finder.config.Watermark.watermarks.hasOwnProperty(i)) {
            var o = finder.config.Watermark.watermarks[i];
            o._index = i;
            modelOptions.watermarks.push(o);
          }
        }

        // Create a View instance to be rendered in the page.
        var view = new imageWatermarkOptionsView( {
          model: new Backbone.Model(modelOptions)
        });

        // Last but not least, create the page.
        finder.request('page:create', {
          view: view,
          name: 'watermark-page',
          className: 'ckf-watermarkpage'
        });

        finder.request('page:show', { name: 'watermark-page' });
      }

      finder.setHandler('watermarkPageAction', watermarkPageAction, this);

    }
  };

});
