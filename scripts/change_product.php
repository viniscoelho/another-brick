<script type="text/javascript">
	<!--
	//change_product.php

	var categoryList, selCategory, productList;
	var products_id = <?php echo json_encode($products_id);?>;
	var products_name = <?php echo json_encode($products_name);?>;
	var categorie_name = <?php echo json_encode($categorie_name);?>;	
	var prices = <?php echo json_encode($prices);?>;	
	var stock = <?php echo json_encode($stock);?>;	
	var description = <?php echo json_encode($description);?>;
	var colors = <?php echo json_encode($colors);?>;

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
		optionSelect = select.options[select.selectedIndex];		//selected option
		ChangeColorList(optionSelect.value);
		if ( optionSelect.value != "Paint" ) createUlElements(select); 
	}

	function createUlElements(select)
	{
		var ul = document.getElementById('selectedOptions');	//destination ul
		var choices = ul.getElementsByTagName('span');			//an array of span items
		for (var i = 0; i < choices.length; i++)
			if (choices[i].innerHTML == optionSelect.value
				|| select.selectedIndex == 0)
				return;
		var li = document.createElement('li'); 			//a new li element
		var labelName = document.createElement('span');	//for the name of the object

		//to get the index
		var productIndex = getProductIndex(select.selectedIndex-1);

		//span label
		labelName.innerHTML = optionSelect.value;

		//this if is safe, since it will only be triggered if Paint is selected...
		var colorSelect = document.getElementById('productscolors');
		if ( colorSelect.length > 1 )
		{
			option = select.options[select.selectedIndex];
			labelName.innerHTML += " Color: " + option.value;
			productIndex = 4;

			for (var i = 0; i < choices.length; i++)
				if (choices[i].innerHTML == labelName.innerHTML
					|| select.selectedIndex == 0)
					return;
		}

		//button to remove the li
		var buttonRm = document.createElement('input');
		buttonRm.type = 'button';
		buttonRm.value = 'Remove';
		buttonRm.setAttribute('onclick', 'RemoveNode(this.parentNode);');

		//a description
		//var descLabel = document.createTextNode(description[productIndex]);

		//just a text for quantity input
		var qtdLabel = document.createTextNode('Quantity: ');

		//for quantity input
		var inputQtd = document.createElement('input');		//for the name of the object
		inputQtd.id = products_id[productIndex];			//set its id
		inputQtd.className = 'getClass';					//just a generic class that will be used to calculate the items in the cart
		inputQtd.type = 'text';
		inputQtd.name = products_name[productIndex];		//set the value to be the same as the innerHTML
		inputQtd.size = 3;
		inputQtd.value = '0';	//default value on the field
		inputQtd.setAttribute('onkeypress', 'return OnlyNumbers(event)');
		inputQtd.setAttribute('onkeyup', 'return OnlyNumbers(event)');
		inputQtd.setAttribute('onkeydown', 'return OnlyNumbers(event)');

		//price per item
		var itemPrice = document.createTextNode('   Price per item: $'
												+ prices[productIndex]);

		//add to the li
		li.className = 'ProductsSpacing';
		li.appendChild(labelName);
		li.appendChild(buttonRm);
		li.appendChild(document.createElement('br'));
		//li.appendChild(descLabel);
		//li.appendChild(document.createElement('br'));
		li.appendChild(qtdLabel);
		li.appendChild(inputQtd);
		li.appendChild(itemPrice);

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
		var ulElement = document.getElementById('selectedOptions');
		ulElement.innerHTML = '';
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

	function ChangeColorList(pdr)
	{
		var colorSelect = document.getElementById('productscolors');
		if ( pdr == "Paint" )
		{
			for ( var i = 0; i < colors.length; i++ )
			{
				if ( colors[i] != null )
				{
					var opt = document.createElement('option');
					opt.value = colors[i];
					opt.innerHTML = colors[i];
					colorSelect.options.add(opt);
				}
			}
		}
		else colorSelect.options.length = 1;
	}

	//create a popup to show the updated price
	function DisplayOrder()
	{
		var ulElement = document.getElementById('selectedOptions');
		var choices = ulElement.getElementsByClassName('getClass');

		var resp = "";
		for ( var i = 0; i < choices.length; i++ )
		{
			for ( var j = 0; j < products_id.length; j++ )
			{
				if ( choices[i].id == products_id[j] )
				{
					var qtd = document.getElementById(choices[i].id).value;
					if ( qtd > 0 )
						resp += "\nItem added to cart: " + products_name[j]
						+ "\nQuantity: " + qtd
						+ "\nSubtotal: $" + qtd*prices[j] + "\n";
				}
			}
		}
		if ( resp != "" ) alert(resp);
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
