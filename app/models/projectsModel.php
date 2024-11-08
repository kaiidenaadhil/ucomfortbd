<?php
class projectsModel extends Model
{

	public function record($data = [])
	{
		$this->insert("projects", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("projects", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'projectId',
  1 => 'projectFlagCode',
  2 => 'projectImage',
  3 => 'projectCountryName',
  4 => 'projectUpdated',
  5 => 'projectIdentify',
);
		return $this->dynamicSelectPagination("projects", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'projectId',
  1 => 'projectFlagCode',
  2 => 'projectImage',
  3 => 'projectCountryName',
  4 => 'projectUpdated',
  5 => 'projectIdentify',
);
		return $this->dynamicSelectSearch("projects", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'projectId',
  1 => 'projectFlagCode',
  2 => 'projectImage',
  3 => 'projectCountryName',
  4 => 'projectUpdated',
  5 => 'projectIdentify',
);
		return $this->dynamicSelect("projects", $columns, ["projectIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("projects", $data, ["projectIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("projects", ["projectIdentify" => $id]);
	}
}
