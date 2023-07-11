
(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('question', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 150,
    uiColor: '#F7F8F9',
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord'
  });
}());


(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('optionA', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 60,
    uiColor: '#F7F8F9',
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord',
  });
}());


(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('editor3', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 60,
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord'
  });
}());


(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('editor4', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 60,
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord'
  });
}());


(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('editor5', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 60,
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord'
  });
}());

(function() {
  var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
  ];

  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('editor6', {
    extraPlugins: 'ckeditor_wiris',
    // For now, MathType is incompatible with CKEditor file upload plugins.
    removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
    height: 60,
    // Update the ACF configuration with MathML syntax.
    extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
    removeButtons: 'PasteFromWord'
  });
}());