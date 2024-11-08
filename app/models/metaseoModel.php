<?php
class metaseoModel extends Model
{

	public function record($data = [])
	{
		$this->insert("metaseo", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("metaseo", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'id',
  1 => 'pageSlug',
  2 => 'metaTitle',
  3 => 'metaDescription',
  4 => 'metaKeywords',
  5 => 'imageFeature',
  6 => 'imageAlt',
  7 => 'imageCaption',
  8 => 'canonicalURL',
  9 => 'metaAuthor',
  10 => 'metaseoUpdated',
  11 => 'metaseoIdentify',
);
		return $this->dynamicSelectPagination("metaseo", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'id',
  1 => 'pageSlug',
  2 => 'metaTitle',
  3 => 'metaDescription',
  4 => 'metaKeywords',
  5 => 'imageFeature',
  6 => 'imageAlt',
  7 => 'imageCaption',
  8 => 'canonicalURL',
  9 => 'metaAuthor',
  10 => 'metaseoUpdated',
  11 => 'metaseoIdentify',
);
		return $this->dynamicSelectSearch("metaseo", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'id',
  1 => 'pageSlug',
  2 => 'metaTitle',
  3 => 'metaDescription',
  4 => 'metaKeywords',
  5 => 'imageFeature',
  6 => 'imageAlt',
  7 => 'imageCaption',
  8 => 'canonicalURL',
  9 => 'metaAuthor',
  10 => 'metaseoUpdated',
  11 => 'metaseoIdentify',
);
		return $this->dynamicSelect("metaseo", $columns, ["metaseoIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("metaseo", $data, ["metaseoIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("metaseo", ["metaseoIdentify" => $id]);
	}
}
