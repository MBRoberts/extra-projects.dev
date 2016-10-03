"use strict";

var contacts = [
	{	
		name : "Bob",
		email : "test@email.com",
		phone : "123-123-1234",
	},{	
		name : "Billy",
		email : "billy@email.com",
		phone : "321-321-4321",
	},{	
		name : "Susan",
		email : "susan@email.com",
		phone : "987-987-9876",
	}
];

// see:
// http://ejohn.org/blog/javascript-micro-templating/

// Simple JavaScript Templating
// John Resig - http://ejohn.org/ - MIT Licensed

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


$('#btn-new').click(function(e) {

	// creates new contact
	var newContact = {
		name : $('#input-new-name').val(),
		email : $('#input-new-email').val(),
		phone : $('#input-new-phone').val(),
	};

	// Saves a boolean according to elements validitiy
	var nameValidity = $("#input-new-name")[0].checkValidity();
	var emailValidity = $("#input-new-email")[0].checkValidity();
	var phoneValidity = $("#input-new-phone")[0].checkValidity();

	// Checks validity, pushes new contact onto contacts and resets table
	if (nameValidity && emailValidity && phoneValidity) {
		contacts.push(newContact);
		results.innerHTML = tmpl("item_tmpl", contacts);
		btnListeners();
		$(".form-control").val("");
	}
});


function btnListeners() {

	$('.btn-edit').click(function(e) {

		var rowNum = $(this).closest('tr').index(); // gets the index of the table row
		var name = contacts[rowNum].name;
		var email = contacts[rowNum].email;
		var phone = contacts[rowNum].phone;

		// adds table data to edit form
		$('#input-edit-name').val(name);
		$('#input-edit-email').val(email);
		$('#input-edit-phone').val(phone);

		// resets the contacts properties to the edit inputs
		$('#btn-save').click(function(e) {
			contacts[rowNum].name = $('#input-edit-name').val();
			contacts[rowNum].email = $('#input-edit-email').val();
			contacts[rowNum].phone = $('#input-edit-phone').val();
			results.innerHTML = tmpl("item_tmpl", contacts);
			btnListeners();
		});
	});

	// confirms contact delete and splices contact out
	$('.btn-delete').click(function(e) {
		var rowNum = $(this).closest('tr').index();
		
		if(confirm("Are you sure you want to delete this?")) {
			contacts.splice(rowNum, 1);
			results.innerHTML = tmpl("item_tmpl", contacts);
			btnListeners();
		}
	});
};


// search engine
$('#input-search').keyup(function(e) {

	// checks each table row for the inputted string. Hide's the row if string is not present
	$.each($("tbody").find("tr"), function() {
        if ($(this).text().toLowerCase().indexOf($('#input-search').val().toLowerCase()) === -1) {
			$(this).hide();
		} else if ($('#input-search').val() === '') {
			results.innerHTML = tmpl("item_tmpl", contacts);
			btnListeners();
		} else {
            $(this).show();
        }
    });
});

// calls table template
results.innerHTML = tmpl("item_tmpl", contacts);
btnListeners();








