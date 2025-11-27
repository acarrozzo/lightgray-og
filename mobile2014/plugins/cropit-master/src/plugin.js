(function() {
  var dataKey, methods;

  dataKey = 'cropit';

  methods = {
    init: function(options) {
      return this.each(function() {
        var cropit;
        if (!$.data(this, dataKey)) {
          cropit = new Cropit(this, options);
          return $.data(this, dataKey, cropit);
        }
      });
    },
    destroy: function() {
      return this.each(function() {
        return $.removeData(this, dataKey);
      });
    },
    isZoomable: function() {
      var cropit;
      cropit = this.first().data(dataKey);
      return cropit != null ? cropit.isZoomable() : void 0;
    },
    "export": function(options) {
      var cropit;
      cropit = this.first().data(dataKey);
      return cropit != null ? cropit.getCroppedImageData(options) : void 0;
    },
    imageState: function() {
      var cropit;
      cropit = this.first().data(dataKey);
      return cropit != null ? cropit.getImageState() : void 0;
    },
    imageSrc: function(newImageSrc) {
      var cropit;
      if (newImageSrc != null) {
        return this.each(function() {
          var cropit;
          cropit = $.data(this, dataKey);
          if (cropit != null) {
            cropit.reset();
          }
          return cropit != null ? cropit.loadImage(newImageSrc) : void 0;
        });
      } else {
        cropit = this.first().data(dataKey);
        return cropit != null ? cropit.getImageSrc() : void 0;
      }
    },
    offset: function(newOffset) {
      var cropit;
      if ((newOffset != null) && (newOffset.x != null) && (newOffset.y != null)) {
        return this.each(function() {
          var cropit;
          cropit = $.data(this, dataKey);
          return cropit != null ? cropit.setOffset(newOffset) : void 0;
        });
      } else {
        cropit = this.first().data(dataKey);
        return cropit != null ? cropit.getOffset() : void 0;
      }
    },
    zoom: function(newZoom) {
      var cropit;
      if (newZoom != null) {
        return this.each(function() {
          var cropit;
          cropit = $.data(this, dataKey);
          return cropit != null ? cropit.setZoom(newZoom) : void 0;
        });
      } else {
        cropit = this.first().data(dataKey);
        return cropit != null ? cropit.getZoom() : void 0;
      }
    },
    imageSize: function() {
      var cropit;
      cropit = this.first().data(dataKey);
      return cropit != null ? cropit.getImageSize() : void 0;
    },
    previewSize: function(newSize) {
      var cropit;
      if (newSize != null) {
        return this.each(function() {
          var cropit;
          cropit = $.data(this, dataKey);
          return cropit != null ? cropit.setPreviewSize(newSize) : void 0;
        });
      } else {
        cropit = this.first().data(dataKey);
        return cropit != null ? cropit.getPreviewSize() : void 0;
      }
    },
    disable: function() {
      return this.each(function() {
        var cropit;
        cropit = $.data(this, dataKey);
        return cropit.disable();
      });
    },
    reenable: function() {
      return this.each(function() {
        var cropit;
        cropit = $.data(this, dataKey);
        return cropit.reenable();
      });
    }
  };

  $.fn.cropit = function(method) {
    if (methods[method]) {
      return methods[method].apply(this, [].slice.call(arguments, 1));
    } else {
      return methods.init.apply(this, arguments);
    }
  };

}).call(this);
