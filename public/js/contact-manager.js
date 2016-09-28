// see:
// http://ejohn.org/blog/javascript-micro-templating/

// Simple JavaScript Templating
// John Resig - http://ejohn.org/ - MIT Licensed
(function(){
	var cache = {};

	this.tmpl = function tmpl(str, data){
		// Figure out if we're getting a template, or if we need to
		// load the template - and be sure to cache the result.
		var fn = !/\W/.test(str) ?
			cache[str] = cache[str] ||
			tmpl(document.getElementById(str).innerHTML) :

		// Generate a reusable function that will serve as a template
		// generator (and which will be cached).
		new Function("obj",
			"var p=[],print=function(){p.push.apply(p,arguments);};" +

			// Introduce the data as local variables using with(){}
			"with(obj){p.push('" +

			// Convert the template into pure JavaScript
			str
				.replace(/[\r\t\n]/g, " ")
				.split("<%")
				.join("\t")
				.replace(/((^|%>)[^\t]*)'/g, "$1\r")
				.replace(/\t=(.*?)%>/g, "',$1,'")
				.split("\t")
				.join("');")
				.split("%>")
				.join("p.push('")
				.split("\r")
				.join("\\'")

			+ "');}return p.join('');");

		// Provide some basic currying to the user
		return data ? fn( data ) : fn;
	};
})();

// search engine
$('#input-search').keyup(function(e) {

	// checks each table row for the inputted string. Hide's the row if string is not present
	$.each($("tbody").find("tr"), function() {
        if ($(this).text().toLowerCase().indexOf($('#input-search').val().toLowerCase()) === -1) {
			$(this).hide();
		} else if ($('#input-search').val() === '') {
			insertTable();
		} else {
            $(this).show();
        }
    });
});


// when 'add contact' button is clicked, the new info is saved into an object and pushed on to the dataObject and saved back into localStorage
$('#btn-new').click(function(e) {

	e.preventDefault();

	var dataObject = $.localStorage.get("dataObject");
	var newContact = {
		
		name : $('#input-new-name').val(),
		email : $('#input-new-email').val(),
		phone : $('#input-new-phone').val(),
		id : (dataObject.contacts.length + 1)

	};

	dataObject.contacts.push(newContact);
	$.localStorage.set("dataObject", dataObject);
	$(".form-control").val("");
	insertTable();

});


$('#btn-clear').click(function(e) {
	$(".form-control").val("");
});


$(function() {

	if ($.localStorage.isSet('dataObject')) {
		insertTable();
	} else {

		var dataObject = {
			contacts:[]
		};
		
		$.localStorage.set("dataObject", dataObject);
		insertTable();
	}

});


function insertTable() {

	var dataObject = $.localStorage.get("dataObject");
	var results = document.getElementById("results");

	results.innerHTML = tmpl("item_tmpl", dataObject);
	editBtnListeners();
	deleteBtn();

}


function editBtnListeners() {

	$('.btn-edit').click(function(e) {

		var btnData = $(this).data('tablerow');
		var tableRow = $('#' + btnData);
		var tableDataName = $(tableRow).children()[0];
		var tableDataEmail = $(tableRow).children()[1];
		var tableDataPhone = $(tableRow).children()[2];

		$('#input-edit-name').val(tableDataName.innerText);
		$('#input-edit-email').val(tableDataEmail.innerText);
		$('#input-edit-phone').val(tableDataPhone.innerText);
		
		$('#btn-save').on('click', function(e) {

			var dataObject = $.localStorage.get("dataObject");

			dataObject.contacts[(btnData)].name = $('#input-edit-name').val();
			dataObject.contacts[(btnData)].email = $('#input-edit-email').val();
			dataObject.contacts[(btnData)].phone = $('#input-edit-phone').val();

			$.localStorage.set("dataObject", dataObject);

			$('#btn-save').off('click');

			insertTable();

		});
	});
};


function deleteBtn() {
	$(".btn-delete").click(function(e) {

		var dataObject = $.localStorage.get('dataObject');

		if (confirm('Are you sure you want to delete this?')) {
			console.log($(this).data('tableRow'));
			dataObject.contacts.splice(dataObject.contacts.indexOf($(this).data('tableRow')), 1);

			$.localStorage.set("dataObject", dataObject);
			insertTable();

		};
	});
}







































