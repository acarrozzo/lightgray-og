(function() {
  var Zoomer;

  Zoomer = (function() {
    function Zoomer() {}

    Zoomer.prototype.setup = function(imageSize, previewSize, exportZoom, options) {
      var heightRatio, widthRatio;
      if (exportZoom == null) {
        exportZoom = 1;
      }
      widthRatio = previewSize.w / imageSize.w;
      heightRatio = previewSize.h / imageSize.h;
      if ((options != null ? options.minZoom : void 0) === 'fit') {
        this.minZoom = widthRatio < heightRatio ? widthRatio : heightRatio;
      } else {
        this.minZoom = widthRatio < heightRatio ? heightRatio : widthRatio;
      }
      return this.maxZoom = this.minZoom < 1 / exportZoom ? 1 / exportZoom : this.minZoom;
    };

    Zoomer.prototype.getZoom = function(sliderPos) {
      if (!(this.minZoom && this.maxZoom)) {
        return null;
      }
      return sliderPos * (this.maxZoom - this.minZoom) + this.minZoom;
    };

    Zoomer.prototype.getSliderPos = function(zoom) {
      if (!(this.minZoom && this.maxZoom)) {
        return null;
      }
      if (this.minZoom === this.maxZoom) {
        return 0;
      } else {
        return (zoom - this.minZoom) / (this.maxZoom - this.minZoom);
      }
    };

    Zoomer.prototype.isZoomable = function() {
      if (!(this.minZoom && this.maxZoom)) {
        return null;
      }
      return this.minZoom !== this.maxZoom;
    };

    Zoomer.prototype.fixZoom = function(zoom) {
      if (zoom < this.minZoom) {
        return this.minZoom;
      }
      if (zoom > this.maxZoom) {
        return this.maxZoom;
      }
      return zoom;
    };

    return Zoomer;

  })();

}).call(this);
