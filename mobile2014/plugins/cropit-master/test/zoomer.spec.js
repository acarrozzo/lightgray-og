(function() {
  describe('Zoomer', function() {
    var zoomer;
    zoomer = null;
    beforeEach(function() {
      return zoomer = new Zoomer;
    });
    describe('setup()', function() {
      it('sets minZoom to the larger of widthRatio and heightRatio in `fill` minZoom mode', function() {
        zoomer.setup({
          w: 4,
          h: 2
        }, {
          w: 1,
          h: 1
        });
        expect(zoomer.minZoom).toBe(.5);
        zoomer.setup({
          w: 2,
          h: 4
        }, {
          w: 1,
          h: 1
        });
        expect(zoomer.minZoom).toBe(.5);
        zoomer.setup({
          w: 2,
          h: 2
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.minZoom).toBe(.5);
      });
      it('sets minZoom to the smaller of widthRatio and heightRatio `fit` minZoom mode', function() {
        zoomer.setup({
          w: 4,
          h: 2
        }, {
          w: 1,
          h: 1
        }, 1, {
          minZoom: 'fit'
        });
        expect(zoomer.minZoom).toBe(.25);
        zoomer.setup({
          w: 2,
          h: 4
        }, {
          w: 1,
          h: 1
        }, 1, {
          minZoom: 'fit'
        });
        expect(zoomer.minZoom).toBe(.25);
        zoomer.setup({
          w: 2,
          h: 2
        }, {
          w: 1,
          h: 1
        }, 1, {
          minZoom: 'fit'
        });
        return expect(zoomer.minZoom).toBe(.5);
      });
      it('sets maxZoom to minZoom if image is smaller than preview', function() {
        zoomer.setup({
          w: 4,
          h: 2
        }, {
          w: 5,
          h: 5
        });
        return expect(zoomer.maxZoom).toBe(zoomer.minZoom);
      });
      it('sets maxZoom to 1 if image is larger than preview', function() {
        zoomer.setup({
          w: 4,
          h: 2
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.maxZoom).toBe(1);
      });
      return it('scales maxZoom in inverse proportion to exportZoom', function() {
        zoomer.setup({
          w: 8,
          h: 4
        }, {
          w: 1,
          h: 1
        }, 2);
        return expect(zoomer.maxZoom).toBe(.5);
      });
    });
    describe('getZoom()', function() {
      it('returns null before set up', function() {
        return expect(zoomer.getZoom()).toBe(null);
      });
      return it('returns proper zoom level', function() {
        zoomer.minZoom = .5;
        zoomer.maxZoom = 1;
        expect(zoomer.getZoom(0)).toBe(.5);
        expect(zoomer.getZoom(.5)).toBe(.75);
        return expect(zoomer.getZoom(1)).toBe(1);
      });
    });
    describe('getSliderPos()', function() {
      it('returns null before set up', function() {
        return expect(zoomer.getSliderPos()).toBe(null);
      });
      it('returns proper slider pos', function() {
        zoomer.minZoom = .5;
        zoomer.maxZoom = 1;
        expect(zoomer.getSliderPos(.5)).toBe(0);
        expect(zoomer.getSliderPos(.75)).toBe(.5);
        return expect(zoomer.getSliderPos(1)).toBe(1);
      });
      it('returns 0 when minZoom and maxZoom are the same', function() {
        zoomer.minZoom = 2;
        zoomer.maxZoom = 2;
        expect(zoomer.getSliderPos(1)).toBe(0);
        expect(zoomer.getSliderPos(2)).toBe(0);
        return expect(zoomer.getSliderPos(3)).toBe(0);
      });
      return it('is inverse to getZoom()', function() {
        var calculatedSliderPos, sliderPos, zoom, _i, _len, _ref, _results;
        zoomer.minZoom = Math.random();
        zoomer.maxZoom = Math.random() + zoomer.minZoom;
        _ref = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10].map(function(x) {
          return x / 10;
        });
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          sliderPos = _ref[_i];
          zoom = zoomer.getZoom(sliderPos);
          calculatedSliderPos = zoomer.getSliderPos(zoom);
          expect(calculatedSliderPos).toBeGreaterThan(sliderPos - .0001);
          _results.push(expect(calculatedSliderPos).toBeLessThan(sliderPos + .0001));
        }
        return _results;
      });
    });
    describe('isZoomable()', function() {
      it('returns null when before set up', function() {
        return expect(zoomer.isZoomable()).toBe(null);
      });
      it('returns true when image is bigger than preview', function() {
        zoomer.setup({
          w: 2,
          h: 2
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.isZoomable()).toBe(true);
      });
      it('returns false when image is the same size as preview', function() {
        zoomer.setup({
          w: 1,
          h: 1
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.isZoomable()).toBe(false);
      });
      it('returns false when image has the same width as preview', function() {
        zoomer.setup({
          w: 1,
          h: 2
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.isZoomable()).toBe(false);
      });
      it('returns false when image has the same height as preview', function() {
        zoomer.setup({
          w: 2,
          h: 1
        }, {
          w: 1,
          h: 1
        });
        return expect(zoomer.isZoomable()).toBe(false);
      });
      return it('returns false when image is smaller than preview', function() {
        zoomer.setup({
          w: 1,
          h: 1
        }, {
          w: 2,
          h: 2
        });
        return expect(zoomer.isZoomable()).toBe(false);
      });
    });
    return describe('fixZoom()', function() {
      beforeEach(function() {
        zoomer.minZoom = .5;
        return zoomer.maxZoom = 1;
      });
      it('fixes zoom when it is too small', function() {
        expect(zoomer.fixZoom(0)).toBe(.5);
        expect(zoomer.fixZoom(.25)).toBe(.5);
        return expect(zoomer.fixZoom(.49)).toBe(.5);
      });
      it('fixes zoom when it is too large', function() {
        expect(zoomer.fixZoom(1.5)).toBe(1);
        return expect(zoomer.fixZoom(1.1)).toBe(1);
      });
      return it('keeps zoom when it is right', function() {
        expect(zoomer.fixZoom(.5)).toBe(.5);
        expect(zoomer.fixZoom(.75)).toBe(.75);
        return expect(zoomer.fixZoom(1)).toBe(1);
      });
    });
  });

}).call(this);
