<?php
require_once "../models/database.php";

class m_report extends database
{

    public function report_order($form, $to)
    {
        $sql = "SELECT DATE(ngay_lap_dh) AS ngay, COUNT(*) AS so_luong_don_hang, SUM(tong_tien) AS tong_tien_don_hang
        FROM don_hang
        WHERE ngay_lap_dh BETWEEN ? AND ?
        GROUP BY DATE(ngay_lap_dh)";

        $this->setQuery($sql);
        return $this->loadAllRows(array($form, $to));

    }
}
