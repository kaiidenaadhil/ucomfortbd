<?php
class networkModel extends Model
{

	public function record($data = [])
	{
		$this->insert("network", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("network", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'networkId',
  1 => 'networkTitle',
  2 => 'networkCountry',
  3 => 'networkCity',
  4 => 'networkStore',
  5 => 'networkPhone',
  6 => 'networkAddress',
  7 => 'networkImage',
  8 => 'networkUpdated',
  9 => 'networkIdentify',
);
		return $this->dynamicSelectPagination("network", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'networkId',
  1 => 'networkTitle',
  2 => 'networkCountry',
  3 => 'networkCity',
  4 => 'networkStore',
  5 => 'networkPhone',
  6 => 'networkAddress',
  7 => 'networkImage',
  8 => 'networkUpdated',
  9 => 'networkIdentify',
);
		return $this->dynamicSelectSearch("network", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'networkId',
  1 => 'networkTitle',
  2 => 'networkCountry',
  3 => 'networkCity',
  4 => 'networkStore',
  5 => 'networkPhone',
  6 => 'networkAddress',
  7 => 'networkImage',
  8 => 'networkUpdated',
  9 => 'networkIdentify',
);
		return $this->dynamicSelect("network", $columns, ["networkIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("network", $data, ["networkIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("network", ["networkIdentify" => $id]);
	}
}
