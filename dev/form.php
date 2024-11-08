<!DOCTYPE html>
<html>

<head>
	<title>Database Schema Generator</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 10px;
		}

		th,
		td {
			text-align: left;
			padding: 8px;
		}

		th {
			background-color: #f2f2f2;
		}

		input[type="text"],
		select {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="checkbox"] {
			margin-left: 10px;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 16px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #45a049;
		}

		#add-row {
			margin-bottom: 10px;
		}

		#foreignKey {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		.delete-button {
  background-color: #ffcccc;
  border: none;
  color: #ff0000;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1.1rem;
  cursor: pointer;
  width: 30px;
  height: 30px;
  line-height: 28px;
  border-radius: 50%;
}

.delete-button::after {
  content: "\2715";
}

.plus-sign {
  display: inline-block;
  width: 25px;
    height: 25px;
  border: 2px solid #ffcccc;;
  border-radius: 50%;
  position: relative;
  cursor: pointer;
}

.plus-sign:before, .plus-sign:after {
  content: "";
  display: block;
  position: absolute;
  background-color: #ffcccc;;
}

.plus-sign:before {
  height: 2px;
  width: 50%;
  top: 50%;
  left: 25%;
  transform: translateY(-50%);
}

.plus-sign:after {
  height: 50%;
  width: 2px;
  top: 25%;
  left: 50%;
  transform: translateX(-50%);
}


	</style>
</head>

<body>
	<form id="generate-schema-form" style="background: #f2f2f2;
    padding:1rem 2rem;">
		<table id="fields-table">
			<thead>
				<tr>
					<th>Field Name</th>
					<th>Data Type</th>
					<th>Length/Max Value</th>
					<th>Nullable</th>
					<th>Index Type</th>
					<th>Auto Increment</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="fieldName[]" /></td>
					<td>
						<select name="dataType[]">
							<option value="integer">Integer</option>
							<option value="string">String</option>
							<option value="timestamp">Timestamp</option>
						</select>
					</td>
					<td><input type="text" name="length[]" /></td>
					<td><input type="checkbox" name="nullable[]" /></td>
					<td>
						<select name="indexType[]">
							<option value="">None</option>
							<option value="primary_key">Primary</option>
							<option value="unique">Unique</option>
						</select>
					</td>
					<td><input type="checkbox" name="autoIncrement[]" /></td>
					<td><a  id="add-row" class="plus-sign"></a></td>
				</tr>
			</tbody>
		</table>
		<div style="display:flex;display: flex;
    justify-content: space-between;
    align-items: center;">
			<label for="foreignKey">Foreign Key (Not Mandatory):</label>
			<input style="width:50%" type="text" name="foreignKey" placeholder="Foreign Table:Foreign Key Field" />
			<button type="submit">Generate Schema</button>
		</div>
		<br /><br />

	</form>

	<script>
		$(document).ready(function() {


			// Delete tr
			$('#fields-table').on('click', '.delete-button', function() {
				$(this).closest('tr').remove();
			});



			// Add a new row to the fields table
			$('#add-row').click(function() {
				var newRow = '<tr>' +
					'<td><input type="text" name="fieldName[]" /></td>' +
					'<td>' +
					'<select name="dataType[]">' +
					'<option value="integer">Integer</option>' +
					'<option value="string">String</option>' +
					'<option value="timestamp">Timestamp</option>' +
					'</select>' +
					'</td>' +
					'<td><input type="text" name="length[]" /></td>' +
					'<td><input type="checkbox" name="nullable[]" /></td>' +
					'<td>' +
					'<select name="indexType[]">' +
					'<option value="">None</option>' +
					'<option value="primary_key">Primary</option>' +
					'<option value="unique">Unique</option>' +
					'</select>' +
					'</td>' +
					'<td><input type="checkbox" name="autoIncrement[]" /></td>' +

					'<td><a class="delete-button"></a></td>' +
					'</tr>';
				$('#fields-table tbody').append(newRow);
			});

			// Handle form submission
			$('#generate-schema-form').submit(function(event) {
				event.preventDefault();

				// Build the schema object from the table data
				var schema = {};
				$('#fields-table tbody tr').each(function() {
					var fieldName = $(this).find('input[name="fieldName[]"]').val();
					var dataType = $(this).find('select[name="dataType[]"]').val();
					var length = $(this).find('input[name="length[]"]').val();
					var nullable = $(this).find('input[name="nullable[]"]').is(':checked');
					var indexType = $(this).find('select[name="indexType[]"]').val();
					var autoIncrement = $(this).find('input[name="autoIncrement[]"]').is(':checked');

					// Build the schema object
					var field = dataType;
					if (length) {
						field += '|max:' + length;
					}
					if (nullable) {
						field += '|nullable';
					}
					if (indexType) {
						field += '|' + indexType;
					}
					if (autoIncrement) {
						field += '|auto_increment';
					}

					schema[fieldName] = field;
				});

				// Add the foreign key to the schema if it exists
				var foreignKey = $('input[name="foreignKey"]').val();
				if (foreignKey) {
					var foreignKeyField = 'PersonID';
					if (foreignKey.indexOf(':') !== -1) {
						var parts = foreignKey.split(':');
						foreignKey = parts[0];
						foreignKeyField = parts[1];
					}
					schema[foreignKeyField] = 'integer|foreign:' + foreignKey;
				}

				// Display the generated schema in JSON format
				var jsonOutput = JSON.stringify(schema, null, 2);
				$('.textarea').text(jsonOutput);
				//alert(jsonOutput);
			});
		});
	</script>
</body>

</html>