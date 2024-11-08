<?php
class subcategoriesModel extends Model
{

	public function getByCategoryUri($subcategoryUri)
    {
        $columns = ['subcategoryId', 'subcategoryName']; // Columns to select
        $where = ['subcategoryUri' => $subcategoryUri]; // Conditions for where clause

        // Call dynamicSelect to retrieve subcategories
        return $this->dynamicSelect('subcategories', $columns, $where);
    }

    public function getByCategoryId($categoryId)
    {
        $columns = ['subcategoryId', 'subcategoryName','subcategoryFeatureImage','subcategoryUri']; // Columns to select
        $where = ['categoryId' => $categoryId]; // Conditions for where clause

        // Call dynamicSelect to retrieve subcategories
        return $this->dynamicSelect('subcategories', $columns, $where);
    }

	public function record($data = [])
	{
		$this->insert("subcategories", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("subcategories", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'subcategoryId',
  1 => 'subcategoryName',
  2 => 'subcategoryDesc',
  3 => 'subcategoryUri',
  4 => 'subcategoryFeatureImage',
  5 => 'subcategoryUpdated',
  6 => 'subcategoryIdentify',
);
		return $this->dynamicSelectPagination("subcategories", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'subcategoryId',
  1 => 'subcategoryName',
  2 => 'subcategoryDesc',
  3 => 'subcategoryUri',
  4 => 'subcategoryFeatureImage',
  5 => 'subcategoryUpdated',
  6 => 'subcategoryIdentify',
);
		return $this->dynamicSelectSearch("subcategories", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'subcategoryId',
  1 => 'subcategoryName',
  2 => 'subcategoryDesc',
  3 => 'subcategoryUri',
  4 => 'subcategoryFeatureImage',
  5 => 'subcategoryUpdated',
  6 => 'subcategoryIdentify',
);
		return $this->dynamicSelect("subcategories", $columns, ["subcategoryIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("subcategories", $data, ["subcategoryIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("subcategories", ["subcategoryIdentify" => $id]);
	}
}
