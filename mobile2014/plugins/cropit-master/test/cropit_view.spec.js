(function() {
  var dataKey, imageData, imageUrl;

  jasmine.getFixtures().fixturesPath = 'test/fixtures';

  dataKey = 'cropit';

  imageUrl = 'http://example.com/image.jpg';

  imageData = 'data:image/png;base64,image-data...';

  describe('Cropit View', function() {
    var $el, cropit;
    $el = null;
    cropit = null;
    describe('basic', function() {
      beforeEach(function() {
        loadFixtures('basic.html');
        return $el = $('.image-editor');
      });
      describe('init()', function() {
        it('sets preview size from options', function() {
          var $preview;
          $preview = $el.find('.cropit-image-preview');
          $preview.css({
            width: 1,
            height: 1
          });
          expect($preview.width()).not.toBe(2);
          expect($preview.height()).not.toBe(2);
          $el.cropit({
            width: 2,
            height: 2
          });
          expect($preview.width()).toBe(2);
          return expect($preview.height()).toBe(2);
        });
        it('sets preview background-repeat to no-repeat', function() {
          var $preview;
          $preview = $el.find('.cropit-image-preview');
          $preview.css({
            backgroundRepeat: 'repeat'
          });
          expect($preview.css('background-repeat')).not.toBe('no-repeat');
          $el.cropit();
          return expect($preview.css('background-repeat')).toBe('no-repeat');
        });
        it('sets min, max and step attributes on zoom slider', function() {
          var $zoomSlider;
          $zoomSlider = $el.find('input.cropit-image-zoom-input');
          $zoomSlider.attr({
            min: 2,
            max: 3,
            step: .5
          });
          expect($zoomSlider.attr('min')).not.toBe('0');
          expect($zoomSlider.attr('max')).not.toBe('1');
          expect($zoomSlider.attr('step')).not.toBe('0.01');
          $el.cropit();
          expect($zoomSlider.attr('min')).toBe('0');
          expect($zoomSlider.attr('max')).toBe('1');
          return expect($zoomSlider.attr('step')).toBe('0.01');
        });
        return it('sets zoom slider to 0', function() {
          var $zoomSlider;
          $zoomSlider = $el.find('input.cropit-image-zoom-input');
          $zoomSlider.val(1);
          expect($zoomSlider.val()).not.toBe(0);
          $el.cropit();
          return expect(Number($zoomSlider.val())).toBe(0);
        });
      });
      describe('onFileChange()', function() {
        it('is invoked when file input changes', function() {
          var $fileInput;
          spyOn(Cropit.prototype, 'onFileChange');
          $el.cropit();
          $fileInput = $el.find('input.cropit-image-input');
          $fileInput.trigger('change');
          return expect(Cropit.prototype.onFileChange).toHaveBeenCalled();
        });
        return it('calls options.onFileChange()', function() {
          var onFileChangeCallback;
          onFileChangeCallback = jasmine.createSpy('onFileChange callback');
          $el.cropit({
            onFileChange: onFileChangeCallback
          });
          cropit = $el.data(dataKey);
          cropit.onFileChange();
          return expect(onFileChangeCallback).toHaveBeenCalled();
        });
      });
      describe('loadImage()', function() {
        return it('calls options.onImageLoading()', function() {
          var onImageLoadingCallback;
          onImageLoadingCallback = jasmine.createSpy('onImageLoading callback');
          $el.cropit({
            onImageLoading: onImageLoadingCallback
          });
          cropit = $el.data(dataKey);
          cropit.loadImage(imageData);
          return expect(onImageLoadingCallback).toHaveBeenCalled();
        });
      });
      describe('onImageLoaded()', function() {
        describe('with imageSrc', function() {
          beforeEach(function() {
            $el.cropit();
            cropit = $el.data(dataKey);
            return cropit.imageSrc = imageData;
          });
          it('sets preview background', function() {
            var $preview;
            $preview = $el.find('.cropit-image-preview');
            expect($preview).not.toHaveCss({
              backgroundImage: "url(" + imageData + ")"
            });
            cropit.onImageLoaded();
            return expect($preview).toHaveCss({
              backgroundImage: "url(" + imageData + ")"
            });
          });
          it('sets up zoomer', function() {
            spyOn(cropit.zoomer, 'setup');
            cropit.onImageLoaded();
            return expect(cropit.zoomer.setup).toHaveBeenCalled();
          });
          return it('updates zoom slider', function() {
            var $zoomSlider;
            $zoomSlider = $el.find('input.cropit-image-zoom-input');
            $zoomSlider.val(1);
            cropit.zoomer.getSliderPos = function() {
              return .5;
            };
            expect(Number($zoomSlider.val())).not.toBe(.5);
            cropit.onImageLoaded();
            return expect(Number($zoomSlider.val())).toBe(.5);
          });
        });
        return it('calls options.onImageLoaded()', function() {
          var onImageLoadedCallback;
          onImageLoadedCallback = jasmine.createSpy('onImageLoaded callback');
          $el.cropit({
            onImageLoaded: onImageLoadedCallback
          });
          cropit = $el.data(dataKey);
          cropit.onImageLoaded();
          return expect(onImageLoadedCallback).toHaveBeenCalled();
        });
      });
      describe('onImageError()', function() {
        return it('calls options.onImageError()', function() {
          var onImageError;
          onImageError = jasmine.createSpy('onImageLoaded callback');
          $el.cropit({
            onImageError: onImageError
          });
          cropit = $el.data(dataKey);
          cropit.onImageError();
          return expect(onImageError).toHaveBeenCalled();
        });
      });
      describe('onPreviewEvent()', function() {
        describe('mouse event', function() {
          it('is invoked on mousedown on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('mousedown');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('is invoked on mouseup on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('mouseup');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('is invoked on mouseleave on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('mouseleave');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('binds onMove() on mousedown', function() {
            var $preview;
            $el.cropit();
            cropit = $el.data(dataKey);
            cropit.imageLoaded = true;
            cropit.imageSize = {
              w: 8,
              h: 6
            };
            cropit.previewSize = {
              w: 2,
              h: 2
            };
            $preview = $el.find('.cropit-image-preview');
            spyOn(Cropit.prototype, 'onMove');
            cropit.onPreviewEvent({
              type: 'mousedown',
              stopPropagation: function() {}
            });
            $preview.trigger('mousemove');
            return expect(Cropit.prototype.onMove).toHaveBeenCalled();
          });
          return it('moves image by dragging', function() {
            $el.cropit();
            cropit = $el.data(dataKey);
            cropit.imageLoaded = true;
            cropit.imageSize = {
              w: 8,
              h: 6
            };
            cropit.previewSize = {
              w: 2,
              h: 2
            };
            cropit.setOffset({
              x: 0,
              y: 0
            });
            spyOn(cropit, 'setOffset');
            cropit.onPreviewEvent({
              type: 'mousedown',
              clientX: -1,
              clientY: -1,
              stopPropagation: function() {}
            });
            expect(cropit.setOffset).not.toHaveBeenCalled();
            cropit.onMove({
              type: 'mousemove',
              clientX: -3,
              clientY: -2,
              stopPropagation: function() {}
            });
            return expect(cropit.setOffset).toHaveBeenCalledWith({
              x: -2,
              y: -1
            });
          });
        });
        return describe('touch event', function() {
          it('is invoked on touchstart on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('touchstart');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('is invoked on touchend on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('touchend');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('is invoked on touchcancel on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('touchcancel');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('is invoked on touchleave on preview', function() {
            var $preview;
            spyOn(Cropit.prototype, 'onPreviewEvent');
            $el.cropit();
            $preview = $el.find('.cropit-image-preview');
            $preview.trigger('touchleave');
            return expect(Cropit.prototype.onPreviewEvent).toHaveBeenCalled();
          });
          it('binds onMove() on touchstart', function() {
            var $preview;
            $el.cropit();
            cropit = $el.data(dataKey);
            cropit.imageLoaded = true;
            cropit.imageSize = {
              w: 8,
              h: 6
            };
            cropit.previewSize = {
              w: 2,
              h: 2
            };
            $preview = $el.find('.cropit-image-preview');
            spyOn(Cropit.prototype, 'onMove');
            cropit.onPreviewEvent({
              type: 'touchstart',
              stopPropagation: function() {}
            });
            $preview.trigger('touchmove');
            return expect(Cropit.prototype.onMove).toHaveBeenCalled();
          });
          return it('moves image by dragging', function() {
            $el.cropit();
            cropit = $el.data(dataKey);
            cropit.imageLoaded = true;
            cropit.imageSize = {
              w: 8,
              h: 6
            };
            cropit.previewSize = {
              w: 2,
              h: 2
            };
            cropit.setOffset({
              x: 0,
              y: 0
            });
            spyOn(cropit, 'setOffset');
            cropit.onPreviewEvent({
              type: 'touchstart',
              clientX: -1,
              clientY: -1,
              stopPropagation: function() {}
            });
            expect(cropit.setOffset).not.toHaveBeenCalled();
            cropit.onMove({
              type: 'touchmove',
              clientX: -3,
              clientY: -2,
              stopPropagation: function() {}
            });
            return expect(cropit.setOffset).toHaveBeenCalledWith({
              x: -2,
              y: -1
            });
          });
        });
      });
      describe('setOffset()', function() {
        beforeEach(function() {
          $el.cropit();
          cropit = $el.data(dataKey);
          cropit.imageSize = {
            w: 8,
            h: 6
          };
          cropit.previewSize = {
            w: 2,
            h: 2
          };
          cropit.zoom = 1;
          return cropit.imageLoaded = true;
        });
        return it('moves preview image', function() {
          var $preview;
          $preview = $el.find('.cropit-image-preview');
          expect($preview).not.toHaveCss({
            backgroundPosition: '-1px -1px'
          });
          cropit.setOffset({
            x: -1,
            y: -1
          });
          return expect($preview).toHaveCss({
            backgroundPosition: '-1px -1px'
          });
        });
      });
      describe('onZoomSliderChange()', function() {
        it('is invoked mousemove on zoom slider', function() {
          var $zoomSlider;
          spyOn(Cropit.prototype, 'onZoomSliderChange');
          $el.cropit();
          $zoomSlider = $el.find('input.cropit-image-zoom-input');
          $zoomSlider.trigger('mousemove');
          return expect(Cropit.prototype.onZoomSliderChange).toHaveBeenCalled();
        });
        it('is invoked touchmove on zoom slider', function() {
          var $zoomSlider;
          spyOn(Cropit.prototype, 'onZoomSliderChange');
          $el.cropit();
          $zoomSlider = $el.find('input.cropit-image-zoom-input');
          $zoomSlider.trigger('touchmove');
          return expect(Cropit.prototype.onZoomSliderChange).toHaveBeenCalled();
        });
        it('is invoked change on zoom slider', function() {
          var $zoomSlider;
          spyOn(Cropit.prototype, 'onZoomSliderChange');
          $el.cropit();
          $zoomSlider = $el.find('input.cropit-image-zoom-input');
          $zoomSlider.trigger('change');
          return expect(Cropit.prototype.onZoomSliderChange).toHaveBeenCalled();
        });
        return describe('when invoked', function() {
          beforeEach(function() {
            $el.cropit();
            cropit = $el.data(dataKey);
            cropit.imageSize = {
              w: 8,
              h: 6
            };
            cropit.previewSize = {
              w: 2,
              h: 2
            };
            cropit.zoom = 1;
            cropit.imageLoaded = true;
            return cropit.setZoom = function() {};
          });
          it('updates zoomSliderPos', function() {
            var $zoomSlider;
            cropit.zoomSliderPos = 0;
            expect(cropit.zoomSliderPos).not.toBe(1);
            $zoomSlider = $el.find('input.cropit-image-zoom-input');
            $zoomSlider.val(1);
            cropit.onZoomSliderChange();
            return expect(cropit.zoomSliderPos).toBe(1);
          });
          return it('calls setZoom', function() {
            spyOn(cropit, 'setZoom');
            cropit.onZoomSliderChange();
            return expect(cropit.setZoom).toHaveBeenCalled();
          });
        });
      });
      return describe('setZoom()', function() {
        var $preview;
        $preview = null;
        beforeEach(function() {
          $el.cropit();
          cropit = $el.data(dataKey);
          cropit.imageSize = {
            w: 8,
            h: 12
          };
          cropit.previewSize = {
            w: 2,
            h: 2
          };
          cropit.offset = {
            x: 0,
            y: 0
          };
          cropit.zoom = .5;
          cropit.imageLoaded = true;
          cropit.zoomer.minZoom = .5;
          cropit.zoomer.maxZoom = 1;
          return $preview = $el.find('.cropit-image-preview');
        });
        it('keeps attributes when set to original zoom', function() {
          cropit.setZoom(.5);
          expect(cropit.zoom).toBe(.5);
          expect(cropit.offset).toEqual({
            x: 0,
            y: 0
          });
          expect($preview).toHaveCss({
            backgroundPosition: '0px 0px'
          });
          return expect($preview).toHaveCss({
            backgroundSize: '4px 6px'
          });
        });
        it('zooms preview image', function() {
          expect(cropit.zoom).not.toBe(1);
          expect(cropit.offset).not.toEqual({
            x: -1,
            y: -1
          });
          expect($preview).not.toHaveCss({
            backgroundPosition: '-1px -1px'
          });
          expect($preview).not.toHaveCss({
            backgroundSize: '8px 12px'
          });
          cropit.setZoom(1);
          expect(cropit.zoom).toBe(1);
          expect(cropit.offset).toEqual({
            x: -1,
            y: -1
          });
          expect($preview).toHaveCss({
            backgroundPosition: '-1px -1px'
          });
          return expect($preview).toHaveCss({
            backgroundSize: '8px 12px'
          });
        });
        return it('keeps zoom in proper range', function() {
          expect(cropit.zoom).not.toBe(1);
          expect(cropit.offset).not.toEqual({
            x: -1,
            y: -1
          });
          expect($preview).not.toHaveCss({
            backgroundPosition: '-1px -1px'
          });
          expect($preview).not.toHaveCss({
            backgroundSize: '8px 12px'
          });
          cropit.setZoom(1.5);
          expect(cropit.zoom).toBe(1);
          expect(cropit.offset).toEqual({
            x: -1,
            y: -1
          });
          expect($preview).toHaveCss({
            backgroundPosition: '-1px -1px'
          });
          return expect($preview).toHaveCss({
            backgroundSize: '8px 12px'
          });
        });
      });
    });
    return describe('with background image', function() {
      beforeEach(function() {
        loadFixtures('image-background.html');
        return $el = $('.image-editor');
      });
      describe('init()', function() {
        it('inserts background image', function() {
          var $imageBg;
          $el.cropit({
            imageBackground: true
          });
          $imageBg = $el.find('img.cropit-image-background');
          expect($imageBg).toBeInDOM();
          return expect($imageBg).toHaveCss({
            position: 'absolute'
          });
        });
        it('inserts background image container', function() {
          var $imageBgContainer;
          $el.cropit({
            imageBackground: true
          });
          $imageBgContainer = $el.find('.cropit-image-background-container');
          expect($imageBgContainer).toBeInDOM();
          return expect($imageBgContainer).toHaveCss({
            position: 'absolute'
          });
        });
        it('offsets background image when border is specified', function() {
          var $imageBgContainer, $preview;
          $el.cropit({
            imageBackground: true,
            imageBackgroundBorderWidth: [1, 2, 3, 4]
          });
          $preview = $el.find('.cropit-image-preview');
          $imageBgContainer = $el.find('.cropit-image-background-container');
          return expect($imageBgContainer).toHaveCss({
            left: '-4px',
            top: '-1px',
            width: "" + ($preview.width() + 2 + 4) + "px",
            height: "" + ($preview.height() + 1 + 3) + "px"
          });
        });
        return it('takes numeric background image border size to make uniform border size', function() {
          var $imageBgContainer, $preview;
          $el.cropit({
            imageBackground: true,
            imageBackgroundBorderWidth: 3
          });
          $preview = $el.find('.cropit-image-preview');
          $imageBgContainer = $el.find('.cropit-image-background-container');
          return expect($imageBgContainer).toHaveCss({
            left: '-3px',
            top: '-3px',
            width: "" + ($preview.width() + 2 * 3) + "px",
            height: "" + ($preview.height() + 2 * 3) + "px"
          });
        });
      });
      describe('onImageLoaded()', function() {
        return it('updates background image source', function() {
          var $imageBg;
          $el.cropit({
            imageBackground: true
          });
          cropit = $el.data(dataKey);
          cropit.imageSrc = imageData;
          $imageBg = $el.find('img.cropit-image-background');
          expect($imageBg).not.toHaveAttr('src', imageData);
          cropit.onImageLoaded();
          return expect($imageBg).toHaveAttr('src', imageData);
        });
      });
      describe('setOffset()', function() {
        it('updates background image position', function() {
          var $imageBg;
          $el.cropit({
            imageBackground: true
          });
          cropit = $el.data(dataKey);
          cropit.imageSize = {
            w: 8,
            h: 6
          };
          cropit.previewSize = {
            w: 2,
            h: 2
          };
          cropit.zoom = 1;
          $imageBg = $el.find('img.cropit-image-background');
          expect($imageBg).not.toHaveCss({
            left: '-1px',
            top: '-1px'
          });
          cropit.setOffset({
            x: -1,
            y: -1
          });
          return expect($imageBg).toHaveCss({
            left: '-1px',
            top: '-1px'
          });
        });
        return it('adds background image border size to background image offset', function() {
          var $imageBg;
          $el.cropit({
            imageBackground: true,
            imageBackgroundBorderWidth: 2
          });
          cropit = $el.data(dataKey);
          cropit.imageSize = {
            w: 8,
            h: 6
          };
          cropit.previewSize = {
            w: 2,
            h: 2
          };
          cropit.zoom = 1;
          $imageBg = $el.find('img.cropit-image-background');
          expect($imageBg).not.toHaveCss({
            left: '-1px',
            top: '-1px'
          });
          cropit.setOffset({
            x: -3,
            y: -3
          });
          return expect($imageBg).toHaveCss({
            left: '-1px',
            top: '-1px'
          });
        });
      });
      return describe('setZoom()', function() {
        return it('zooms background image', function() {
          var $imageBg;
          $el.cropit({
            imageBackground: true
          });
          cropit = $el.data(dataKey);
          cropit.imageSize = {
            w: 8,
            h: 12
          };
          cropit.previewSize = {
            w: 2,
            h: 2
          };
          cropit.offset = {
            x: 0,
            y: 0
          };
          cropit.zoom = .5;
          cropit.imageLoaded = true;
          cropit.zoomer.minZoom = .5;
          cropit.zoomer.maxZoom = 1;
          $imageBg = $el.find('img.cropit-image-background');
          expect($imageBg).not.toHaveCss({
            width: '8px',
            height: '12px'
          });
          cropit.setZoom(1);
          return expect($imageBg).toHaveCss({
            width: '8px',
            height: '12px'
          });
        });
      });
    });
  });

}).call(this);
