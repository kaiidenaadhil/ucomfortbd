<?php
class categoriesModel extends Model
{


	public function getByCategoryUri($categoryUri)
    {
        $columns = ['categoryId', 'categoryName']; // Columns to select
        $where = ['categoryUri' => $categoryUri]; // Conditions for where clause

        // Call dynamicSelect to retrieve subcategories
        return $this->dynamicSelect('categories', $columns, $where);
    }
	public function displaySingleCategory($categoryUri)
	{
		$columns = array (
		0 => 'categoryId',
		1 => 'categoryName',
		2 => 'categoryDesc',
		3 => 'categoryUri',
		4 => 'categoryFeatureImage',
		5 => 'categoryUpdated',
		6 => 'categoryIdentify',
		);
		return $this->dynamicSelect("categories", $columns, ["categoryUri" => $categoryUri]);
	}


	public function record($data = [])
	{
		$this->insert("categories", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("categories", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'categoryId',
  1 => 'categoryName',
  2 => 'categoryDesc',
  3 => 'categoryUri',
  4 => 'categoryFeatureImage',
  5 => 'categoryUpdated',
  6 => 'categoryIdentify',
);
		return $this->dynamicSelectPagination("categories", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'categoryId',
  1 => 'categoryName',
  2 => 'categoryDesc',
  3 => 'categoryUri',
  4 => 'categoryFeatureImage',
  5 => 'categoryUpdated',
  6 => 'categoryIdentify',
);
		return $this->dynamicSelectSearch("categories", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'categoryId',
  1 => 'categoryName',
  2 => 'categoryDesc',
  3 => 'categoryUri',
  4 => 'categoryFeatureImage',
  5 => 'categoryUpdated',
  6 => 'categoryIdentify',
);
		return $this->dynamicSelect("categories", $columns, ["categoryIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("categories", $data, ["categoryIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("categories", ["categoryIdentify" => $id]);
	}
}
