/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	3.0.0
*/

(function($) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-tabletools');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [
				{
					extend: 'print',
					text: 'Imprimir'
				},
				{
					extend: 'excel',
					text: 'Excel'
				},
				{
					extend: 'pdf',
					text: 'PDF',
					customize : function(doc){
			            var colCount = new Array();
			            $('#datatable-tabletools').find('tbody tr:first-child td').each(function(){
			                if($(this).attr('colspan')){
			                    for(var i=1;i<=$(this).attr('colspan');$i++){
			                        colCount.push('*');
			                    }
			                }else{ colCount.push('*'); }
			            });
			            doc.content[1].table.widths = colCount;
			        }
				}
			]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools_wrapper .dt-buttons' );

		$('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	var datatableInit1 = function() {
		var $table = $('#datatable-tabletools1');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [
				{
					extend: 'print',
					text: 'Imprimir'
				},
				{
					extend: 'excel',
					text: 'Excel'
				},
				{
					extend: 'pdf',
					text: 'PDF',
					customize : function(doc){
			            var colCount = new Array();
			            $('#datatable-tabletools1').find('tbody tr:first-child td').each(function(){
			                if($(this).attr('colspan')){
			                    for(var i=1;i<=$(this).attr('colspan');$i++){
			                        colCount.push('*');
			                    }
			                }else{ colCount.push('*'); }
			            });
			            doc.content[1].table.widths = colCount;
			        }
				}
			]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools1_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools1_wrapper .dt-buttons' );

		$('#datatable-tabletools1_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	var datatableInit2 = function() {
		var $table = $('#datatable-tabletools2');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [
				{
					extend: 'print',
					text: 'Imprimir'
				},
				{
					extend: 'excel',
					text: 'Excel'
				},
				{
					extend: 'pdf',
					text: 'PDF',
					customize : function(doc){
			            var colCount = new Array();
			            $('#datatable-tabletools2').find('tbody tr:first-child td').each(function(){
			                if($(this).attr('colspan')){
			                    for(var i=1;i<=$(this).attr('colspan');$i++){
			                        colCount.push('*');
			                    }
			                }else{ colCount.push('*'); }
			            });
			            doc.content[1].table.widths = colCount;
			        }
				}
			]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools2_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools2_wrapper .dt-buttons' );

		$('#datatable-tabletools2_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};


	var datatableInit3 = function() {
		var $table = $('#datatable-tabletools3');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [
				{
					extend: 'print',
					text: 'Imprimir'
				},
				{
					extend: 'excel',
					text: 'Excel'
				},
				{
					extend: 'pdf',
					text: 'PDF',
					customize : function(doc){
			            var colCount = new Array();
			            $('#datatable-tabletools3').find('tbody tr:first-child td').each(function(){
			                if($(this).attr('colspan')){
			                    for(var i=1;i<=$(this).attr('colspan');$i++){
			                        colCount.push('*');
			                    }
			                }else{ colCount.push('*'); }
			            });
			            doc.content[1].table.widths = colCount;
			        }
				}
			]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools3_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools3_wrapper .dt-buttons' );

		$('#datatable-tabletools3_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	var datatableInit4 = function() {
		var $table = $('#datatable-tabletools4');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			buttons: [
				{
					extend: 'print',
					text: 'Imprimir'
				},
				{
					extend: 'excel',
					text: 'Excel'
				},
				{
					extend: 'pdf',
					text: 'PDF',
					customize : function(doc){
			            var colCount = new Array();
			            $('#datatable-tabletools4').find('tbody tr:first-child td').each(function(){
			                if($(this).attr('colspan')){
			                    for(var i=1;i<=$(this).attr('colspan');$i++){
			                        colCount.push('*');
			                    }
			                }else{ colCount.push('*'); }
			            });
			            doc.content[1].table.widths = colCount;
			        }
				}
			]
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools4_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools4_wrapper .dt-buttons' );

		$('#datatable-tabletools4_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	var datatableInit5 = function() {
		var $table = $('#datatable-tabletools5');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools5_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools5_wrapper .dt-buttons' );

		$('#datatable-tabletools5_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};

	var datatableInit6 = function() {
		var $table = $('#datatable-tabletools6');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools6_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools6_wrapper .dt-buttons' );

		$('#datatable-tabletools6_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};
	
	var datatableInit7 = function() {
		var $table = $('#datatable-tabletools7');

		var table = $table.dataTable({
			sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		});

		$('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools7_wrapper');

		$table.DataTable().buttons().container().prependTo( '#datatable-tabletools7_wrapper .dt-buttons' );

		$('#datatable-tabletools7_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
	};
	

	

	$(function() {
		datatableInit();
		datatableInit1();
		datatableInit2();
		datatableInit3();
		datatableInit4();
		datatableInit5();
		datatableInit6();
		datatableInit7();
	});

}).apply(this, [jQuery]);
