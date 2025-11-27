(function() {
  var imageData, imageUrl;

  imageUrl = 'http://example.com/image.jpg';

  imageData = 'data:image/png;base64,image-data...';

  describe('Cropit', function() {
    var cropit;
    cropit = null;
    it('sets default options', function() {
      cropit = new Cropit;
      expect(cropit.options.exportZoom).toBe(1);
      expect(cropit.options.imageBackground).toBe(false);
      expect(cropit.options.imageBackgroundBorderWidth).toBe(0);
      expect(cropit.options.imageState).toBe(null);
      expect(cropit.options.allowCrossOrigin).toBe(false);
      expect(cropit.options.allowDragNDrop).toBe(true);
      expect(cropit.options.minZoom).toBe('fill');
      return expect(cropit.options.freeMove).toBe(false);
    });
    describe('init()', function() {
      it('enables cross origin image source if allowCrossOrigin is set in options', function() {
        cropit = new Cropit(null, {
          allowCrossOrigin: true
        });
        return expect(cropit.image.crossOrigin).toBe('Anonymous');
      });
      it('disables cross origin image source if allowCrossOrigin is not set in options', function() {
        cropit = new Cropit;
        return expect(cropit.image.crossOrigin).not.toBe('Anonymous');
      });
      it('sets default zoom', function() {
        cropit = new Cropit;
        return expect(cropit.zoom).toBe(0);
      });
      it('sets default offset', function() {
        cropit = new Cropit;
        return expect(cropit.offset).toEqual({
          x: 0,
          y: 0
        });
      });
      it('restores imageState', function() {
        cropit = new Cropit(null, {
          imageState: {
            src: imageUrl,
            offset: {
              x: -1,
              y: -1
            },
            zoom: .5
          }
        });
        expect(cropit.imageSrc).toBe(imageUrl);
        expect(cropit.zoom).toBe(.5);
        return expect(cropit.offset).toEqual({
          x: -1,
          y: -1
        });
      });
      return it('calls loadImage() if image source is present', function() {
        cropit = new Cropit(null, {
          imageState: {
            src: imageUrl
          }
        });
        spyOn(cropit, 'loadImage');
        cropit.init();
        return expect(cropit.loadImage).toHaveBeenCalled();
      });
    });
    describe('onFileReaderLoaded()', function() {
      beforeEach(function() {
        return cropit = new Cropit;
      });
      it('calls loadImage()', function() {
        spyOn(cropit, 'loadImage');
        cropit.onFileReaderLoaded({
          target: {
            result: imageData
          }
        });
        return expect(cropit.loadImage).toHaveBeenCalled();
      });
      it('sets imageSrc', function() {
        cropit.imageSrc = imageUrl;
        expect(cropit.imageSrc).not.toBe(imageData);
        cropit.onFileReaderLoaded({
          target: {
            result: imageData
          }
        });
        return expect(cropit.imageSrc).toBe(imageData);
      });
      it('resets zoom', function() {
        cropit.zoom = 1;
        expect(cropit.zoom).not.toBe(0);
        cropit.onFileReaderLoaded({
          target: {
            result: imageData
          }
        });
        return expect(cropit.zoom).toBe(0);
      });
      return it('resets offset', function() {
        cropit.offset = {
          x: 1,
          y: 1
        };
        expect(cropit.offset).not.toEqual({
          x: 0,
          y: 0
        });
        cropit.onFileReaderLoaded({
          target: {
            result: imageData
          }
        });
        return expect(cropit.offset).toEqual({
          x: 0,
          y: 0
        });
      });
    });
    describe('loadImage()', function() {
      beforeEach(function() {
        return cropit = new Cropit;
      });
      return it('sets image source', function() {
        expect(cropit.image.src).not.toBe(imageData);
        cropit.loadImage(imageData);
        return expect(cropit.image.src).toBe(imageData);
      });
    });
    describe('onPreviewEvent()', function() {
      describe('mouse event', function() {
        var previewEvent;
        previewEvent = {
          type: 'mousedown',
          clientX: 1,
          clientY: 1,
          stopPropagation: function() {}
        };
        beforeEach(function() {
          return cropit = new Cropit;
        });
        it('sets origin coordinates on mousedown', function() {
          expect(cropit.origin).not.toEqual({
            x: 1,
            y: 1
          });
          cropit.imageLoaded = true;
          cropit.onPreviewEvent(previewEvent);
          return expect(cropit.origin).toEqual({
            x: 1,
            y: 1
          });
        });
        it('calls stopPropagation()', function() {
          spyOn(previewEvent, 'stopPropagation');
          cropit.imageLoaded = true;
          cropit.onPreviewEvent(previewEvent);
          return expect(previewEvent.stopPropagation).toHaveBeenCalled();
        });
        return it('does nothing before loading image', function() {
          spyOn(previewEvent, 'stopPropagation');
          cropit.onPreviewEvent(previewEvent);
          expect(cropit.origin).not.toEqual({
            x: 1,
            y: 1
          });
          return expect(previewEvent.stopPropagation).not.toHaveBeenCalled();
        });
      });
      return describe('touch event', function() {
        var previewEvent;
        previewEvent = {
          type: 'touchstart',
          originalEvent: {
            touches: [
              {
                clientX: 1,
                clientY: 1
              }
            ]
          },
          stopPropagation: function() {}
        };
        beforeEach(function() {
          return cropit = new Cropit;
        });
        it('sets origin coordinates on mousedown', function() {
          expect(cropit.origin).not.toEqual({
            x: 1,
            y: 1
          });
          cropit.imageLoaded = true;
          cropit.onPreviewEvent(previewEvent);
          return expect(cropit.origin).toEqual({
            x: 1,
            y: 1
          });
        });
        it('calls stopPropagation()', function() {
          spyOn(previewEvent, 'stopPropagation');
          cropit.imageLoaded = true;
          cropit.onPreviewEvent(previewEvent);
          return expect(previewEvent.stopPropagation).toHaveBeenCalled();
        });
        return it('does nothing before loading image', function() {
          spyOn(previewEvent, 'stopPropagation');
          cropit.onPreviewEvent(previewEvent);
          expect(cropit.origin).not.toEqual({
            x: 1,
            y: 1
          });
          return expect(previewEvent.stopPropagation).not.toHaveBeenCalled();
        });
      });
    });
    describe('fixOffset()', function() {
      beforeEach(function() {
        cropit = new Cropit;
        return cropit.imageLoaded = true;
      });
      describe('fixes x', function() {
        it('fits image to left if image width is less than preview', function() {
          var offset;
          cropit.imageSize = {
            w: 1
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            w: 1
          };
          offset = cropit.fixOffset({
            x: -1
          });
          return expect(offset.x).toBe(0);
        });
        it('fits image to left', function() {
          var offset;
          cropit.imageSize = {
            w: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            w: 1
          };
          offset = cropit.fixOffset({
            x: 1
          });
          return expect(offset.x).toBe(0);
        });
        it('fits image to right', function() {
          var offset;
          cropit.imageSize = {
            w: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            w: 1
          };
          offset = cropit.fixOffset({
            x: -2
          });
          return expect(offset.x).toBe(-1);
        });
        return it('rounds x', function() {
          var offset;
          cropit.imageSize = {
            w: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            w: 1
          };
          offset = cropit.fixOffset({
            x: -.12121
          });
          return expect(offset.x).toBe(-.12);
        });
      });
      return describe('fixes y', function() {
        it('fits image to top if image height is less than preview', function() {
          var offset;
          cropit.imageSize = {
            h: 1
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            h: 1
          };
          offset = cropit.fixOffset({
            y: -1
          });
          return expect(offset.y).toBe(0);
        });
        it('fits image to top', function() {
          var offset;
          cropit.imageSize = {
            h: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            h: 1
          };
          offset = cropit.fixOffset({
            y: 1
          });
          return expect(offset.y).toBe(0);
        });
        it('fits image to bottom', function() {
          var offset;
          cropit.imageSize = {
            h: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            h: 1
          };
          offset = cropit.fixOffset({
            y: -2
          });
          return expect(offset.y).toBe(-1);
        });
        return it('rounds y', function() {
          var offset;
          cropit.imageSize = {
            h: 4
          };
          cropit.zoom = .5;
          cropit.previewSize = {
            h: 1
          };
          offset = cropit.fixOffset({
            y: -.12121
          });
          return expect(offset.y).toBe(-.12);
        });
      });
    });
    describe('fixZoom()', function() {
      return it('returns zoomer.fixZoom()', function() {
        cropit = new Cropit;
        cropit.zoomer = {
          fixZoom: function() {
            return .1;
          }
        };
        expect(cropit.fixZoom()).toBe(.1);
        cropit.zoomer = {
          fixZoom: function() {
            return .5;
          }
        };
        expect(cropit.fixZoom()).toBe(.5);
        cropit.zoomer = {
          fixZoom: function() {
            return 1;
          }
        };
        return expect(cropit.fixZoom()).toBe(1);
      });
    });
    describe('isZoomable()', function() {
      return it('returns zoomer.isZoomable', function() {
        cropit = new Cropit;
        cropit.zoomer = {
          isZoomable: function() {
            return true;
          }
        };
        expect(cropit.isZoomable()).toBe(true);
        cropit.zoomer = {
          isZoomable: function() {
            return false;
          }
        };
        return expect(cropit.isZoomable()).toBe(false);
      });
    });
    describe('getImageState()', function() {
      return it('returns image state', function() {
        var imageState;
        cropit = new Cropit;
        cropit.imageSrc = imageData;
        cropit.offset = {
          x: -1,
          y: -1
        };
        cropit.zoom = .5;
        imageState = cropit.getImageState();
        expect(imageState.src).toBe(imageData);
        expect(imageState.offset).toEqual({
          x: -1,
          y: -1
        });
        return expect(imageState.zoom).toBe(.5);
      });
    });
    describe('getImageSrc()', function() {
      return it('returns image source', function() {
        cropit = new Cropit;
        cropit.imageSrc = imageUrl;
        return expect(cropit.getImageSrc()).toBe(imageUrl);
      });
    });
    describe('getOffset()', function() {
      return it('returns offset', function() {
        cropit = new Cropit;
        cropit.offset = {
          x: -2,
          y: -2
        };
        return expect(cropit.getOffset()).toEqual({
          x: -2,
          y: -2
        });
      });
    });
    describe('getZoom()', function() {
      return it('returns zoom', function() {
        cropit = new Cropit;
        cropit.zoom = .75;
        return expect(cropit.getZoom()).toBe(.75);
      });
    });
    describe('getImageSize()', function() {
      beforeEach(function() {
        return cropit = new Cropit;
      });
      it('returns image size', function() {
        cropit.imageSize = {
          w: 1,
          h: 1
        };
        return expect(cropit.getImageSize()).toEqual({
          width: 1,
          height: 1
        });
      });
      return it('returns null when imageSize is absent', function() {
        return expect(cropit.getImageSize()).toBe(null);
      });
    });
    describe('getPreviewSize()', function() {
      beforeEach(function() {
        return cropit = new Cropit;
      });
      return it('returns preview size', function() {
        cropit.previewSize = {
          w: 1,
          h: 1
        };
        return expect(cropit.getPreviewSize()).toEqual({
          width: 1,
          height: 1
        });
      });
    });
    return describe('setPreviewSize()', function() {
      beforeEach(function() {
        return cropit = new Cropit;
      });
      it('sets preview size', function() {
        cropit.previewSize = {
          w: 1,
          h: 1
        };
        expect(cropit.previewSize).not.toEqual({
          w: 2,
          h: 2
        });
        cropit.setPreviewSize({
          width: 2,
          height: 2
        });
        return expect(cropit.previewSize).toEqual({
          w: 2,
          h: 2
        });
      });
      return it('updates zoomer if image is loaded', function() {
        cropit.imageLoaded = true;
        cropit.imageSize = {
          w: 2,
          h: 2
        };
        spyOn(cropit.zoomer, 'setup');
        cropit.setPreviewSize({
          width: 1,
          height: 1
        });
        return expect(cropit.zoomer.setup).toHaveBeenCalled();
      });
    });
  });

}).call(this);
