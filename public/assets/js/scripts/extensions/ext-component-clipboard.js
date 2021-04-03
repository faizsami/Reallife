/*=========================================================================================
    File Name: ext-component-clipboard.js
    Description: Copy to clipboard
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

var userText = $('#hiddenClipboard');
var btnCopy = $('#copytoclipboardId');

// copy text on click
btnCopy.on('click', function () {
  const textToCopy = userText.val();
  navigator.clipboard.writeText(textToCopy)
  .then(() => { toastr['success']('', 'Copied to clipboard!') })
  .catch((error) => { toastr['error']('', 'Copy failed!') })
  // userText.select();
  // document.execCommand('copy');
  // toastr['success']('', 'Copied to clipboard!');
});
