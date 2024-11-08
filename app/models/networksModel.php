<?php
class networksModel extends Model
{

	public function record($data = [])
	{
		$this->insert("networks", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("networks", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'networkId',
  1 => 'networkCountry',
  2 => 'networkCity',
  3 => 'networkStore',
  4 => 'networkAddress',
  5 => 'networkImage',
  6 => 'networkUpdated',
  7 => 'networkIdentify',
);
		return $this->dynamicSelectPagination("networks", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'networkId',
  1 => 'networkCountry',
  2 => 'networkCity',
  3 => 'networkStore',
  4 => 'networkAddress',
  5 => 'networkImage',
  6 => 'networkUpdated',
  7 => 'networkIdentify',
);
		return $this->dynamicSelectSearch("networks", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'networkId',
  1 => 'networkCountry',
  2 => 'networkCity',
  3 => 'networkStore',
  4 => 'networkAddress',
  5 => 'networkImage',
  6 => 'networkUpdated',
  7 => 'networkIdentify',
);
		return $this->dynamicSelect("networks", $columns, ["networkIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("networks", $data, ["networkIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("networks", ["networkIdentify" => $id]);
	}
}
