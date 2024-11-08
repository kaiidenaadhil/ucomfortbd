<?php
class campaignModel extends Model
{
	    // Get all campaigns in descending order by `campaignUpdated`
		public function getAllCampaigns() {
			$db = Database::getInstance()->getConnection();
			$sql = "SELECT `campaignId`, `campainTitle`, `campaignSubtitle`, `campaignMedia`, `campaignUpdated`, `campaignIdentify`
					FROM `campaign`
					ORDER BY `campaignUpdated` DESC";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	public function record($data = [])
	{
		$this->insert("campaign", $data);
	}

	public function countAll($search, $searchColumns)
	{
		return $this->countAllSearch("campaign", $search, $searchColumns);
	}

	public function displayAll($offset = null, $limit = null)
	{
           		$columns = array (
  0 => 'campaignId',
  1 => 'campainTitle',
  2 => 'campaignSubtitle',
  3 => 'campaignMedia',
  4 => 'campaignUpdated',
  5 => 'campaignIdentify',
);
		return $this->dynamicSelectPagination("campaign", $columns, [], $offset, $limit);
	}

	public function displayAllSearch($search, $searchColumns, $offset = null, $limit = null)
	{
	$columns = array (
  0 => 'campaignId',
  1 => 'campainTitle',
  2 => 'campaignSubtitle',
  3 => 'campaignMedia',
  4 => 'campaignUpdated',
  5 => 'campaignIdentify',
);
		return $this->dynamicSelectSearch("campaign", $columns, [], $search, $searchColumns, $offset, $limit);
	}

	public function displaySingle($id)
	{
		$columns = array (
  0 => 'campaignId',
  1 => 'campainTitle',
  2 => 'campaignSubtitle',
  3 => 'campaignMedia',
  4 => 'campaignUpdated',
  5 => 'campaignIdentify',
);
		return $this->dynamicSelect("campaign", $columns, ["campaignIdentify" => $id]);
	}

	public function update($data, $id)
	{
		return $this->dynamicUpdateWithWhere("campaign", $data, ["campaignIdentify" => $id]);
	}

	public function erase($id)
	{
		return $this->dynamicDeleteWithPlaceholders("campaign", ["campaignIdentify" => $id]);
	}
}
