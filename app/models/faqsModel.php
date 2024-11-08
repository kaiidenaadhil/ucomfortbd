<?php
class faqsModel extends Model
{

	public function record($data = [])
	{
		$this->insert("faqs", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("faqs", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'faqId',
  1 => 'faqTitle',
  2 => 'faqDesc',
  3 => 'faqUpdated',
  4 => 'faqIdentify',
);
		return $this->dynamicSelectPagination("faqs", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'faqId',
  1 => 'faqTitle',
  2 => 'faqDesc',
  3 => 'faqUpdated',
  4 => 'faqIdentify',
);
		return $this->dynamicSelectSearch("faqs", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'faqId',
  1 => 'faqTitle',
  2 => 'faqDesc',
  3 => 'faqUpdated',
  4 => 'faqIdentify',
);
		return $this->dynamicSelect("faqs", $columns, ["faqIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("faqs", $data, ["faqIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("faqs", ["faqIdentify" => $id]);
	}
}
