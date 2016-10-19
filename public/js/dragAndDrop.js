'use strict';

(function(){

	var dragSrcEl = null;

	function handleDragStart(e) {
		// Target (this) element is the source node.
		this.style.opacity = '0.5';
		dragSrcEl = this;

		e.dataTransfer.effectAllowed = 'move';
		e.dataTransfer.setData('text/html', this.innerHTML);
	}

	function handleDragOver(e) {
		
		if (e.preventDefault) {
			e.preventDefault(); // Necessary. Allows us to drop.
		}
		e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

		return false;
	}

	function handleDragEnter(e) {
		this.parentNode.style.backgroundColor = '#555';  // this / e.target is the current hover target.
	}

	function handleDragLeave(e) {
		this.parentNode.style.backgroundColor = '#ccc';  // this / e.target is previous target element.
	}

	function handleDrop(e) {
		// this/e.target is current target element.
		[].forEach.call(cols, function (col, index) {
			col.parentNode.style.backgroundColor = '#ccc';
			col.style.opacity = '1';
			imgs[index].style.opacity = '1';
			imgs[index].parentNode.style.backgroundColor = '#ccc';
		});

		if (e.stopPropagation) {
			e.stopPropagation(); // Stops some browsers from redirecting.
		}
			
		// Don't do anything if dropping the same column we're dragging.
		if (dragSrcEl != this) {
			// Set the source column's HTML to the HTML of the column we dropped on.
			dragSrcEl.innerHTML = this.innerHTML;
			this.innerHTML = e.dataTransfer.getData('text/html');
			modalBtn();
		}

		return false;
}

	function handleDragEnd(e) {
		// this/e.target is the source node.
		[].forEach.call(cols, function (col, index) {
			col.parentNode.style.backgroundColor = '#ccc';;
			col.style.opacity = '1';
			imgs[index].style.opacity = '1';
		});
	}

	function modalData(e) {
		var key = $(this).attr('data');
		console.log(key);
		$('.modal-title').text($mentorArray[key].name);
		$('.description').text($mentorArray[key].description);
	}

	var cols = document.querySelectorAll('.column');
	var imgs = document.getElementsByClassName('img');

	function modalBtn() {
		var btns = document.getElementsByClassName('modal-btn');

		[].forEach.call(btns, function(btn) {
			btn.addEventListener('click', modalData, false);
		});
	}

	modalBtn();

	[].forEach.call(cols, function(col, index) {
		col.addEventListener('dragstart', handleDragStart, false);
		col.addEventListener('dragenter', handleDragEnter, false);
		col.addEventListener('dragover', handleDragOver, false);
		col.addEventListener('dragleave', handleDragLeave, false);
		col.addEventListener('drop', handleDrop, false);
		col.addEventListener('dragend', handleDragEnd, false);
		imgs[index].addEventListener('dragleave', handleDragLeave, false);
		imgs[index].addEventListener('dragenter', handleDragEnter, false);
		imgs[index].addEventListener('dragend', handleDragEnd, false);
	});



})();