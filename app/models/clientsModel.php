<?php
class clientsModel extends Model
{

	public function record($data = [])
	{
		$this->insert("clients", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("clients", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'clientId',
  1 => 'clientName',
  2 => 'clientEmail',
  3 => 'whatsapp',
  4 => 'clientMessage',
  5 => 'clientUpdated',
  6 => 'clientIdentify',
);
		return $this->dynamicSelectPagination("clients", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'clientId',
  1 => 'clientName',
  2 => 'clientEmail',
  3 => 'whatsapp',
  4 => 'clientMessage',
  5 => 'clientUpdated',
  6 => 'clientIdentify',
);
		return $this->dynamicSelectSearch("clients", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'clientId',
  1 => 'clientName',
  2 => 'clientEmail',
  3 => 'whatsapp',
  4 => 'clientMessage',
  5 => 'clientUpdated',
  6 => 'clientIdentify',
);
		return $this->dynamicSelect("clients", $columns, ["clientIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("clients", $data, ["clientIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("clients", ["clientIdentify" => $id]);
	}
}
