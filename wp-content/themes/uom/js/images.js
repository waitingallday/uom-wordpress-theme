(function() {
  if (!window.UOMwImages) {
    window.UOMwImages = function() {
      var HeroImage, img, _results;
      HeroImage = (function() {
        function HeroImage(el) {
          var docroot, parent;
          this.el = el;
          docroot = document.querySelector('[role="main"] .article')
          parent = el.parentNode;
          parent.removeChild(el);
          docroot.insertBefore(el, docroot.firstChild);
          parent.remove();
        }
        return HeroImage;
      })();
      _results = [];
      _results.push(new HeroImage(document.querySelector('.article img:first-child')));
      return _results;
    };
  }
}).call(this);

window.UOMwloadComponents = function() {
  window.UOMwImages();
};

if (window.attachEvent) {
  window.attachEvent('onload', window.UOMwloadComponents);
} else {
  document.addEventListener('DOMContentLoaded', window.UOMwloadComponents, false);
  document.addEventListener('page:change', function() {
    window.UOMwloadComponents();
  }, false);
}
