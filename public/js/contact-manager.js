"use strict";

$(document).ready(function(){

	getInfo();  //  Calls first function

	// Makes ajax request and populates table with JSON info
	function getInfo() {

		var contents = "<tr><th>Name</th><th>Email</th><th>Phone #</th><th>Actions</th></tr>";

		$.get("data/contacts.json").done(function(data) {

			data.forEach(function(element){  //  Concatenates JSON data into a html string
				contents += "<tr class='table-info'><td>" + element.name + "</td>";
				contents += "<td>" + element.email + "</td>";
				contents += "<td>" + element.phone + "</td>";
				contents += "<td>" + element.actions + "</td></tr>";
			});
			
			$("table").append(contents);  //  Attaches html string to table

			editBtn();  //  Adds event listener to the edit button
			removeBtn();  //  Adds event listener to the remove button

		
		}).fail(function() {

			alert("There's an error with your AJAX request");

		});
	}

	//  Adds event listener to both the edit buttons and save changes button. Also replaces info in the table with editted info.
	function editBtn() {
		$('.edit-btn').click(function(e) {
			$('#edit-name').val($(this).parent().parent().children()[0].innerText);
			$('#edit-email').val($(this).parent().parent().children()[1].innerText);
			$('#edit-phone').val($(this).parent().parent().children()[2].innerText);
			
			$("#edit-save").click(function() {
				e.currentTarget.parentElement.parentElement.children[0].innerText = $('#edit-name').val();
				e.currentTarget.parentElement.parentElement.children[1].innerText = $('#edit-email').val();
				e.currentTarget.parentElement.parentElement.children[2].innerText = $('#edit-phone').val();
			});
		});
	}

	//  Adds listener to remove buttons and removes the table row
	function removeBtn() {
		$(".btn-danger").click(function(e) {
			var confirmBtn = confirm("Are you sure you want to delete this");
			console.log(confirmBtn);
			if (confirmBtn) {
				$(this).parent().parent().remove();
			}
		});
	}

	//  Search engine 
	function search() {

		$('#search-input').keyup(function(e) {
			
			var $tableRows = $(".table tbody").children("tr.table-info");  //  Pulls table rows
			
			$.each($tableRows, function() {
				
				var stringCheck = $(this).text().toLowerCase().indexOf($('#search-input').val().toLowerCase());  //  If the typed string is not present within the table's information, it will return a -1

				if(stringCheck === -1) {
					$(this).hide();  //  Hides each row that doesn't contain the string
				} else {
					$(this).show();
				}
			});
			if ($('#search-input').val() === '') {  //  If the search characters are deleted 
				$('table').text('');                //  the table is cleared so that info isn't duplicated when appended
				getInfo();							//  Repopulates the table
			}
		});
	};

	$('#search-input').click(function(){
		search();
	});

	//  Adds listener to the add button and adds the info to the table
	$("#add-btn").click(function(e) {

		e.preventDefault();
		
		var nameValid = e.currentTarget.form[0].validity.valid;  
		var emailValid = e.currentTarget.form[1].validity.valid;  //  Stores booleans of wether or not the fields are valid
		var phoneValid = e.currentTarget.form[2].validity.valid;  

		if (nameValid && emailValid && phoneValid) {  //  If all fields are valid the info is added to the table

			var $name = $("#name-input").val();
			var $email = $("#email-input").val();
			var $phone = $("#phone-input").val();
			var actions = "<button type='button' class='btn btn-secondary edit-btn' data-toggle='modal' data-target='#myModal'>Edit</button><button class='btn btn-danger'>Remove</button>";

			var tableContent = "<tr><td>" + $name + "</td>";
			tableContent += "<td>" + $email + "</td>";
			tableContent += "<td>" + $phone + "</td>";
			tableContent += "<td>" + actions + "</td></tr>";

			$('.table').append(tableContent);

			editBtn();  //  adds listener to edit buttons
			removeBtn();  //  adds listener to remove buttons
		}
	});

	//  Clears input values
	$("#clear-btn").click(function(e) {
		$("#name-input").val('');
		$("#email-input").val('');
		$("#phone-input").val('');
	});
});