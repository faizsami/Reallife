/*=========================================================================================
    File Name: app-invoice.js
    Description: app-invoice Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict';

  var applyChangesBtn = $('.btn-apply-changes'),
    discount,
    tax1,
    tax2,
    discountInput,
    tax1Input,
    tax2Input,
    sourceItem = $('.source-item'),
    date = new Date(),
    datepicker = $('.date-picker'),
    dueDate = $('.due-date-picker'),
    select2 = $('.invoiceto'),
    countrySelect = $('#customer-country'),
    btnAddNewItem = $('.btn-add-new ');

  // init date picker
  if (datepicker.length) {
    datepicker.each(function () {
      $(this).flatpickr({
        defaultDate: date
      });
    });
  }

  if (dueDate.length) {
    dueDate.flatpickr({
      defaultDate: new Date(date.getFullYear(), date.getMonth(), date.getDate() + 5)
    });
  }  

  // Repeater init
  // if (sourceItem.length) {
  //   sourceItem.on('submit', function (e) {
  //     e.preventDefault();
  //   });
  //   sourceItem.repeater({
  //     show: function () {
  //       $(this).slideDown();
  //     },
  //     hide: function (e) {
  //       $(this).slideUp();
  //     }
  //   });
  // }

  select2.select2({
    placeholder: 'Select product',
    dropdownParent: select2.parent()
  });

  

});
