<?php

namespace Cake\Model\Datasource\Database\Statement;

class BufferedStatement extends \Cake\Model\Datasource\Database\Statement {

	protected $_count = 0;

	protected $_records = array();

	protected $_allFetched = true;

	protected $_counter = 0;

	public function execute($params = null) {
		$this->_count = $this->_counter = 0;
		$this->_records = array();
		$this->_allFetched = false;
		return parent::execute($params);
	}

	public function fetch($type = 'num') {
		if ($this->_allFetched) {
			$row =  ($this->_counter <= $this->_count) ? $this->_records[$this->_counter++] : false;
			$row = ($row && $type === 'num') ? array_values($row) : $row;
			return $row;
		}

		$this->_fetchType = $type;
		$record = parent::fetch($type);

		if ($record === false) {
			$this->_allFetched = true;
			$this->_counter = $this->_count + 1;
			return false;
		}

		$this->_count++;
		return $this->_records[] = $record;
	}

	public function fetchAll($type = 'num') {
		if ($this->_allFetched) {
			return $this->_records;
		}

		$this->_records = parent::fetchAll($type);
		$this->_count = count($this->_records);
		$this->_allFetched = true;
		return $this->_records;
	}

	public function rowCount() {
		if (!$this->_allFetched) {
			$counter = $this->_counter;
			while($this->fetch('assoc'));
			$this->_counter = $counter;
		}

		return $this->_count;
	}

}
