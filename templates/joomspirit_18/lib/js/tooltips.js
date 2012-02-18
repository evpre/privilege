window.addEvent('domready', function() {
  //store titles and text
  $$('a.tips').each(function(element,index) {
    var content = element.get('title').split('::');
    element.store('tip:title', content[0]);
    element.store('tip:text', content[1]);
  });
  
  //create the tooltips
  var tipz = new Tips('.tips',{
    className: 'tips',
    fixed: true,
    hideDelay: 50,
    showDelay: 50
  });
  
  tipz.addEvents({
  'show': function(tip) {
    tip.fade('in');
  },
  'hide': function(tip) {
    tip.fade('out');
  }
});

});