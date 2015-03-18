<script type="text/javascript">
	<!--
	// feedback_check.php

	var categoryList, selCategory, productList;

	var products_id = <?php echo json_encode($products_id);?>;
	var products_name = <?php echo json_encode($products_name);?>;
	var categorie_name = <?php echo json_encode($categorie_name);?>;

	function getProductIndex(idx)
	{
		if ( selCategory == "Decor" )
			return idx;
		else if ( selCategory == "Tools" )
			return 11+idx;
		else if ( selCategory == "Supplies" )
			return 18+idx;
	}

	//create elements when a product is chosen
	function selectProduct(select)
	{
		var option = select.options[select.selectedIndex];	//selected option
		var ul = document.getElementById('selectedOptions');	//destination ul
		var choices = ul.getElementsByTagName('span');	//an array of span items
		for (var i = 0; i < choices.length; i++)
			if (choices[i].innerHTML == option.value
				&& select.selectedIndex != 0)
				return;
		var li = document.createElement('li'); //a new li element
		var labelName = document.createElement('span');	//for the name of the object

		//span label
		labelName.innerHTML = option.value;

		//to get the index
		var productIndex = getProductIndex(select.selectedIndex-1);  

		//button to remove the li
		var buttonRm = document.createElement('input');
		buttonRm.type = 'button';
		buttonRm.value = 'Remove';
		buttonRm.setAttribute('onclick', 'RemoveNode(this.parentNode);');

		//label name and button
		li.className = 'ProductsSpacing';
		li.appendChild(labelName);
		li.appendChild(buttonRm);

		li.appendChild(document.createElement('br'));
		li.appendChild(document.createElement('br'));

		//ratio experience label and radio buttons
		var expLabel = document.createTextNode('Rate your experience (from 1 to 5): ');
		li.appendChild(expLabel);
		li.appendChild(document.createElement('br'));

		var rL = "ratio";

		for (var i = 1; i <= 5; i++)
		{
			var ratioValue = document.createTextNode(' ' + i + ' ');
			li.appendChild(ratioValue);
			//for quantity input
			var inputQtd = document.createElement('input');	//for the name of the object
			inputQtd.id = rL.concat(i, products_id[productIndex]);	//set its id: "ratio + category + id"
			inputQtd.type = 'radio';
			inputQtd.name = rL.concat(products_id[productIndex]);	//sets its name
			inputQtd.value = i;
			li.appendChild(inputQtd);
		}

		li.appendChild(document.createElement('br'));
		li.appendChild(document.createElement('br'));

		//prices label and radio buttons
		var priceLabel = document.createTextNode('How reasonable do you find its price to be?');
		li.appendChild(priceLabel);
		li.appendChild(document.createElement('br'));

		var pL = "price";

		for ( var i = 1; i <= 3; i++ )
		{
			var innerPriceLabel, innerValue;
			if ( i == 1 )
			{
				innerPriceLabel = " Expensive.";
				innerValue = "Expensive";
			}
			else if ( i == 2 )
			{
				innerPriceLabel = " About Right.";
				innerValue = "About Right";
			}
			else
			{
				innerPriceLabel = " Cheapest I've ever seen!";
				innerValue = "Cheap";
			}

			var inputPrice = document.createElement('input');	//for the name of the object
			inputPrice.id = pL.concat(i, products_id[productIndex]);	//set its id: "price + category + id"
			inputPrice.type = 'radio';
			inputPrice.name = pL.concat(products_id[productIndex]);
			inputPrice.value = innerValue;
			li.appendChild(inputPrice);
			var priceLabel = document.createTextNode(innerPriceLabel);
			li.appendChild(priceLabel);
			li.appendChild(document.createElement('br'));
		}

		li.appendChild(document.createElement('br'));

		//comments label and textarea
		var cL = "comments";
		var commentsLabel = document.createTextNode('Comments: ');
		var textarea = document.createElement('textarea');
		textarea.name = cL.concat(products_id[productIndex]);
		textarea.setAttribute('rows', '6');
		textarea.setAttribute('cols', '30');
		li.appendChild(commentsLabel);
		li.appendChild(document.createElement('br'));
		li.appendChild(textarea);

		//add to the ul
		ul.appendChild(li);
	}

	//remove an product
	function RemoveNode(li)
	{
		li.parentNode.removeChild(li);
	}

	//clear fields
	function ClearList()
	{
		productList.options.length = 1;
		var ul = document.getElementById('selectedOptions');
		ul.innerHTML = '';
	}

	//update list of products
	function ChangeProductsList()
	{
		//get elements' id
		categoryList = document.getElementById('categorie');
		productList = document.getElementById('products');
		//get the selected category
		selCategory = categoryList.options[categoryList.selectedIndex].value;
		//clean options on product's select
		productList.options.length = 1;
		//add products on the selected category

		for (var i = 0; i < categorie_name.length; i++)
		{
			if ( categorie_name[i] == selCategory )
			{
				var opt = document.createElement('option');
				opt.value = products_name[i];
				opt.innerHTML = products_name[i];
				productList.options.add(opt);
			}
		}
	}

	//prevent the user to type non-numeric characters
	function OnlyNumbers (event)
	{
		//to type digits
		var isNumeric = (event.which >= 48 && event.which <= 57);
		//to use the arrow keys
		var isArrow = (event.keyCode >= 37 && event.keyCode <= 40);
		//to use the delete/backspace/enter key
		var isAccess = (event.keyCode == 8
						|| event.keyCode == 127
						|| event.keyCode == 13);
		return isNumeric || isArrow || isAccess;
	}
	// -->
</script>
